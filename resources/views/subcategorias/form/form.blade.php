            @isset($subcategoria)

            
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name" value="{{ $subcategoria->name }}" placeholder="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Categorias</label>
                  <select name="categorias_id" id="" class=" form-control">
                    @foreach ($categorias as $cat )
                        <option value=" {{ $cat->id }}"> {{ $cat->name }}</option>
                    @endforeach
                    </select>
                </div>


                <div class="form-group">
                {{-- //////////////////// --}}
                @isset($subcategoria->path_image)
                <div class="card-footer bg-white">
                    <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                    <li>
                        <span class="mailbox-attachment-icon has-img">

                            <img src="{{ $subcategoria->path_image }}" alt="" style="width: 150px">
                        </span>

                        <div class="mailbox-attachment-info" >
                            <span class="mailbox-attachment-size clearfix ">
                                <small  id="image_img" class="btn btn-default btn-sm float-right"><i class="far fa-trash-alt"></i></small>
                        
                                <input type="hidden"  id="image_id" value="{{ $subcategoria->id }}">
                            
                            </span>
                        </div>
                    </li>
                    </ul>
                </div>
                @endisset
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


            @else
            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name"  placeholder="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Categorias</label>
                  <select name="categorias_id" id="" class=" form-control">
                    @foreach ($categorias as $cat )
                        <option value=" {{ $cat->id }}"> {{ $cat->name }}</option>
                    @endforeach
                    </select>
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
              

              @endisset