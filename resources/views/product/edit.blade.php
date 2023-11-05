@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Product</div>

                <div class="card-body">
                <form  action="" method="POST" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  id="name" name="name"  value="{{$prod->name}}">
                    </div>
                    <div class="form-group">
                        <label for="domain">Domain:</label>
                        <input type="text" class="form-control"  id="domain" name="domain"  value="{{$prod->domain}}">
                    </div>
                   
                    <div class="form-group">
                        <label for="image">Image:</label>
                        @if($prod->image != null)
                        <a href="{{env('APP_URL')}}/storage/{{$prod->image}}"><img src="{{env('APP_URL')}}/storage/{{$prod->image}}" style="width:100px"></a>
                        <input type="checkbox" id="chechbox" name="chechbox">
                        <label for="checkbox"> Delete image</label><br>
                        @endif
                        <input type="file" class="form-control"  id="image" name="image" >

                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control"  id="description" name="description" value="{{$prod->description}}">
                    </div>
                    <div class="form-group">
                        <label for="imp_year">Imp Year:</label>
                        <select class="form-control" name="imp_year" >
                                @foreach($years as $t)
                                    <option value="{{ $t }}" @if($t == $prod->imp_year)
                                    {{"selected"}}
                                    @endif>
                                    {{ $t }}
                                    </option>
                                @endforeach
                        </select>                  
                      </div>
                  
			  <button type="submit" class="btn btn-primary">Submit
			  </button>
              <a href="/products" class="btn btn-danger">Cancel</a>

			</form>
	                </div>
            </div>
        </div>
    </div>
</div>
@endsection
