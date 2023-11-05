@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">{{ __('Case Study Charts') }}</div>

                <div class="card-body">
                <a href="/casestudy/all/{{$project_id}}" class="btn btn-info">Turn back</a>  

                <table class="table table-striped">
                        <thead>
                        <tr>
                       
                            <th>Chart Title</th>
                            <th>Chart Description</th>
                            <th>Chart Image Url</th>
                           
                            <th><a href="/casech/add/{{$id}}" class="btn btn-warning">Add Chart</a></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ch as $p)
                        
                            <tr>
                            <td>{{$p->chart_title}}</td>
                            <td>{{$p->chart_description}}</td>
                            <td>
                                @if($p->chart_image_url != null)    
                                <a href="{{env('APP_URL')}}/storage/{{ $p->chart_image_url }}"><img src="{{env('APP_URL')}}/storage/{{ $p->chart_image_url }}"
                                            style="width:100px"></a>
                                @endif
                            </td>
                                <td>
						        	<a href="/casech/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/casech/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Remove</a>

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
