@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Vacancy</div>

                <div class="card-body">
                <form  action="" method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group">
                        <label for="job_title">Job Title:</label>
                        <input type="text" class="form-control"  id="job_title" name="job_title" value="{{$vac->job_title}}">
                    </div>
                    <div class="form-group">
                        <label for="job_description">Job Description:</label>
                        <textarea class="form-control" id="job_description" name="job_description" required>{{$vac->job_description}}</textarea>
                    </div>    
                    <div class="form-group" class="form-control">
                        <label for="is_open">Is Open:</label><br>
                        <select name="is_open" class="form-control">
                        {{$vac->is_open}}
                        @if($vac->is_open == 1)
                       
                        <option value="1" selected>true</option>
                        <option value="0">false</option>
                        @else
                        <option value="1" >true</option>
                        <option value="0"selected>false</option>
                        @endif
                        </select>
                    </div>  
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/vacancies" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
