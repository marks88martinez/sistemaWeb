<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCategoria extends Model
{
    use HasFactory;

    protected $table = 'producto_categoria';

    protected $fillable = [
        'producto_id',
        'categoria_id',
    ];

    // public function productos(){
    //     return $this->hasMany(Producto::class);
    // }
    // public function productoImagenes(){
    //     return $this->hasMany(ProductoImagenes::class);
    // }
   

}
