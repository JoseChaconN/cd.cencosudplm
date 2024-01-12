<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Inspeccion extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes;
    protected $guarded = [];
    protected $table = 'inspecciones';

    public function productos_inspeccion(): HasMany
    {
        return $this->HasMany(ProductosInspeccion::class,'id_inspeccion','id');
    }
    public function productos_cajas_inspeccion(): HasMany
    {
        return $this->HasMany(ProductosCajasInspeccion::class,'id_inspeccion','id');
    }
    public function responsable(): HasOne
    {
        return $this->HasOne(User::class,'id','id_user');
    }
    public function razon_social(): HasOne
    {
        return $this->HasOne(FrigorificoRazonSocial::class,'id','id_razon_social');
    }
}
