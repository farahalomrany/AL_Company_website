@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All vacancies</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Job Description</th>
                            <th>Is Open</th>
                          
                            <th><a href="{{route('add_vacancy')}}" class="btn btn-warning">Add Vacancy</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vac as $p)
                            <tr>
                                <td>{{$p->job_title}}</td>
                                <td>{{$p->job_description}}</td>
                                <td>{{$p->is_open}}</td>

                                <td>
						        	<a href="/vacancy/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/vacancy/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDeletewithrelations()">Delete</a>
                                    <a href="/vacancy/critera/all/{{$p->id}}" class="btn btn-primary">Criteria</a>
                                    <a href="/vacancy/applications/{{$p->id}}" class="btn btn-info">Applications</a>

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
