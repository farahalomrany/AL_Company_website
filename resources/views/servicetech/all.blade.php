@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Technologies for Service : {{$service->title}}</div>

                <div class="card-body">
                <a href="{{route('all_service')}}" class="btn btn-info">Turn back</a>

                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Technology</th>
                           
                            <th><a href="{{route('add_servicetech', $service->id)}}" class="btn btn-warning">Add Technology</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($servtech as $p)
                            <tr>
                                <td>{{$p->technology->name}}</td>
                                <td>
						        	<!-- <a href="/service/tech/edit/{{$p->id}}" class="btn btn-success">Edit</a> -->
						        	<a href="/service/tech/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Remove</a>

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
