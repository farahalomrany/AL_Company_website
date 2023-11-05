@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">Vacancy Criteria for vacancy : {{$vac->job_title}}</div>

                <div class="card-body">
                <a href="{{route('all_vacancy')}}" class="btn btn-info">Turn back</a>

                <table class="table table-striped">
                        <thead>
                        <tr> 
                            <th>Item</th>
                           
                            <th><a href="/vacancy/critera/add/{{$id}}" class="btn btn-warning">Add Criteria</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($criteras as $p)
                        
                            <tr>
                            <td>{{$p->item}}</td>

                                <td>
						        	<a href="/vacancy/critera/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/vacancy/critera/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
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
