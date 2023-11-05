@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Technologies</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image Icon</th>
                          
                            <th><a href="{{route('add_tech')}}" class="btn btn-warning">Add Technology</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tech as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>
                                    @if($p->image_icon != null)    
                                    <a href="{{env('APP_URL')}}/storage/{{ $p->image_icon }}"><img src="{{env('APP_URL')}}/storage/{{ $p->image_icon }}"
                                                style="width:100px"></a>
                                    @endif
                                </td>

                                <td>
						        	<a href="/tech/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/tech/delete/{{$p->id}}" class="btn btn-danger"onclick="return confirmDeletewithrelations()">Delete</a>
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
