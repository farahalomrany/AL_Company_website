@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Employees</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Pre Name</th>
                            <th>Job Title</th>
                            <th>Profile Photo</th>
                            <th>Description</th>
                            <th><a href="{{route('add_employee')}}" class="btn btn-warning">Add Employee</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($emply as $p)
                            <tr>
                                <td>{{$p->full_name}}</td>
                                <td>{{$p->pre_name}}</td>
                                <td>{{$p->job_title}}</td>
                                <td>
                                    @if($p->profile_photo != null)    
                                    <a href="{{env('APP_URL')}}/storage/{{ $p->profile_photo }}"><img src="{{env('APP_URL')}}/storage/{{ $p->profile_photo }}"
                                                style="width:100px"></a>
                                    @endif
                                </td>
                                <td>{{$p->description}}</td>

                                <td>
						        	<a href="/employee/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/employee/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDeletewithrelations()">Delete</a>
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
