@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Partner</div>

                <div class="card-body">
                <form  method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  id="name" name="name" value="{{$partn->name}}">
                    </div>
                
                    <div class="form-group">
                        <label for="logo">Logo:</label>
                        @if($partn->logo != null)
                        <a href="{{env('APP_URL')}}/storage/{{$partn->logo}}"><img src="{{env('APP_URL')}}/storage/{{$partn->logo}}" style="width:100px"></a>
                        <input type="checkbox" id="chechbox" name="chechbox">
                        <label for="checkbox"> Delete image</label><br>
                        @endif
                        <input type="file" class="form-control"  id="logo" name="logo" >
                    </div>
                    <div class="form-group">
                        <label for="description">description:</label>
                        <input type="text" class="form-control"  id="description" name="description" value="{{$partn->description}}">
                    </div>
                
                    
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/partners" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
