<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $banners = Banner::all();
        return view('banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('banners.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file'=>'required|image|max:2048'
        ]);
        //php artisan storage:link   /// crea acceso directo a la carpeta public de las imagenes a storage

        $imagenes = $request->file('file')->store('public/imagenes');
        $url = Storage::url($imagenes);
        Banner::create([
            'name'=> $request['name'],
            'path_url'=> $request['path_url'],
            'path_image'=> $url,
        ]);
        return redirect('banners');
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
        $banner = Banner::find($id);
        return view('banners.edit', compact('banner'));
    }
    public function bannerEliminar($id)
    {
        // $request = $this->request->all();
        // $id = $request['id'];

        $banner = Banner::find($id);
        $banner->fill([
            'path_image' =>'',
         ]);
         $banner->save();

         return response()->json(['success']);

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


        $banner = Banner::find($id);
        $banner->fill([
              'name' => $request->name,
              'path_url' => $request->path_url,
            //   'path_image' => $url
        ]);

        if ($request->file) {
            $request->validate([
                    'file'=>'image|max:2048'
            ]);
                //php artisan storage:link   /// crea acceso directo a la carpeta public de las imagenes a storage
              $imagenes = $request->file('file')->store('public/imagenes');
              $url = Storage::url($imagenes);
              $banner->fill([
                'path_image' => $url
          ]);

        }
        $banner->save();
        return Redirect('/banners')->with('success','Banner Actualizado con sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return Redirect('/banners')->with('success','banner delete con sucesso');
    }
}
