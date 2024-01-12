<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Recepcion extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes;
    protected $guarded = [];
    protected $table = 'recepciones';

    public function productos_recepcion(): HasMany
    {
        return $this->HasMany(ProductosRecepcion::class,'id_recepcion','id');
    }
    public function productos_cajas_recepcion(): HasMany
    {
        return $this->HasMany(ProductosCajasRecepcion::class,'id_recepcion','id');
    }
    public function responsable(): HasOne
    {
        return $this->HasOne(User::class,'id','id_creador');
    }
}