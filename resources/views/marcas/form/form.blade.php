@isset($marca)
          <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name"  value="{{ $marca->name}}" placeholder="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" class="form-control" name="file" accept="images/*"  >
                 
                </div>

          <div class="form-group">
            {{-- //////////////////// --}}
            @isset($marca->path_image)
            <div class="card-footer bg-white">
                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                  <li>
                    <span class="mailbox-attachment-icon has-img">

                        <img src="{{ $marca->path_image }}" alt="" style="width: 150px">
                    </span>

                    <div class="mailbox-attachment-info" >
                          <span class="mailbox-attachment-size clearfix ">
                            <small  id="image_img" class="btn btn-default btn-sm float-right"><i class="far fa-trash-alt"></i></small>

                            <input type="hidden"  id="image_id" value="{{ $marca->id }}">

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
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <input type="text" class="form-control" name="name"  placeholder="Nombre" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">File</label>
                  <input type="file" class="form-control" name="file" accept="images/*"   >
                 
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
@endisset


              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
