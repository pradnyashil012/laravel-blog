@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Create post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('post.index')}}">Home</a></li>
              <li class="breadcrumb-item">Post List</li>
              <li class="breadcrumb-item active">Create post</li>
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
                <h3 class="card-title">Create post</h3>
                <div>
                <a href="{{ route('post.index') }}" class="btn btn-danger">Go Back To Create Post</a>        
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
              <div class="row">
              <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
              <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                @include('includes.errors')
                  <div class="form-group">
                    <label for="postname">Post Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                    <label for="postname">Post Category</label>
                    <select name="category_id" id="category_id" class="form-control" {{ old('category_id') }}>
                    <option value="" style="display: none" selected>Select Category</option>
                    @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach

                    </select>
                  </div>
                  <div class="form-group">
                  <label for="image">Image</label>
                   <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                  </div>
                  <div class="form-group">
                  <label for="tags">Choose Post Tags:</label>
                  <div class="d-flex flex-wrap">
                  @foreach($tags as $tag)
                        <div class="form-check">
                          <input class="form-check-input" name="tag[]" type="checkbox" id="tag{{$tag->id}}" value="{{$tag->id}}">
                          <label for="tag{{$tag->id}}" class="form-check-label">{{$tag->name}}</label>
                        </div>     
                  @endforeach
                  </div>
                                       
                  </div>  
                  <div class="form-group">
                    <label for="description">Description</label>
                   <textarea name="description" id="description" id="" cols="30" rows="10" class="form-control" 
                   placeholder="Enter Description">{{ old('description') }}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-lg btn-primary">Submit</button>
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

@section('style')
<link rel="stylesheet" href="{{asset('/admin/css/summernote-bs4.min.css')}}">
@endsection

@section('script')
<script src="{{asset('/admin/js/summernote-bs4.min.js')}}">
</script>
<script>
      $('#description').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>
@endsection