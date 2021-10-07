@extends('layouts.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <a href="/productos/create" type="button" class="btn btn bg-gradient-primary btn-sm float-right p-2 m-2"><i class="nav-icon far fa-image"></i>  New Productos</a>
           </li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
{{-- //////////////////// --}}
<section class="content">
    <div class="container-fluid">


      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Productos </h3>





            <div class="card-tools">

                <div class="input-group input-group-sm" style="width: 150px;">
                 {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}

                  <div class="input-group-append">
                    {{-- <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button> --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" >
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                   
                    <th>precio</th>
                    <th>precio_oferta</th>
                    <th>codigo_prod</th>
                    <th>Destacado</th>
                    <th>status</th>
                    <th>Date</th>

                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $productos as $producto )
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->name }}</td>
                       
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->precio_oferta }}</td>
                        <td>{{ $producto->codigo_prod }}</td>
                        <td>{{ $producto->destacado }}</td>
                        <td>{{ $producto->status }}</td>
                        <td>{{ $producto->created_at }}</td>
                 

                        <td>
                            <a href="/productos/{{ $producto->id }}/edit" class="btn btn bg-gradient-warning btn-sm"> <i class="fa fa-bell"></i>Edit</a>
                            <form action="/productos/{{  $producto->id }}" method="POST" style="display: inline">

                                @csrf
                                @method('DELETE')


                              <button class="btn btn bg-gradient-danger btn-sm">Delete</button>
                          </form>
                        </td>
                      </tr>

                    @endforeach



                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection
