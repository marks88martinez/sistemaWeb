<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\ProductoCategoria;


class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = Categoria::whereNull('categorias_id')->get();
        $productos = Producto::all();
        return view('productos.index',compact('productos','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorias = Categoria::WhereNotNull('categorias_id')->get();
        $categorias = Categoria::whereNull('categorias_id')->get();
        return view('productos.create', compact('categorias','subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->categorias_id);

        // $request->validate([
        //     'file'=>'required|image|max:2048'
        // ]);
        // //php artisan storage:link   /// crea acceso directo a la carpeta public de las imagenes a storage

        // $imagenes = $request->file('file')->store('public/productos');
        // $url = Storage::url($imagenes);
        $producto =  Producto::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'precio'=> $request->precio,
            'precio_oferta'=> $request->precio_oferta,
            'codigo_prod'=> $request->codigo_prod,
            'destacado'=> $request->destacado,
            'status'=> $request->status
          
        ]);

     
        foreach ($request->categorias_id as $cat) {
            ProductoCategoria::create([
                'producto_id'=> $producto->id,
                'categoria_id'=> $cat,
            ]);
        }
 
        
        return redirect('productos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.edit',compact('producto'));
    }

    public function roductoEliminar($id)
    {

        $producto = Producto::find($id);
        $producto->fill([
            'path_image' => null
        ]);
        $producto->save();
        return response()->json(['success']);

    }
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->fill([
              'name' => $request->name
        ]);

        if ($request->file) {
            $request->validate([
                    'file'=>'image|max:2048'
            ]);
                //php artisan storage:link   /// crea acceso directo a la carpeta public de las imagenes a storage
              $imagenes = $request->file('file')->store('public/productos');
              $url = Storage::url($imagenes);
              $producto->fill([
                'path_image' => $url
          ]);

        }
        $producto->save();
        return Redirect('/productos')->with('success','Producto Actualizado con sucesso');
    }

   
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return Redirect('/productos')->with('success','Producto Eliminada con sucesso');

    }
}
