@extends('layouts.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Categoria</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <a href="" type="button" class="btn btn bg-gradient-primary btn-sm float-right p-2 m-2"><i class="fa fa-user"></i>  New Categoria</a>
           </li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
{{-- //////////////////// --}}
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Categoria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method = "POST" action= "categorias/{{ $categoria->id }}" enctype="multipart/form-data">
                {{method_field('put')}}
                @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name" value="{{ $categoria->name }}" placeholder="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" class="form-control" name="file" accept="images/*"  required>
                  @error('file')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
