@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Chart</div>

                <div class="card-body">
                   <form action="" method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                   	@csrf   
                    
                    
                     <div class="form-group">
                        <label for="chart_title">Chart Title:</label>
                        <input type="text" class="form-control" id="chart_title" name="chart_title" value="{{$ch->chart_title}}">
                    </div>
                    <div class="form-group">
                        <label for="chart_description">Chart Description:</label>
                        <input type="text" class="form-control" id="chart_description" name="chart_description" value="{{$ch->chart_description}}">
                    </div>
                    <div class="form-group">
                        <label for="chart_image_url">Chart Image:</label>
                        @if($ch->chart_image_url != null)
                        <a href="{{env('APP_URL')}}/storage/{{$ch->chart_image_url}}"><img src="{{env('APP_URL')}}/storage/{{$ch->chart_image_url}}" style="width:100px"></a>
                        <input type="checkbox" id="chechbox" name="chechbox">
                        <label for="checkbox"> Delete image</label><br>
                        @endif
                        <input type="file" class="form-control" placeholder="select chart_image_url" id="chart_image_url" name="chart_image_url">
                    </div>
                    
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/casech/all/{{$id}}" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
