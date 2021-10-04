<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
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
            $imagenes = $request->file('file')->store('public/categorias');
        }
        $url = $imagenes ? Storage::url($imagenes) : '' ;
        Categoria::create([
            'name'=> $request->name,
            'path_image'=> $url,
        ]);

        return redirect('categorias');

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
        $categoria = Categoria::find($id);
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->fill([
            'name' => $request->name,
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

        return Redirect('/categorias')->with('success','Categorias Actualizado con sucesso');

    }
    public function deleteImg(Request $request, $id){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
