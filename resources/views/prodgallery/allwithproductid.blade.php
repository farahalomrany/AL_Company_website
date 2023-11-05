@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">Product Gallery : {{$product->name}} </div>

                <div class="card-body">
                <a href="{{route('all_product')}}" class="btn btn-info">Turn back</a>

                <table class="table table-striped">
                        <thead>
                        <tr>
                    
                            <th>Image URL</th>
                           
                            <th><a href="/product/gallery/add/{{$id}}" class="btn btn-warning">Add Photo</a></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $p)
                        
                            <tr>
                                <td>
                                @if($p->image_url != null)    
                                <a href="{{env('APP_URL')}}/storage/{{ $p->image_url }}"><img src="{{env('APP_URL')}}/storage/{{ $p->image_url }}"
                                            style="width:100px"></a>
                                @endif
                                </td>
                                <td>
                                    
						        	<a href="/product/gallery/edit/{{$p->id}}" class="btn btn-success">Edit</a>
						        	<a href="/product/gallery/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Remove</a>
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
