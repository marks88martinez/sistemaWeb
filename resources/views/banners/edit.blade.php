@extends('layouts.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Banner new</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <a href="" type="button" class="btn btn bg-gradient-primary btn-sm float-right p-2 m-2"><i class="fa fa-user"></i>  New User</a>
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
              <h3 class="card-title">Create Banner</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form method = "POST" action= " /banners/{{ $banner->id }}" enctype="multipart/form-data">
                {{method_field('put')}}
                @csrf

              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name" value="{{ $banner->name }}" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Url</label>
                  <input type="text" class="form-control" name="path_url" value="{{ $banner->path_url }}" placeholder="path_url" required>
                </div>
                <div class="form-group">



                    {{-- //////////////////// --}}
                    <div class="card-footer bg-white">
                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                          <li>
                            <span class="mailbox-attachment-icon has-img">

                                <img src="{{ $banner->path_image }}" alt="" style="width: 150px">
                            </span>

                            <div class="mailbox-attachment-info" >
                                  <span class="mailbox-attachment-size clearfix ">
                                    <small  id="banner_img" class="btn btn-default btn-sm float-right"><i class="far fa-trash-alt"></i></small>
                                    <input type="hidden"  id="banner_id" value="{{ $banner->id }}">
                                </span>
                            </div>
                          </li>
                        </ul>
                      </div>
                    {{-- //////////////////// --}}
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" class="form-control" name="file" accept="images/*"  >
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

  @section('scripts')
  <script src="/js/banner.js"></script>
  @stop
