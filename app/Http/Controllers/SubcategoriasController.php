<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SubcategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $subcategorias = Categoria::WhereNotNull('categorias_id')->get();
        return view('subcategorias.index', compact('subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::whereNull('categorias_id')->get();
        return view('subcategorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $imagenes = '';
        if ($request->file) {

            $request->validate([
                'file'=>'image|max:2048'
            ]);
            //php artisan storage:link   /// crea acceso directo a la carpeta public de las imagenes a storage
            $imagenes = $request->file('file')->store('public/subcategorias');
        }
        $url = $imagenes ? Storage::url($imagenes) : '' ;
        Categoria::create([
            'name'=> $request->name,
            'categorias_id'=> $request->categorias_id,
            'path_image'=> $url,
        ]);


        return redirect('subcategorias');

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
        $categorias = Categoria::whereNull('categorias_id')->get();
        $subcategoria = Categoria::find($id);
        return view('subcategorias.edit', compact('categorias','subcategoria')); 
    }

    public function subcategoriaEliminar($id)
    {

        $categoria = Categoria::find($id);
        $categoria->fill([
            'path_image' => null
        ]);
        $categoria->save();
        return response()->json(['success']);

    }
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->fill([
            'name' => $request->name,
            'categorias_id'=> $request->categorias_id,
          //   'path_image' => $url
        ]);
        if ($request->file) {
            $request->validate([
                    'file'=>'image|max:2048'
            ]);
                //php artisan storage:link   /// crea acceso directo a la carpeta public de las imagenes a storage
              $imagenes = $request->file('file')->store('public/imagenes');
              $url = Storage::url($imagenes);
              $categoria->fill([
                'path_image' => $url
             ]);
        }
        $categoria->save();

        return Redirect('/subcategorias')->with('success','SubCategoria Actualizado con sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return Redirect('/subcategorias')->with('success','banner delete con sucesso');
    }
}
