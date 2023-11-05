@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Product</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_product')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control"  id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="domain">Domain:</label>
                        <input type="text" class="form-control"  id="domain" name="domain">
                    </div>
                   
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control"  id="image" name="image" >
                    </div>
                   
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control"  id="description" name="description">
                    </div>
                    <div class="form-group">
                        <label for="imp_year">Imp Year:</label>
                        <select class="form-control" name="imp_year">
                                @foreach($years as $t)
                                    <option value="{{ $t }}">
                                    {{ $t }}
                                    </option>
                                @endforeach
                        </select>                  
                      </div>
                   
            
                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/products" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
