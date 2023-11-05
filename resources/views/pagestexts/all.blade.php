@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Texts</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                       
                            <th>Text</th>
                            <th>Text Name</th>
                            <th>Page Name</th>

                            <th><a href="{{route('add_text')}}" class="btn btn-warning">Add Texts</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($text as $p)
                            <tr>
                                <td>{{$p->text}}</td>
                                <td>{{$p->text_name}}</td>
                                <td>{{$p->page_name}}</td>

                                <td>
						        	<a href="/text/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/text/delete/{{$p->id}}" class="btn btn-danger"onclick="return confirmDelete()">Delete</a>
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
