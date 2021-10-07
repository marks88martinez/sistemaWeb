            <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  @isset($categoria)
                     <input type="text" class="form-control" name="name" value="{{ $categoria->name }}" placeholder="Nombre" required>
                  @else
                     <input type="text" class="form-control" name="name" value="" placeholder="Nombre" required>
                  @endisset
                </div>

                <div class="form-group">
            {{-- //////////////////// --}}
            @isset($categoria->path_image)
            <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                  <li>
                    <span class="mailbox-attachment-icon has-img">

                        <img src="{{ $categoria->path_image }}" alt="" style="width: 150px">
                    </span>

                    <div class="mailbox-attachment-info" >
                          <span class="mailbox-attachment-size clearfix ">
                            <small  id="image_img" class="btn btn-default btn-sm float-right"><i class="far fa-trash-alt"></i></small>
                      
                            <input type="hidden"  id="image_id" value="{{ $categoria->id }}">
                          
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
                  <input type="file" class="form-control" name="file" accept="images/*" >
                  @error('file')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>


            </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>