@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('post.index')}}">Home</a></li>
              <li class="breadcrumb-item">Post List</li>
              <li class="breadcrumb-item active">View post</li>
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
                <h3 class="card-title">View post</h3>
                <div>
                <a href="{{ route('post.index') }}" class="btn btn-danger">Go Back To Create Post</a>        
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
              <table class="table table-bordered table-default mt-4">
              <tbody>
              <tr>
              <th style="width: 200px">Image</th>
              <td>
              <div style="max-width: 300px; max-height: 300px; overflow: hidden;">
              <img src="{{ asset($post->image) }}" alt="" class="img-fluid">
              </div>
              </td>
              </tr>
              <tr>
              <th style="width: 200px">Title</th>
              <td>{{ $post->title }}</td>
              </tr>
              <tr>
              <th style="width: 200px">Category Name</th>
              <td>{{ $post->category->name }}</td>
              </tr>
              <tr>
              <th style="width: 200px">Post Tags</th>
              <td>
              @foreach($post->tags as $tag)
                      <span class="badge badge-primary">{{ $tag->name }}</span>
                      @endforeach
              </td>
              </tr>
              <tr>
              <th style="width: 200px">Author Name</th>
              <td>{{ $post->user->name }}</td>
              </tr>
              <tr>
              <th style="width: 200px">Description</th>
              <td>
              <textarea name="description" id="description" id="" cols="30" rows="10" class="form-control" 
                   placeholder="Enter Description">{{ $post->description }}</textarea>
              </td>
              </tr>
              </tbody>
              </table>
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