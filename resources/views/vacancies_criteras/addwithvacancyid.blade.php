@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Vacancy Criteria') }}</div>

                <div class="card-body">
                <form  method="POST" action="{{route('storewithvacancyid')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
                                
                
                    <div class="form-group">
                        <label for="item">Item:</label>
                        <input type="text" class="form-control" placeholder="select item" id="item" name="item" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="vacancy_id">product:</label> -->
                        <input type="hidden" class="form-control"  value="{{$id}}"id="vacancy_id" name="vacancy_id">

                    </div>
                    
                    <button type="submit" class="btn btn-info">save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
