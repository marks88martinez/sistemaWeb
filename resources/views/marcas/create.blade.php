@extends('layouts.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Marcas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <a href="" type="button" class="btn btn bg-gradient-primary btn-sm float-right p-2 m-2"><i class="fa fa-user"></i>  New Marca</a>
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
              <h3 class="card-title">Create Marca</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method = "POST" action= "{{ route('marcas.store') }}" enctype="multipart/form-data">
                {{method_field('post')}}
                @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name"  placeholder="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" class="form-control" name="file" accept="images/*"  required>
                  @error('file')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Active</label>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                      <label class="custom-control-label" for="customSwitch3"></label>
                    </div>
                  </div>
                </div> --}}


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
