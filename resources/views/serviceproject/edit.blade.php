@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit project service</div>

                <div class="card-body">
                <form  method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                  
                    <div class="form-group">
                        <label for="service_id">Service:</label>
                        <select class="form-control" name="service_id">
                       
                        @foreach($services as $t)
                            <option value="{{$t->id}}"
                            @if($t->id == $projserv->service_id)
                                    {{"selected"}}
                                    @endif
                                    >
                            {{$t->title}}
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
