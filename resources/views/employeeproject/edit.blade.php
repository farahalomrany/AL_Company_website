@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Project employee</div>

                <div class="card-body">
                <form  method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                  
                    <div class="form-group">
                        <label for="employee_id">Employee:</label>
                        <select class="form-control" name="employee_id">
                       
                        @foreach($employees as $t)
                            <option value="{{$t->id}}"
                            @if($t->id == $projemployee->employee_id)
                                    {{"selected"}}
                                    @endif
                                    >
                            {{$t->full_name}}
                            </option>
                        @endforeach
                        </select>
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
