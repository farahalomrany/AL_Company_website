@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product Gallery') }}</div>

                <div class="card-body">
                <form  method="POST" action="{{route('storewithproductid')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                                
                
                    <div class="form-group">
                        <label for="image_url">Image Url:</label>
                        <input type="file" class="form-control" placeholder="select image_url" id="image_url" name="image_url" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="product_id">product:</label> -->
                        <input type="hidden" class="form-control"  value="{{$id}}"id="product_id" name="product_id">

                    </div>
                    
                    <button type="submit" class="btn btn-info">save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
