@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Vacancy</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_vacancy')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="job_title">Job Title:</label>
                        <input type="text" class="form-control"  id="job_title" name="job_title" required>
                    </div>
                    <div class="form-group">
                        <label for="job_description">Job Description:</label>
                        <textarea class="form-control" id="job_description" name="job_description" required></textarea>

                    </div>
                   
                   
                    <div class="form-group" class="form-control">
                        <label for="is_open">Is Open:</label><br>
                        <select name="is_open" class="form-control">
                            <option value="1">true</option>
                            <option value="0">false</option>
                        </select>
                    </div>               
                   
            
                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/vacancies" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
