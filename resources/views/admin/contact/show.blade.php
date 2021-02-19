@extends('layouts.admin')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View message</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('contact.index')}}">Home</a></li>
              <li class="breadcrumb-item">message List</li>
              <li class="breadcrumb-item active">View message</li>
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
                <h3 class="card-title">View message</h3>
                <div>
                <a href="{{ route('contact.index') }}" class="btn btn-danger">Go Back To Messages</a>        
                </div>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body p-0">
              <table class="table table-bordered table-default mt-4">
              <tbody>
              
              <tr>
              <th style="width: 200px">Name</th>
              <td>{{ $message->name }}</td>
              </tr>
              <tr>
              <th style="width: 200px">Email</th>
              <td>{{ $message->email }}</td>
              </tr>
              <tr>
              <th style="width: 200px">Subject</th>
              <td>
              {{ $message->subject }}
              </td>
              </tr>
              <tr>
              <th style="width: 200px">Message</th>
              <td>
              <textarea class="form-control" 
                   placeholder="Enter Description">{{ $message->message }}</textarea>
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