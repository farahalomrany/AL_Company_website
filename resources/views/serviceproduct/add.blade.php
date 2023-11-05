@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add service to Product</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_serviceproduct')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="service_id">Service:</label>
                            <select class="form-control" name="service_id" required>
                            @foreach($services as $t)
                                <option value="{{$t->id}}">
                                {{$t->title}}
                                </option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group d-none">
                        <label for="product_id" >Product:</label>
                        <input type="text" class="form-control"  id="product_id" name="product_id" value="{{$product_id}}">
                    </div>
            
                    <button type="submit" class="btn btn-info">save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
