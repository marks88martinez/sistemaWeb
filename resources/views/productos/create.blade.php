@extends('layouts.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> productos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <a href="/productos/create" type="button" class="btn btn bg-gradient-primary btn-sm float-right p-2 m-2"><i class="fa fa-user"></i>  New producto</a>
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
              <h3 class="card-title">Create producto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method = "POST" action= "{{ route('productos.store') }}" enctype="multipart/form-data" >
                {{method_field('post')}}
                @csrf
                @include('productos.form.form')

              <!-- /.card-body -->


            </form>
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')
  <script src="/js/productoCategoria.js"></script>
  <script>
    Dropzone.options.myDropzone = {
        url: "/fake/location",
        autoProcessQueue: false,
        uploadMultiple: true,
        paramName: "file",
        clickable: true,
        maxFilesize: 5, //in mb
        addRemoveLinks: true,
        dictRemoveFile: 'Remover --',
        acceptedFiles: '.png,.jpg',
        dictDefaultMessage: "Upload your file here",

        init: function() {
          this.on("sending", function(file, xhr, formData) {
            console.log("sending file");
          });
          this.on("success", function(file, responseText) {
            console.log('great success');
          });
          this.on("addedfile", function(file){
                console.log('file added'+file.name);



            });
        }
      };
  </script>


@stop
