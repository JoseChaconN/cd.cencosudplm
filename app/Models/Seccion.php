<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Seccion extends Model
{
    use HasFactory;
    protected $table = 'Secciones';
    protected $guarded = [];
    public function reclamo(): HasOne
    {
        return $this->hasOne(Reclamo::class);
    }
}
