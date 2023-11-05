@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Case Study</div>

                <div class="card-body">
                   <form action="" method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                   	@csrf   
                    
                       <div class="form-group">
                        <label for="analysis_phase">Analysis Phase:</label>
                        <textarea class="form-control" id="analysis_phase" name="analysis_phase" required>{{$case->analysis_phase}}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="design_phase">Design Phase:</label>
                        <textarea class="form-control" id="design_phase" name="design_phase" required>{{$case->design_phase}}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="development_phase">Development Phase:</label>
                        <textarea class="form-control" id="development_phase" name="development_phase" required>{{$case->development_phase}}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="test_phase">Test Phase:</label>
                        <textarea class="form-control" id="test_phase" name="test_phase" required>{{$case->test_phase}}</textarea>

                    </div>
                    
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/casestudy/all/{{$id}}" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
