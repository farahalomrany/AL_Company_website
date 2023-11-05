@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Image Config</div>

                <div class="card-body">
                <form  method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    
                
                    <div class="form-group">
                        <label for="hight">Hieght:</label>
                        <input type="number" step="0.01"class="form-control"  id="hight" name="hight" value="{{$imco->hight}}">
                    </div>
                    <div class="form-group">
                        <label for="width">Width:</label>
                        <input type="number" step="0.01" class="form-control"  id="width" name="width" value="{{$imco->width}}">
                    </div>
                
                    
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/image/configs" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
