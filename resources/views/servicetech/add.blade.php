@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add technology to service</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_servicetech')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="technology_id">Technology:</label>
                        <select class="form-control" name="technology_id" required>
                       
                        @foreach($techs as $t)
                            <option value="{{$t->id}}">
                            {{$t->name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group d-none">
                        <label for="service_id" >Services:</label>
                        <input type="text" class="form-control"  id="service_id" name="service_id" value="{{$service_id}}">
                    </div>
            
                    <button type="submit" class="btn btn-info">save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
