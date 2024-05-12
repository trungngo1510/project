@extends('admin.layouts.app_db')
@section('content')
<div class="col-12">
 <div class="card">
<div class="card-body">
         <h4 class="card-title">Blogs List</h4>
         <div class="table-responsive">
          <table class="table">
                  <thead>
                      <tr>
                          <th class="">#</th>
                          <th >Title</th>
                          <th >Image</th>
                          <th >Description</th>
                          <th >Action</th>
                      </tr>
                  </thead>
                  <tbody>
                        @foreach($data as $row)
                      <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->title}}</td>
                            <td >{{$row->image}}</td>
                            <td>{{$row->description}}</td>
                            <td>
                               <a href="/admin/editBlogs/{{$row->id}}" class="btn btn-primary">Edit</a>
                               <a href="delete/{{$row->id}}" class="btn btn-danger">Delete</a>
                              </td>
                      </tr>
                     @endforeach
                   
                  </tbody>
              </table>
     </div>
     <a href="{{url('admin/addBlogs')}}"><button type="button" class="btn btn-primary">Add Blog</button> </a>    

        </div>
 </div>
</div>
@endsection