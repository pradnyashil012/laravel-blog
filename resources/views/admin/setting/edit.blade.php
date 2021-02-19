@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Site Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Site</li>
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
                <h3 class="card-title">Edit Site Setting</h3>
                <div>       
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
              <div class="row">
              <div class="col-12 col-lg-8 offset-lg-3 col-md-8 offset-md-2">
              <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
              
                <div class="card-body">
                @csrf
                @include('includes.errors')
                  <div class="form-group">
                    <label for="postname">Site Name</label>
                    <input type="text" name="name" value="{{ $setting->name }}" 
                    class="form-control" id="name" placeholder="Enter Name">
                  </div>
                  <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control" 
                    id="facebook" placeholder="Enter Facebook Url">
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input type="text" name="twitter" value="{{ $setting->twitter }}" 
                    class="form-control" id="twitter" placeholder="Enter Twitter Url">
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input type="text" name="instagram" value="{{ $setting->instagram }}" 
                    class="form-control" id="instagram" placeholder="Enter Instagram Url">
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="reddit">Reddit</label>
                    <input type="text" name="reddit" value="{{ $setting->reddit }}" 
                    class="form-control" id="reddit" placeholder="Enter Reddit Url">
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="postname">Email</label>
                    <input type="text" name="email" value="{{ $setting->email }}" 
                    class="form-control" id="email" placeholder="Enter Email Address">
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="copyright">Copyright</label>
                    <input type="text" name="copyright" value="{{ $setting->copyright }}" 
                    class="form-control" id="copyright" placeholder="Enter Copyright">
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="postname">Phone Number</label>
                    <input type="text" name="phone" value="{{ $setting->phone }}" 
                    class="form-control" id="phone" placeholder="Enter Phone Number">
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="copyright">Address</label>
                    <textarea name="address" id="address" rows="1" class="form-control">{{ $setting->address }}</textarea>
                  </div>
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="row">
                  <div class="col-8">
                  <label for="logo">Logo</label>
                   <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="logo">
                        <label class="custom-file-label" for="logo">Choose file</label>
                    </div>
                  </div>
                  <div class="col-4 text-right">
                    <div style="max-width: 100px; max-height: 100px; overflow: hidden; margin-left: auto;">
                      <img src="{{ asset($setting->logo) }}" class="img-fluid" alt="">
                    </div>
                  </div>
                  </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="description">Description</label>
                   <textarea name="description" id="description" cols="30" rows="10" class="form-control" 
                   placeholder="Enter Description">{{ $setting->description }}</textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="form-group">
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