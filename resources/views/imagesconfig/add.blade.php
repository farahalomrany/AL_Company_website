@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Image Config</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_image_config')}}" files = "true" class="form-group" enctype="multipart/form-data">
                    @csrf
    
                    <div class="form-group">
                    <label for="table_name">Table Name:</label>

                        <select class="form-control" name="table_name" id="table-select" required>
                        @foreach ($tables as $table)
                                    @foreach ($table as $key => $value)
                                        <option value="{{ $value }}">
                                        {{ $value }}
                                        </option>
                                    @endforeach
                                @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                    <label for="field_name">Field Name:</label>
                        <select class="form-control" name="field_name" id="column-select"required>
                               
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="hight">Hieght:</label>
                        <input type="number" step="0.01"class="form-control"  id="hight" name="hight" required>
                    </div>
                    <div class="form-group">
                        <label for="width">Width:</label>
                        <input type="number" step="0.01" class="form-control"  id="width" name="width" required>
                    </div>

                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/image/configs" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$('#table-select').change(function(e) {
    e.preventDefault();

  var table = $(this).val();
  console.log(table.length);
  
  var base_url = '{{ env('APP_URL') }}' + '/getfields/'+table;
  console.log(base_url);

  $.ajax({
    url: base_url ,
    type: "GET",
    dataType: "json",
    success: function(data) {
      console.log(data["data"]);

      var options = '';
      $.each(data['data'], function(key, value) {
        options += '<option value="' + value + '">' + value + '</option>';
      });
      $('#column-select').html(options);
    }
  });
});
</script>

@endsection
