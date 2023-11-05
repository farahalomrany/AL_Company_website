@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">{{ __('Case Study Attachment') }}</div>

                <div class="card-body">
                <a href="/casestudy/all/{{$project_id}}" class="btn btn-info">Turn back</a>  

                <table class="table table-striped">
                        <thead>
                        <tr>
                       
                            <th>File Name</th>
                            <th>File Description</th>
                            <th>File Url</th>
                           
                            <th><a href="/caseatt/add/{{$id}}" class="btn btn-warning">Add Attachment</a></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($att as $p)
                        
                            <tr>
                            <td>{{$p->file_name}}</td>
                            <td>{{$p->file_description}}</td>
                            <td>
                                @if($p->file_url != null)    
                                <a href="{{env('APP_URL')}}/storage/{{ $p->file_url }}">{{$p->file_url}}</a>
                                @endif
                            </td>
                              
                                <td>
						        	<a href="/caseatt/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/caseatt/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Remove</a>

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
