<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'productos';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'precio',
        'precio_oferta',
        'codigo_prod',
        'destacado',
        'status',
    ];

    

    // public function productoImagen(): BelongsToMany
    // {
    //     return $this->belongsToMany(ProductoImagen::class, 'producto_imagenes', 'id', 'imagen_id');
    // }
    // public function ProductoCategorias(): BelongsToMany
    // {
    //     return $this->belongsToMany(ProductoCategoria::class, 'producto_categoria', 'id', 'categoria_id');
    // }


}
