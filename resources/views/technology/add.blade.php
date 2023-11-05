@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add technology</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_tech')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  id="name" name="name" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="image_icon">Image Icon:</label>
                        <input type="file" class="form-control"  id="image_icon" name="image_icon" required>
                    </div>
                 
            
                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/techs" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
