@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Services</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Image Icon</th>
                            <th>Description</th>
                            <th><a href="{{route('add_service')}}" class="btn btn-warning">Add Service</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($serv as $p)
                            <tr>
                                <td>{{$p->title}}</td>
                                <td>
                                    @if($p->image_icon != null)    
                                    <a href="{{env('APP_URL')}}/storage/{{ $p->image_icon }}"><img src="{{env('APP_URL')}}/storage/{{ $p->image_icon }}"
                                                style="width:100px"></a>
                                    @endif
                                </td>
                                <td>{{$p->description}}</td>

                                <td>
						        	<a href="/service/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/service/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDeletewithrelations()">Delete</a>
                                    <a href="/services/techs/{{$p->id}}" class="btn btn-info">View Tecnologies</a>  

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
