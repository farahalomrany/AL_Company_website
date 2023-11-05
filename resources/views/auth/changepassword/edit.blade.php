@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                   <form action="{{ route('change_password') }}" method="POST">
                   	@csrf
    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control"  id="email" name="email" >
                    </div>

                    <div class="form-group">
                        <label for="old_password">Enter Old Password:</label>
                        <input type="password" class="form-control"  id="old_password" name="old_password" >
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="new_password">Enter New Password:</label>
                        <input type="password" class="form-control"  id="new_password" name="new_password" >
                    </div>
                  
			  <button type="submit" class="btn btn-primary">save
			  </button>
			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
