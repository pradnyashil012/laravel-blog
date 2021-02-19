@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create Tag</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Home</a></li>
              <li class="breadcrumb-item">Tag List</li>
              <li class="breadcrumb-item active">Edit Tag</li>
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
                <h3 class="card-title">Edit Tag - {{ $tag->name }}</h3>
                <div>
                <a href="{{ route('tag.index') }}" class="btn btn-danger">Go Back To Create Tag</a>        
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
              <div class="row">
              <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
              <form action="{{ route('tag.update', [$tag->id]) }}" method="post">
              @csrf
              @method('PUT')
                <div class="card-body">
                @include('includes.errors')
                  <div class="form-group">
                    <label for="tagname">Tag Name</label>
                    <input type="text" name="tag" class="form-control" id="tag" value="{{ $tag->name }}">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                   <textarea name="description" id="description" id="" cols="30" rows="10" class="form-control" >
                   {{ $tag->description }}
                   </textarea>
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