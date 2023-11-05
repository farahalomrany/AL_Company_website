@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Images Configs</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Table Name</th>
                            <th>Field Name</th>
                            <th>Hieght</th>
                            <th>Width</th>

                            <th><a href="{{route('add_image_config')}}" class="btn btn-warning">Add Image Config</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($imco as $p)
                            <tr>
                                <td>{{$p->table_name}}</td>
                                <td>{{$p->field_name}}</td>
                                <td>{{$p->hight}}</td>
                                <td>{{$p->width}}</td>

                               
                                <td>
						        	<a href="/image/config/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/image/config/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
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
