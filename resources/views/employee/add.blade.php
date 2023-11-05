@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Employee</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_employee')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="text" class="form-control"  id="full_name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="pre_name">Pre Name:</label>
                        <input type="text" class="form-control"  id="pre_name" name="pre_name" required>
                    </div>
                    <div class="form-group">
                        <label for="job_title">Job Title:</label>
                        <input type="text" class="form-control"  id="job_title" name="job_title" required>
                    </div>
                    <div class="form-group">
                        <label for="profile_photo">Profile Photo:</label>
                        <input type="file" class="form-control"  id="profile_photo" name="profile_photo" >
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control"  id="description" name="description">
                    </div>
            
                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/employees" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
