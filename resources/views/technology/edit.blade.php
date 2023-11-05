@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Technology</div>

                <div class="card-body">
                <form  method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  id="name" name="name" value="{{$tech->name}}">
                    </div>
                
                    <div class="form-group">
                        <label for="image_icon">Image Icon:</label>
                        @if($tech->image_icon != null)
                        <a href="{{env('APP_URL')}}/storage/{{$tech->image_icon}}"><img src="{{env('APP_URL')}}/storage/{{$tech->image_icon}}" style="width:100px"></a>
                        <input type="checkbox" id="chechbox" name="chechbox">
                        <label for="checkbox"> Delete image</label><br>
                        @endif
                        <input type="file" class="form-control"  id="image_icon" name="image_icon" >

                    </div>
                 
                 
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/techs" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
