<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'Proveedores';
    
    public function plantas(): HasMany
    {
        return $this->HasMany(PlantasProveedor::class,'id_proveedor','id');
    }
}
