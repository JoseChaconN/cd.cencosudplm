<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductosInspeccion extends Model {
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $table = 'productos_inspeccion';

    public function productos_cajas_inspeccion(): HasMany
    {
        return $this->HasMany(ProductosCajaInspeccion::class,'id_producto','id');
    }
}
