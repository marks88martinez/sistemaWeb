<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductoImagenes extends Model
{
    use HasFactory;
    protected $table = 'producto_imagenes';

    protected $fillable = [
        'path_image',
        'status',
    ];

    // public function productoImagenes(): BelongsToMany
    // {
    //     return $this->belongsToMany(ProductoImagenes::class, 'producto_imagen', 'id', 'producto_id');
    // }
   


}
