@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Service</div>

                <div class="card-body">
                <form  method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Full Name:</label>
                        <input type="text" class="form-control"  id="title" name="title" value="{{$serv->title}}">
                    </div>   
                    <div class="form-group">
                        <label for="image_icon">Profile Photo:</label>
                        @if($serv->image_icon != null)
                        <a href="{{env('APP_URL')}}/storage/{{$serv->image_icon}}"><img src="{{env('APP_URL')}}/storage/{{$serv->image_icon}}" style="width:100px"></a>
                        <input type="checkbox" id="chechbox" name="chechbox">
                        <label for="checkbox"> Delete image</label><br>
                        @endif
                        <input type="file" class="form-control"  id="image_icon" name="image_icon" >

                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control"  id="description" name="description" value="{{$serv->description}}">
                    </div>
                 
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/services" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
