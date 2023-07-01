<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuenta;
use App\Models\Perfil;

class Imagen extends Model
{
    use HasFactory;
    protected $table = 'imagenes';
    protected $fillable = [
        'titulo',
        'archivo'
        
    ];
    public $timestamps = false;

    public function cuentas():BelongsTo
    {
        return $this->belongsTo(Cuenta::class);
    }
}
    
    