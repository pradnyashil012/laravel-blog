@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
              <li class="breadcrumb-item">User List</li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="d-flex justify-content-between aligh-items-center">
                <h3 class="card-title">Edit user - {{ $user->name }}</h3>
                <div>
                <a href="{{ route('user.index') }}" class="btn btn-danger">Go Back To Create User</a>        
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
              <div class="row">
              <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
              <form action="{{ route('user.update', $user->id) }}" method="post">
              @csrf
              @method('PUT')
                <div class="card-body">
                @include('includes.errors')
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                  </div>
                  <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                  </div>
                  <div class="form-group">
                    <label for="password">User Password <small>(Enter password if you want to change)</small></label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                   <textarea name="description" id="description" id="" cols="30" rows="10" class="form-control" 
                   >{{ $user->description }}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-lg btn-primary">Update</button>
                </div>
              </form>
              </div>
              </div>
              <!-- form start -->
              
            </div>
              </div><!-- /.card-body -->
            </div>
            </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection