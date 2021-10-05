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