@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Images</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Image_mobile</th>
                            <th>Image Name</th>
                            <th>Page Name</th>

                            <th><a href="{{route('add_image')}}" class="btn btn-warning">Add Image</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($image as $p)
                            <tr>
                                <td>
                                    @if($p->image != null)    
                                    <a href="{{env('APP_URL')}}/storage/{{ $p->image }}"><img src="{{env('APP_URL')}}/storage/{{ $p->image }}"
                                                style="width:100px"></a>
                                    @endif
                                </td>
                                <td>
                                    @if($p->image_mobile != null)    
                                    <a href="{{env('APP_URL')}}/storage/{{ $p->image_mobile }}"><img src="{{env('APP_URL')}}/storage/{{ $p->image_mobile }}"
                                                style="width:100px"></a>
                                    @endif
                                </td>
                                <td>{{$p->image_name}}</td>
                                <td>{{$p->page_name}}</td>

                                <td>
						        	<a href="/image/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/image/delete/{{$p->id}}" class="btn btn-danger"onclick="return confirmDelete()">Delete</a>
						        </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
