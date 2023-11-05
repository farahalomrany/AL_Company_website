@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Partner</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_partner')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        <input type="file" class="form-control"  id="logo" name="logo" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control"  id="description" name="description" >
                    </div>

                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/partners" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
