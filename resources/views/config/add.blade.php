@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Add Config</div>

                <div class="card-body">
                
                <form  method="POST" action="{{route('store_config')}}">
                    @csrf
                    <div class="form-group">
                        <label for="ckey">Key:</label>
                        <input type="text" class="form-control"  id="ckey" name="ckey">
                    </div>


                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select name="type" id="type" class="form-control">
                        <option value="text">text</option>
                        <option value="boolean">boolean</option>
                        <option value="integer">integer</option>
                        <option value="float">float</option>
                        </select>
                    </div>

                        <div class="form-group value-group" id="text">
                            <label for="value">Value:</label>
                            <input type="text" class="form-control" name="text">
                        </div>
                        <div class="form-group d-none value-group" id="integer">
                            <label for="value">Value:</label>
                            <input type="number" class="form-control" name="integer" >
                        </div>
                        <div class="form-group d-none value-group" id="float">
                            <label for="value">Value:</label>
                            <input type="number" step="0.01" class="form-control" name="float" >
                        </div>  
                        <div class="form-group d-none value-group"  id="boolean">
                            <label for="value">Value:</label>
                            <select name="boolean" class="form-control">
                            <option value="1">true</option>
                            <option value="0">false</option>
                            </select>
                        </div>
                    
                 
                 
                    <button type="submit" class="btn btn-info">save</button>
                    <a href="/configs" class="btn btn-danger">Cancel</a>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

var e = document.getElementById("type");
        var value = e.value;
        // console.log(value);

    $("#type").change(function () {
        // console.log(this.value);
        var type = this.value;
        $(".value-group").each(function(e){
            $(this).addClass("d-none");
            // console.log(this.id);
            if(type == this.id){
                $(this).removeClass("d-none");
            }
        })
    });
</script>
@endsection
