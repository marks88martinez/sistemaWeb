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
                              <!-- <input type="checkbox" class="custom-control-input"  name="destacado" id="destacado" value="0"  {{ $producto->destacado === 'Active' ? 'checked':'' }}  > -->
                              <!-- <label class="custom-control-label" for="destacado"></label> -->
                              <!-- {{ $producto->destacado }} -->
                              <input type="checkbox"  data-toggle="toggle" name="destacado" value="0"  {{ $producto->destacado === 'Active' ? 'checked':''}}>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Status</label>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <!-- <input type="checkbox" class="custom-control-input"  name="status" id="status" value="0"  {{ $producto->status === 'Active' ? 'checked':'' }} >
                          <label class="custom-control-label" for="status"></label>
                          {{ $producto->status }} -->
                          <input type="checkbox"  data-toggle="toggle" name="status" value="0"  {{ $producto->status === 'Active' ? 'checked':''}}>

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
                    <!-- ////////////imageloader////////////// -->
                    <!-- <div class="input-images-2" style="padding-top: .5rem;"></div> -->
                     <div class="input-field">
                        <label class="active">Photos</label>
                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                    </div>
                    <!-- ////////////////////////// -->
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
                  <div class="col-sm-6">
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
                  <div class="col-sm-3">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Destacado</label>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" checked data-toggle="toggle" name="destacado" value="0" checked="false">
                        <!-- <input type="checkbox" class="custom-control-input"  name="destacado" id="destacado" value="0" checked>
                          <label class="custom-control-label" for="destacado"></label> -->
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                      <label for="exampleInputEmail1">status</label>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox"  checked data-toggle="toggle" name="destacado" checked >
                        <!-- <input type="checkbox" class="custom-control-input"  name="status" id="status" value="0" checked>
                          <label class="custom-control-label" for="status"></label> -->
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

                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">File</label>
                    <input type="file" id="file" class="form-control" name="file[]" accept="images/*" multiple=true >
                </div> -->
                <div class="form-group">
                    <!-- ////////////imageloader////////////// -->
                    <!-- <div class="input-images-2" style="padding-top: .5rem;"></div> -->
                     <div class="input-field">
                        <label class="active">Photos</label>
                        <div class="input-images-1" style="padding-top: .5rem;"></div>
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
