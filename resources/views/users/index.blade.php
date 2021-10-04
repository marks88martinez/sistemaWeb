@extends('layouts.dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <a href="/users/create" type="button" class="btn btn bg-gradient-primary btn-sm float-right p-2 m-2"><i class="fa fa-user"></i>  New User</a>
           </li>

          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
{{-- //////////////////// --}}
<section class="content">
    <div class="container-fluid">


      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> Users </h3>





            <div class="card-tools">

                <div class="input-group input-group-sm" style="width: 150px;">
                  {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> --}}

                  <div class="input-group-append">
                    {{-- <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button> --}}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>User</th>
                    <th>Date</th>
                    {{-- <th>Status</th> --}}
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ( $users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        {{-- <td>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                  <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                                  <label class="custom-control-label" for="customSwitch3"></label>
                                </div>
                              </div>
                        </td> --}}
                        <td>
                            <a href="/users/{{ $user->id }}/edit" class="btn btn bg-gradient-warning btn-sm"> <i class="fa fa-bell"></i>Edit</a>

                            {{-- <button type="button" class="btn btn bg-gradient-warning btn-sm"><i class="fa fa-bell"></i> Edit</button> --}}
                            <form action="/users/{{  $user->id }}" method="POST"  style="display: inline">


                                @csrf
                                @method('DELETE')

                                @if(auth()->user()->id <> $user->id)
                                <button type="submit" class="btn btn bg-gradient-danger btn-sm"><i class="fa fa-trash"></i>Delete</button>
                                @else
                                <button type="submit" class="btn btn bg-gradient-danger btn-sm" disabled><i class="fa fa-trash"></i>Delete</button>

                                @endif
                            </form>
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

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

@endsection
