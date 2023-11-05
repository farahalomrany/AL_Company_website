@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Attachment') }}</div>

                <div class="card-body">

                <form  method="POST" action="{{route('storewithcaseid')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                                
                  
                    <div class="form-group">
                        <label for="file_name">File Name:</label>
                        <input type="text" class="form-control" id="file_name" name="file_name" required>
                    </div>
                    <div class="form-group">
                        <label for="file_description">File Description:</label>
                        <input type="text" class="form-control" id="file_description" name="file_description" required>
                    </div> <div class="form-group">
                        <label for="file_url">File Url:</label>
                        <input type="file" class="form-control" id="file_url" name="file_url" required>
                    </div>
                    
                    <div class="form-group">
                        <!-- <label for="case_study_id">Project:</label> -->
                        <input type="hidden" class="form-control"  value="{{$id}}"id="case_study_id" name="case_study_id">

                    </div>
                    
                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/caseatt/all/{{$id}}" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
