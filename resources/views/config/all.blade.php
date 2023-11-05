@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">Configs</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Key</th>
                            <th>Type</th>
                            <th>Value</th>
                            <th><a href="{{route('add_config')}}" class="btn btn-warning">Add Config</a></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($con as $p)
                            <tr>
                                <td>{{$p->id}}</td>
                                <td>{{$p->ckey}}</td>
                                <td>{{$p->type}}</td>
                                @if($p->type == "boolean")
                                    @if($p->value == 1)
                                        <td>true</td>
                                    @else
                                        <td>false</td>
                                    @endif
                                @else
                                    <td>{{$p->value}}</td>
                                @endif
                                <td>
						        	<a href="/config/edit/{{$p->id}}" class="btn btn-success">Edit</a>
                                    @if($p->can_delete==0)
						        	<a href="/config/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
                                    @endif
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
