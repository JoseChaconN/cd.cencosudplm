<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductosRecepcion extends Model {
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $table = 'productos_recepcion';

    public function productos_cajas_recepcion(): HasMany
    {
        return $this->HasMany(ProductosCajaRecepcion::class,'id_producto','id');
    }
}
