<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Corte extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes;    
    protected $guarded = [];

    public function responsable(): HasOne
    {
        return $this->HasOne(User::class,'id','id_creador')->withDefault();
    }
}
