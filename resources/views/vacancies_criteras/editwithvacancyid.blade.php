@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Vacancy Criteria</div>

                <div class="card-body">
                   <form action="" method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                   	@csrf   
                    
                       <div class="form-group">
                        <label for="item">Item:</label>
                        <input type="text" class="form-control" placeholder="select item" id="item" name="item" value="{{$im->item}}">
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
