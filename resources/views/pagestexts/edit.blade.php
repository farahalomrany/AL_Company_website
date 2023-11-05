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
                        <label for="text">Text:</label>
                        <textarea class="form-control" id="text" name="text" >{{$text->text}}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="text_name">Text Name:</label>
                        <input type="text" class="form-control"  id="text_name" name="text_name" value="{{$text->text_name}}" disabled>
                    </div>  <div class="form-group">
                        <label for="page_name">Page Name:</label>
                        <input type="text" class="form-control"  id="page_name" name="page_name"value="{{$text->page_name}}" disabled>
                    </div>
                 
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/texts" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
