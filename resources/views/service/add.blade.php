@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Service</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_service')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control"  id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="image_icon">Image Icon:</label>
                        <input type="file" class="form-control"  id="image_icon" name="image_icon" >
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control"  id="description" name="description">
                    </div>
            
                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/services" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
