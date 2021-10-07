@isset($producto)
          <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name"  value="{{ $producto->name}}" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <input type="text" class="form-control" name="name"  value="{{ $producto->name}}" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Precio</label>
                  <input type="text" class="form-control" name="name"  value="{{ $producto->name}}" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Codigo Producto</label>
                  <input type="text" class="form-control" name="name"  value="{{ $producto->name}}" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Destacado</label>
                  <input type="text" class="form-control" name="name"  value="{{ $producto->name}}" placeholder="Nombre" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">status</label>
                  <input type="text" class="form-control" name="name"  value="{{ $producto->name}}" placeholder="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" class="form-control" name="file" accept="images/*"  >
                  @error('file')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

          <div class="form-group">
            {{-- //////////////////// --}}
            @isset($producto->path_image)
            <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                  <li>
                    <span class="mailbox-attachment-icon has-img">

                        <img src="{{ $producto->path_image }}" alt="" style="width: 150px">
                    </span>

                    <div class="mailbox-attachment-info" >
                          <span class="mailbox-attachment-size clearfix ">
                            <small  id="image_img" class="btn btn-default btn-sm float-right"><i class="far fa-trash-alt"></i></small>
                      
                            <input type="hidden"  id="image_id" value="{{ $producto->id }}">
                          
                        </span>
                    </div>
                  </li>
                </ul>
              </div>
              @endisset
            {{-- //////////////////// --}}
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
                
              
                <div class="form-group">
                  <label for="exampleInputEmail1" >Categorias test</label>
                  <select name="categorias_id[]" id="cat_id" class=" form-control selectpicker" multiple required >
                    @foreach ($categorias as $cat )
                        <option value=" {{ $cat->id }}"> {{ $cat->name }}</option>
                    @endforeach
                    </select>
                </div>

        
                <div id="select_sub">
                
                </div>
           


                <div class="row">
                  <div class="col-sm-6">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Destacado</label>
                      <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                          <input type="checkbox" class="custom-control-input"  name="destacado" id="destacado" checked>
                          <label class="custom-control-label" for="destacado"></label>
                        </div>
                      </div>
                    </div> 

                  </div>
                  <div class="col-sm-6">
                  <div class="form-group">
                  <label for="exampleInputEmail1">status</label>
                  <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input"  name="status" id="status" checked>
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

             </div>

          
    </div>
  
  </div>
               
@endisset

      
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>