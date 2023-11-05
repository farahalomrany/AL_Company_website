@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Project</div>

                <div class="card-body">
                <form  method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  id="name" name="name"  value="{{$proj->name}}">
                    </div>
                    <div class="form-group">
                        <label for="domain">Domain:</label>
                        <input type="text" class="form-control"  id="domain" name="domain"  value="{{$proj->domain}}">
                    </div>
                   
                    <div class="form-group">
                        <label for="image">Image:</label>
                        @if($proj->image != null)
                        <a href="{{env('APP_URL')}}/storage/{{$proj->image}}"><img src="{{env('APP_URL')}}/storage/{{$proj->image}}" style="width:100px"></a>
                        <input type="checkbox" id="chechbox" name="chechbox">
                        <label for="checkbox"> Delete image</label><br>
                        @endif
                        <input type="file" class="form-control"  id="image" name="image" >

                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control"  id="description" name="description" value="{{$proj->description}}">
                    </div>
                    <div class="form-group">
                        <label for="imp_year">Imp Year:</label>
                        <select class="form-control" name="imp_year" >
                                @foreach($years as $t)
                                    <option value="{{ $t }}" @if($t == $proj->imp_year)
                                    {{"selected"}}
                                    @endif>
                                    {{ $t }}
                                    </option>
                                @endforeach
                        </select>                  
                      </div>
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/projects" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
