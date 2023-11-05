@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Services for Product : {{$product->name}}</div>

                <div class="card-body">
                <a href="{{route('all_product')}}" class="btn btn-info">Turn back</a>

                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Service</th>
                           
                            <th><a href="{{route('add_serviceproduct', $product->id)}}" class="btn btn-warning">Add Service</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prodserv as $p)
                            <tr>
                                <td>{{$p->service->title}}</td>
                                <td>
						        	<!-- <a href="/service/product/edit/{{$p->id}}" class="btn btn-success">Edit</a> -->
						        	<a href="/service/product/delete/{{$p->id}}" class="btn btn-danger" onclick="return confirmDelete()">Remove</a>

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
