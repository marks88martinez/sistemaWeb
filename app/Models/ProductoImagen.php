<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductoImagen extends Model
{
    use HasFactory;

    protected $table = 'producto_imagen';

    protected $fillable = [
        'producto_id',
        'imagen_id',
    ];


    // public function productos(){
    //     return $this->hasMany(Producto::class);
    // }
    // public function productoImagenes(){
    //     return $this->hasMany(ProductoImagenes::class);
    // }
   
   

    
}
