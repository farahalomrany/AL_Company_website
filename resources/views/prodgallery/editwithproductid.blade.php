@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product Gallery</div>

                <div class="card-body">
                   <form action="" method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                   	@csrf   
                    
                    <div class="form-group">
                        <label for="image_url">Image URL:</label>
                        @if($im->image_url != null)
                        <a href="{{env('APP_URL')}}/storage/{{$im->image_url}}"><img src="{{env('APP_URL')}}/storage/{{$im->image_url}}" style="width:100px"></a>
                        @endif
                        <input type="file" class="form-control" placeholder="select image_url" id="image_url" name="image_url">
                    </div>
                    
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
