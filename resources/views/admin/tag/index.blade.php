@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">tag List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Home</a></li>
              <li class="breadcrumb-item active">tag List</li>
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
                <h3 class="card-title">tag List</h3>
                <div>
                <a href="{{ route('tag.create') }}" class="btn btn-primary">Create Tag</a>        
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($tags->count())
                  @foreach($tags as $tag)
                  <tr>
                      <td>{{ $tag->id }}.</td>
                      <td>{{ $tag->name }}</td>
                      <td>{{ $tag->slug }}</td>
                      <td class="d-flex">
                      <a href="{{ route('tag.edit', [$tag->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>

                      <form action="{{ route('tag.destroy', [$tag->id]) }}" class="mr-1" method="post">
                      @method("DELETE")
                      @csrf
                      <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                      </form>
                      </td>
                    </tr>
                  @endforeach
                  @else
                  <tr>
                  <td colspan="5">
                  <h3 class="text-center">No Tags Found</h3>
                  </td>
                  </tr>
                  @endif
                   
                  </tbody>
                </table>
              </div><!-- /.card-body -->
              <div class="card-footer text-center d-flex justify-content-center">
              {{ $tags->links('pagination::bootstrap-4') }}
              </div>
            </div>
            </div>
            </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection