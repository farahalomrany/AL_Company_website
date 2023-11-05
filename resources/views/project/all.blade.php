@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Projects</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Domain</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Imp Year</th>

                            <th><a href="{{route('add_project')}}" class="btn btn-warning">Add Project</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proj as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>{{$p->domain}}</td>
                                <td>
                                    @if($p->image != null)    
                                    <a href="{{env('APP_URL')}}/storage/{{ $p->image }}"><img src="{{env('APP_URL')}}/storage/{{ $p->image }}"
                                                style="width:100px"></a>
                                    @endif
                                </td>
                                <td>{{$p->description}}</td>
                                <td>{{$p->imp_year}}</td>

                                <td>
						        	<a href="/project/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/project/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDeletewithrelations()">Delete</a>
                                    <a href="/employees/projects/{{$p->id}}" class="btn btn-info">View Employees</a>  
                                    <a href="/services/projects/{{$p->id}}" class="btn btn-primary">View Services</a>  
                                    <a href="/project/gallery/all/{{$p->id}}" class="btn btn-primary">Gallery</a>
                                    <a href="/casestudy/all/{{$p->id}}" class="btn btn-warning">Case Study</a>
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
