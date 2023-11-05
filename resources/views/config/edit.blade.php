@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Config</div>

                <div class="card-body">
                   <form action="" method="POST">
                   	@csrf
    
                    <!-- <div class="form-group">
                        <label for="ckey">Key:</label>
                        <input type="text" class="form-control"  id="ckey" name="ckey" value="{{$con->ckey}}">
                    </div> -->
                    <div class="form-group d-none" >
                        <label for="type">Type:</label>
                        <select name="type" id="type" class="form-control">
                        @if($con->type == "text")
                        <option value="text" selected>text</option>
                        <option value="boolean" >boolean</option>
                        <option value="integer" >integer</option>
                        <option value="float" >float</option>
                        
                        @elseif($con->type == "boolean")
                        <option value="boolean" selected>boolean</option>
                        <option value="text" >text</option>
                        <option value="integer" >integer</option>
                        <option value="float" >float</option>

                        @elseif($con->type == "integer")
                        <option value="integer" selected>integer</option>
                        <option value="text" >text</option>
                        <option value="boolean" >boolean</option>
                        <option value="float" >float</option>

                        @elseif($con->type == "float")
                        <option value="float" selected>float</option>
                        <option value="text" >text</option>
                        <option value="boolean" >boolean</option>
                        <option value="integer" >integer</option>
                        @endif

                        </select>
                    </div>
                
                    <div class="form-group d-none value-group " id="text">
                        <label for="value">Value:</label>
                        <input type="text" class="form-control"   name="text" value="{{$con->value}}">
                    </div>
                    <div class="form-group d-none value-group" id="integer">
                        <label for="value">Value:</label>
                        <input type="number" class="form-control"   name="integer" value="{{$con->value}}">
                    </div>
                    <div class="form-group d-none value-group" id="float">
                        <label for="value">Value:</label>
                        <input type="number" step="0.01" class="form-control"   name="float" value="{{$con->value}}">
                    </div>  
                    <div class="form-group d-none value-group"  id="boolean">
                        <label for="value">Value:</label>
                        <select name="boolean" class="form-control">
                        @if($con->value == "1")
                        <option value="1" selected>true</option>
                        <option value="0">false</option>
                        @else
                        <option value="1" >true</option>
                        <option value="0"selected>false</option>
                        @endif
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
<script type="text/javascript">

var e = document.getElementById("type");
        var value = e.value;
        // console.log(value);
        var type=document.getElementById("type").value;  
        // console.log(type);
        $(".value-group").each(function(e){
            $(this).addClass("d-none");
            // console.log(this.id);
            if(type == this.id){
                $(this).removeClass("d-none");

            }
        });
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
