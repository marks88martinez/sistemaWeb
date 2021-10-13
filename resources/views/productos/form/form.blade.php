@isset($producto)
<div class="card-body">
  <div class="row">
            <div class="col-sm-6">
               <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name" value="{{ $producto->name }}"   required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>

                  <textarea name="description"  class="form-control"  id="" cols="10" rows="4">{{ $producto->description }}</textarea>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                           <!-- ////////////////////////// -->

                          <label for="exampleInputEmail1">Categoria</label>


                              <ul class="tree" >
                              @foreach ($categorias as $cat )


                              <li class="has">
                                <input type="checkbox" name="categorias_id[]" value="{{ $cat->id }}" {{ in_array($cat->id, $proCat)? 'checked' : '' }} >
                                <label>{{ $cat->name }}  <span class="total">({{$cat->children->count()}})</span></label>
                                <ul style="display: block;">
                                  @foreach ($cat->children as $cat )


                                    <li class="">
                                      <input type="checkbox" name="Subcategorias_id[]" value="{{ $cat->id }} "{{ in_array($cat->id, $proCat)? 'checked' : '' }}>
                                      <label>{{ $cat->name }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                              </li>

                              @endforeach

                            </ul>

                        <!-- ////////////////////////// -->


                    </div>

                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Destacado </label>
                      <div class="form-group">
                          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                              <input type="checkbox" class="custom-control-input"  name="destacado" id="destacado" value="0"  {{ $producto->destacado === 'Active' ? 'checked':'' }}  >
                              <label class="custom-control-label" for="destacado"></label>
                              {{ $producto->destacado }}
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input"  name="status" id="status" value="0"  {{ $producto->status === 'Active' ? 'checked':'' }} >
                          <label class="custom-control-label" for="status"></label>
                          {{ $producto->status }}
                        </div>
                      </div>
                    </div>


                  </div>
                </div>



            </div>
            <div class="col-sm-6">


                <div class="form-group">
                  <label for="exampleInputEmail1">Precio</label>
                  <input type="text" class="form-control" name="precio" value="{{ $producto->precio }}""  placeholder="precio" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Precio Oferta</label>
                  <input type="text" class="form-control" name="precio_oferta" value="{{ $producto->precio_oferta }}"  placeholder="precio_oferta" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Codigo Producto</label>
                  <input type="text" class="form-control" name="codigo_prod" value="{{ $producto->codigo_prod }}"  placeholder="Codigo Producto" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">File</label>
                    <input type="file" id="file" class="form-control" name="file[]" accept=' images/*' multiple=true >
            </div>

                {{-- //////////////////// --}}
                <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Photos</h3>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Photo</th>

                              </tr>
                            </thead>
                            <tbody id="tablaPhotos">
                                @foreach ($producto->productoImagenes as $prod )
                                <tr>

                                  <td>
                                    {{$prod->id}}
                                      <img src=" {{ $prod->path_image }}"  style="width: 80px">

                                  </td>
                                  <td>
                                      <a id="deletePhoto"  onclick="imagenAlert({{ $prod->id }})" class="btn btn bg-gradient-danger btn-sm deletePhoto"> <i class="fa fa-trash"></i> Delete</a>
                                      <!-- <input type="hidden" class="image_id"  value="{{ $prod->id }}"> -->
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
                {{-- //////////////////// --}}

             </div>
    </div>

  </div>

@else
<div class="card-body">
  <div class="row">
    <div class="col-sm-6">
               <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name"  placeholder="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>

                  <textarea name="description"  class="form-control" id="" cols="10" rows="4"></textarea>
                </div>


                <!-- <div class="form-group">
                  <label for="exampleInputEmail1" >Categorias test</label>
                  <select name="categorias_id[]" id="cat_id" class=" form-control selectpicker" multiple required >
                    @foreach ($categorias as $cat )
                        <option value=" {{ $cat->id }}"> {{ $cat->name }}</option>
                    @endforeach
                    </select>
                </div> -->





                <div class="row">
                  <div class="col-sm-8">
                      <div class="form-group">
                           <!-- ////////////////////////// -->

                          <label for="exampleInputEmail1">Categoria</label>
                              <ul class="tree">
                              @foreach ($categorias as $cat )
                              <li class="has">
                                <input type="checkbox" name="categorias_id[]" value="{{ $cat->id }} ">
                                <label>{{ $cat->name }}  <span class="total">({{$cat->children->count()}})</span></label>
                                <ul>
                                  @foreach ($cat->children as $cat )

                                    <li class="">
                                      <input type="checkbox" name="Subcategorias_id[]" value="{{ $cat->id }} ">
                                      <label>{{ $cat->name }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                              </li>
                              @endforeach

                            </ul>

                        <!-- ////////////////////////// -->

                    </div>

                  </div>
                  <div class="col-sm-2">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Destacado</label>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input"  name="destacado" id="destacado" value="0" checked>
                          <label class="custom-control-label" for="destacado"></label>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-sm-2">
                      <div class="form-group">
                      <label for="exampleInputEmail1">status</label>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input"  name="status" id="status" value="0" checked>
                          <label class="custom-control-label" for="status"></label>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>



              </div>
              <div class="col-sm-6">


                <div class="form-group">
                  <label for="exampleInputEmail1">Precio</label>
                  <input type="text" class="form-control" name="precio" value=""  placeholder="precio" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Precio Oferta</label>
                  <input type="text" class="form-control" name="precio_oferta" value=""  placeholder="precio_oferta" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Codigo Producto</label>
                  <input type="text" class="form-control" name="codigo_prod" value=""  placeholder="Codigo Producto" >
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">File</label>
                    <input type="file" id="file" class="form-control" name="file[]" accept="images/*" multiple=true >
                </div>
                <div class="form-group">
                    <!-- ////////////imageloader////////////// -->
                    <div class="container col-12">
<!-- <h1>Modern Multi Image Uploader Example</h1> -->
<!-- <p class="lead">A Bootstrap & jQuery powered uploader plugin that provides a user-friendly and nice-looking interface for uploading multiple images to the web server.</p> -->
    <div id="frm" class="needs-validation" novalidate="">

      <!--Image Upload-->
      <div class="row mt-3 mb-2">

        <div class="col-12 pr-0 text-left">
          <label for="Images" class="col-form-label text-nowrap"><strong>Images loader</strong></label>
        </div>
      </div>

      <!--Image container -->
      <div class="row"
           data-type="imagesloader"
           data-errorformat="Accepted file formats"
           data-errorsize="Maximum size accepted"
           data-errorduplicate="File already loaded"
           data-errormaxfiles="Maximum number of images you can upload"
           data-errorminfiles="Minimum number of images to upload"
           data-modifyimagetext="Modify immage">

        <!-- Progress bar -->
        <div class="col-12 order-1 mt-2">
          <div data-type="progress" class="progress" style="height: 25px; display:none;">
            <div data-type="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%;">Load in progress...</div>
          </div>
        </div>

        <!-- Model -->
        <div data-type="image-model" class="col-4 pl-2 pr-2 pt-2" style="max-width:200px; display:none;">

          <div class="ratio-box text-center" data-type="image-ratio-box">
            <img data-type="noimage" class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded" src="/template_admin/imageloader/img/photo-camera-gray.svg" style="cursor:pointer;">
            <div data-type="loading" class="img-loading" style="color:#3e29fa; display:none;">
              <span class="fa fa-2x fa-spin fa-spinner"></span>
            </div>
            <img data-type="preview" class="btn btn-light ratio-img img-fluid p-2 image border dashed rounded" src="" style="display: none; cursor: default;">
            <span class="badge badge-pill badge-success p-2 w-50 main-tag" style="display:none;">Main</span>
          </div>

          <!-- Buttons -->
          <div data-type="image-buttons" class="row justify-content-center mt-2">
            <button data-type="add" class="btn btn-outline-success" type="button"><span class="fa fa-camera mr-2"></span>Add</button>
            <button data-type="btn-modify" type="button" class="btn btn-outline-success m-0" data-toggle="popover" data-placement="right" style="display:none;">
              <span class="fa fa-pencil-alt mr-2"></span>Modify
            </button>
          </div>
        </div>

        <!-- Popover operations -->
        <div data-type="popover-model" style="display:none">
          <div data-type="popover" class="ml-3 mr-3" style="min-width:150px;">
            <div class="row">
              <div class="col p-0">
                <button data-operation="main" class="btn btn-block btn-success btn-sm rounded-pill" type="button"><span class="fa fa-angle-double-up mr-2"></span>Main</button>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-6 p-0 pr-1">
                <button data-operation="left" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button"><span class="fa fa-angle-left mr-2"></span>Left</button>
              </div>
              <div class="col-6 p-0 pl-1">
                <button data-operation="right" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button">Right<span class="fa fa-angle-right ml-2"></span></button>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-6 p-0 pr-1">
                <button data-operation="rotateanticlockwise" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button"><span class="fas fa-undo-alt mr-2"></span>Rotate</button>
              </div>
              <div class="col-6 p-0 pl-1">
                <button data-operation="rotateclockwise" class="btn btn-block btn-outline-success btn-sm rounded-pill" type="button">Rotate<span class="fas fa-redo-alt ml-2"></span></button>
              </div>
            </div>
            <div class="row mt-2">
              <button data-operation="remove" class="btn btn-outline-danger btn-sm btn-block" type="button"><span class="fa fa-times mr-2"></span>Remove</button>
            </div>
          </div>
        </div>

      </div>

      <div class="form-group row">
        <div class="input-group">
          <!--Hidden file input for images-->
          <input id="files" type="file" name="files[]" data-button="" multiple="" accept="image/jpeg, image/png, image/gif," style="display:none;">
        </div>
      </div>

</div>

    <div class="row mt-2">
      <div class="col-md-4 offset-md-8 text-center mb-4">
        <button id="btnContinue" type="submit" form="frm" class="btn btn-block btn-outline-success float-right" data-toggle="tooltip" data-trigger="manual" data-placement="top" data-title="Continue">
          Continue<span id="btnContinueIcon" class="fa fa-chevron-circle-right ml-2"></span><span id="btnContinueLoading" class="fa fa-spin fa-spinner ml-2" style="display:none"></span>
        </button>
      </div>
    </div>

  </div>
                    <!-- ////////////////////////// -->


                </div>

             </div>


    </div>




  </div>

@endisset


              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
