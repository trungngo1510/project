@extends('admin.layouts.app_db')
@section('content')

                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    @if(session('success'))
                                <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                                            <h4><i class="icon fa fa-check"></i>Thông báo !</h4>
                                            {{session('success')}}
                                        </div>
                                @endif
                                <h4 class="card-title">Category Table</h4>
                                <div class="table-responsive">
                               
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name Category</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($category as $cate)
                                            <tr>
                                                <td>{{$cate->id}}</td>
                                                <td>{{$cate->name}}</td>
                                             <td>
                                            <a href="/delete/{{$cate->id}}" class="btn btn-danger">Delete</a>
                                             </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                <a href="{{url('admin/add_category')}}"><button type="button" class="btn btn-primary">Add Category</button> </a>    
                                         </div>
                                </div>
                        </div>
                </div>    

@endsection