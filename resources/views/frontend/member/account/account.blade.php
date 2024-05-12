@extends('frontend.layouts.app')
@section('content')
            <div>
                <h2>hello</h2>
                            @if(session('success'))
                                <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">X</button>
                                            <h4><i class="icon fa fa-check"></i>Thông báo !</h4>
                                            {{session('success')}}
                                        </div>
                                @endif
            </div>
@endsection