<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FrigorificoRazonSocial extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'frigorificos_razones_sociales';
    protected $guarded = [];

    public function pais_razon(): HasOne
    {
        return $this->hasOne(Pais::class,'id','pais');
    }
    public function frigorifico_razon(): BelongsTo
    {
        return $this->belongsTo(Frigorifico::class,'id_frigorifico','id');
    }
}
