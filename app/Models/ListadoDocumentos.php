<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\SoftDeletes;
class ListadoDocumentos extends Model
{
    use HasFactory , SoftDeletes;
    use HasTags;

    protected $table = 'listado_documentos';
    protected $guarded = [];

    
}
