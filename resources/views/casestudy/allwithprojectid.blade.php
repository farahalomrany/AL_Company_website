@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">Case Study for Project : {{$project->name}} </div>

                <div class="card-body">
                <a href="{{route('all_project')}}" class="btn btn-info">Turn back</a>

                <table class="table table-striped">
                        <thead>
                        <tr>
                      
                            <th>Analysis Phase</th>
                            <th>Design Phase</th>
                            <th>Development Phase</th>
                            <th>Test Phase</th>
                           @if(count($cases)==0)
                            <th><a href="/casestudy/add/{{$id}}" class="btn btn-warning">Add Case Study</a></th>

                           @endif

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cases as $p)
                        
                            <tr>
                            <td>{{$p->analysis_phase}}</td>
                            <td>{{$p->design_phase}}</td>
                            <td>{{$p->development_phase}}</td>
                            <td>{{$p->test_phase}}</td>

                                <td>
						        	<a href="/casestudy/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/casestudy/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDeletewithrelations()">Delete</a>
                                    <a href="/caseatt/all/{{$p->id}}" class="btn btn-primary">Attachment files</a>
                                    <a href="/casech/all/{{$p->id}}" class="btn btn-primary">Charts</a>

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
