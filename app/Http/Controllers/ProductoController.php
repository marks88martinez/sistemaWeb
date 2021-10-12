<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\ProductoCategoria;
use App\Models\ProductoImagen;
use App\Models\ProductoImagenes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $search =  $request->input('search');

        if ( $request->search) {
            $categorias = Categoria::all();
            $productos = Producto::where('name','like','%'.$search.'%')->paginate(20);
        }else{
               // $categorias = Categoria::whereNull('categorias_id')->get();
            $categorias = Categoria::all();
            $productos = Producto::paginate(20);
        }
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


    public function store(Request $request)
    {
        // return $request->file('file');
        //  dd($request);

        $now = now();
        $producto =  Producto::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'slug'=> Str::slug($request->name,'-').'_'.rand(),
            'precio'=> $request->precio,
            'precio_oferta'=> $request->precio_oferta,
            'sku'=> $request->codigo_prod,
            'destacado'=> $request->input('destacado') ==  0 ? 'Active': 'Inactive',
            'status'=> $request->input('status') ==  0 ? 'Active' : 'Inactive'

        ]);

            // ## Producto Categorias TB
        foreach ($request->categorias_id as $cat) {
            ProductoCategoria::create([
                'producto_id'=> $producto->id,
                'categoria_id'=> $cat,
            ]);
        }
        if ($request->Subcategorias_id) {
            foreach ($request->Subcategorias_id as $cat) {
                ProductoCategoria::create([
                    'producto_id'=> $producto->id,
                    'categoria_id'=> $cat,
                ]);
            }
        }
        // ## Productos Imagenes TB

        $imagenes = '';
        // $paths = [];
        // $request->validate([
        //     'file'=>'image|max:2048'
        // ]);

        if ($request->file) {
            $images = $request->file('file');

            foreach ($images as $f) {

                $name = $f->store('public/productos');
                    // $store= Storage::url($name);
                    // array_push($paths, $store);
                $url =  Storage::url($name);
                   $producto_Imagenes =  ProductoImagenes::create([
                        'path_image'=> $url,
                    ]);
                   ProductoImagen::create([
                        'producto_id'=> $producto->id,
                        'imagen_id'=> $producto_Imagenes->id,
                    ]);
            }

        }


        return redirect('productos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Producto::where('slug','=', $slug)->firstOrFail();
        return $post;
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

        $subcategorias = Categoria::WhereNotNull('categorias_id')->get();
         $categorias = Categoria::whereNull('categorias_id')->with(['children'])->get();
        $proCat =  Categoria::rightJoin('producto_categoria','categorias.id','producto_categoria.categoria_id')
        // ->select('categorias.name','categorias.id')
        ->rightJoin('productos','productos.id','producto_categoria.producto_id')
        ->where('productos.id',$id)
        ->pluck('categorias.id')
        ->toArray();

        // ->get();
        // $prodcat =  Producto::where('id','=',$id)->with(['categorias'])
        // ->get();
        // $proCat =  Producto::with(['categorias'])
        // ->where('id',$id)
        // ->first();

        // return $proCat;
       return view('productos.edit',compact('producto','categorias','subcategorias','proCat'));
    }

    public function productoEliminar($id)
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
        // dd($request->status);
        $producto = Producto::find($id);
        $producto->fill([

              'name'=> $request->name,
              'description'=> $request->description,
            //   'slug'=> Str::slug($request->name,'-').'_'.rand(),
              'precio'=> $request->precio,
              'precio_oferta'=> $request->precio_oferta,
              'sku'=> $request->codigo_prod,

              'destacado'=> $request->input('destacado') ==  0 ? 'Active': 'Inactive',
              'status'=> $request->input('status') == 0 ? 'Active' : 'Inactive'

        ]);




        if ($request->file) {
            $images = $request->file('file');

            foreach ($images as $f) {

                $name = $f->store('public/productos');

                $url =  Storage::url($name);


                   $producto_Imagenes =  ProductoImagenes::create([
                        'path_image'=> $url,
                    ]);
                   ProductoImagen::create([
                        'producto_id'=> $producto->id,
                        'imagen_id'=> $producto_Imagenes->id,
                    ]);
            }

        }




        $producto->save();
        // return Redirect('/productos')->with('success','Producto Actualizado con sucesso');
        return back();
    }


    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return Redirect('/productos')->with('success','Producto Eliminada con sucesso');

    }
}
