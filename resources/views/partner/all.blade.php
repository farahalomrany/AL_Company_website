@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Partners</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Logo</th>
                            <th>Description</th>

                            <th><a href="{{route('add_partner')}}" class="btn btn-warning">Add Partner</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($partn as $p)
                            <tr>
                                <td>{{$p->name}}</td>
                                <td>
                                    @if($p->logo != null)    
                                    <a href="{{env('APP_URL')}}/storage/{{ $p->logo }}"><img src="{{env('APP_URL')}}/storage/{{ $p->logo }}"
                                                style="width:100px"></a>
                                    @endif
                                </td>
                                <td>{{$p->description}}</td>

                                <td>
						        	<a href="/partner/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/partner/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Delete</a>
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
