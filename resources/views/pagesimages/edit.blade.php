@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit image</div>

                <div class="card-body">
                <form  method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="image">Image:</label>
                        @if($pimage->image != null)
                        <a href="{{env('APP_URL')}}/storage/{{$pimage->image}}"><img src="{{env('APP_URL')}}/storage/{{$pimage->image}}" style="width:100px"></a>
                        <input type="checkbox" id="chimage" name="chimage">
                        <label for="chimage"> Delete image</label><br>
                        @endif
                        <input type="file" class="form-control"  id="image" name="image" >

                    </div>
                    <div class="form-group">
                        <label for="image_mobile">Image Mobile:</label>
                        @if($pimage->image_mobile != null)
                        <a href="{{env('APP_URL')}}/storage/{{$pimage->image_mobile}}"><img src="{{env('APP_URL')}}/storage/{{$pimage->image_mobile}}" style="width:100px"></a>
                        <input type="checkbox" id="mobile" name="mobile">
                        <label for="mobile"> Delete Mobile Image</label><br>
                        @endif
                        <input type="file" class="form-control"  id="image_mobile" name="image_mobile" >

                    </div>
                    <div class="form-group">
                        <label for="image_name">Image Name:</label>
                        <input type="text" class="form-control"  id="image_name" name="image_name" value="{{$pimage->image_name}}">
                    </div>
                    <div class="form-group">
                        <label for="page_name">Page Name:</label>
                        <input type="text" class="form-control"  id="page_name" name="page_name" value="{{$pimage->page_name}}">
                    </div>
                 
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/images" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
