@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All employees in Project : {{$project->name}}</div>

                <div class="card-body">
                <a href="{{route('all_project')}}" class="btn btn-info">Turn back</a>

                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Employee</th>
                           
                            <th><a href="{{route('add_employeeproject', $project->id)}}" class="btn btn-warning">Add employee</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($projemployee as $p)
                            <tr>
                                <td>{{$p->employee->full_name}}</td>
                                <td>
						        	<!-- <a href="/employee/project/edit/{{$p->id}}" class="btn btn-success">Edit</a> -->
						        	<a href="/employee/project/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Remove</a>

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
