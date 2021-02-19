@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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
                <h3 class="card-title">User Profile</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
              <div class="row">
              <div class="col-12 col-lg-9">
              <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                @include('includes.errors')

                <div class="row">
                <div class="col-6">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" name="name" class="form-control" id="name" 
                    placeholder="Enter Name" value="{{ $user->name }}">
                  </div>
                  <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" name="email" class="form-control" id="email" 
                    placeholder="Enter Email" value="{{ $user->email }}">
                  </div>
                  <div class="form-group">
                    <label for="password">User Password <small class="text-info">(Enter the password if you want to change.)</small></label>
                    <input type="password" name="password" class="form-control" id="password" 
                    placeholder="Enter Password">
                  </div>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="username">User Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description">User Description</label>
                   <textarea name="description" id="description" id="" rows="10" class="form-control" 
                   placeholder="Enter Your Profile Description" >{{ $user->description }}</textarea>
                  </div>
                </div>
                </div>

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-lg btn-success">Update Profile</button>
                </div>
              </form>
              </div>
              <div class="col-lg-3">
              <div class="card-body text-center">
              <div style="height: 200px; width: 200px; overflow: hidden;" class="m-auto">
                  <img src="{{ asset($user->image) }}" alt="" class="img-fluid rounded-circle img-rounded">   
              </div>
              <div class="mt-2">
                  <h5>{{ $user->name }}</h5>
                  <p>{{ $user->email }}</p>
              </div>
              
              
              </div>
              </div>
              </div>
              </div><!-- /.card-body -->
            </div>
            </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection