@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add image</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_image')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control"  id="image" name="image" >
                    </div>
                    <div class="form-group">
                        <label for="image_mobile">Image Mobile:</label>
                        <input type="file" class="form-control"  id="image_mobile" name="image_mobile" >
                    </div>
                    <div class="form-group">
                        <label for="image_name">Image Name:</label>
                        <input type="text" class="form-control"  id="image_name" name="image_name" required>
                    </div>
                    <div class="form-group">
                        <label for="page_name">Page Name:</label>
                        <input type="text" class="form-control"  id="page_name" name="page_name" required>
                    </div>
            
                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/images" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
