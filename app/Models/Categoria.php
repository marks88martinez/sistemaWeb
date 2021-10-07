<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'categorias';

    protected $fillable = [
        'name',
        'path_image',
        'categorias_id',
    ];

    // public function categoria(){
    //     return $this->belongsTo(Categoria::class, 'categorias_id');
    // }
  
    public function children(){
        return $this->hasMany(Categoria::class, 'categorias_id');
    }
    public function pather(){
        return $this->belongsTo(Categoria::class, 'categorias_id');
    }









}
