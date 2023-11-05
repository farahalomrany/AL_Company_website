@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Project Gallery</div>

                <div class="card-body">
                   <form action="" method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                   	@csrf   
                    
                    
                    <div class="form-group">
                        <label for="file_name">File Name:</label>
                        <input type="text" class="form-control" id="file_name" name="file_name"value="{{$att->file_name}}" >
                    </div>
                    <div class="form-group">
                        <label for="file_description">File Description:</label>
                        <input type="text" class="form-control" id="file_description" name="file_description" value="{{$att->file_description}}">
                    </div>
                    
                    <div class="form-group">
                        <label for="file_url">File Url:</label>
                        @if($att->file_url != null)
                        <a href="{{env('APP_URL')}}/storage/{{$att->file_url}}">{{$att->file_url}}</a>
                        <!-- <input type="checkbox" id="file_url" name="file_url">
                        <label for="file_url"> Delete file_url</label><br> -->
                        @endif
                        <input type="file" class="form-control"  id="file_url" name="file_url" >

                    </div>
                    
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/caseatt/all/{{$id}}" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
