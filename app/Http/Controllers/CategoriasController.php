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

        $categorias = Categoria::whereNull('categorias_id')
        ->with(['children'])
        ->get();


         return view('categorias.index',compact('categorias'));
    }


    public function create()
    {
        return view('categorias.create');
    }


    public function store(Request $request)
    {
        $imagenes = '';
        if ($request->file) {

            $request->validate([
                'file'=>'image|max:2048'
            ]);
            //php artisan storage:link   /// crea acceso directo a la carpeta public de las imagenes a storage
            $imagenes = $request->file('file')->store('public/categorias');
            // return $imagenes;
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

    public function categoriaEliminar($id)
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
        return Redirect('/categorias')->with('success','banner delete con sucesso');
    }
}
