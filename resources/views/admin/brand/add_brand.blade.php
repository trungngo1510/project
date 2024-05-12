@extends('admin.layouts.app_db')
@section('content')
<div class="card-body">
     <h4 class="card-title">Add Brands Table</h4>
      <div class="table-responsive">
       <table class="table">
       @if(session('success'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                     <h4><i class="icon fa fa-check"></i>Thông báo !</h4>
                       {{session('success')}}
            </div>
        @endif
        @if($errors->any())
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
        <h4><i class="icon fa fa-check"></i>Thông báo !</h4>
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
        <form  method="post">
        @csrf
            <label for="">Name Brand <span style="color:red;">(*)</span></label>
         <input type="text" class="form-control" name="title" aria-label="Default" aria-describedby="inputGroup-sizing-default">
       </table>
       <button type="submit" class="btn btn-primary" >Create Brand</button> 
       </form>
    </div>
@endsection