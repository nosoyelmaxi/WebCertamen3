<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;
use App\Models\Imagen;
use App\Models\Perfil;

class Cuenta extends Authenticable
{
    use HasFactory;

    protected $table = 'cuentas';
    protected $primaryKey = 'user';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = ['user', 'nombre'];

    public function perfil():BelongsTo
    {
        return $this->belongsTo(Perfil::class);
    }
    
    public function imagenes()
    {
        return $this->hasMany(Imagen::class, 'cuenta_user', 'user');
    }

}
