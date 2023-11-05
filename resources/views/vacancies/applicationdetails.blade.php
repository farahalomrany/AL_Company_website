@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width: 155%; margin-left: -26%;"   >
                <div class="card-header">View User Account Details</div>

                <div class="cardin"  style="width: 91%; margin-left: 4%;">
                <!-- <div class="card-header">View User Account Details</div> -->

                    <div class="card-body">
                                <div class="form-group">
                                    <h3>Personal Information:</h3>
                                    @if($user->account) 
                                        @if($user->account->personal_photo != null)
                                        <h6>Personal photo:</h6>
                                        <a href="{{env('APP_URL')}}/storage/{{$user->account->personal_photo}}"><img src="{{env('APP_URL')}}/storage/{{$user->account->personal_photo}}" style="width:100px"></a>
                                        @endif
                                        <h6>Full Name:</h6>
                                        <input type="text" class="form-control"  value="{{$user->account->full_name}}" disabled>
                                        <h6>Date Of Birth:</h6>
                                        <input type="text" class="form-control"  value="{{$user->account->date_of_birth}}" disabled>
                                        <h6>Gender:</h6>
                                        <input type="text" class="form-control"  value="{{$user->account->gender}}" disabled>
                                        <h6>Address:</h6>
                                        <input type="text" class="form-control"  value="{{$user->account->address}}" disabled>
                                       <br>
                                    @endif

                                </div>
                                <h6>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</h6>
                                <div class="form-group">
                                    <h3>Education:</h3>
                                    @if($user->account)
                                        @foreach($user->account->accountseducations as $edu) 
                                        <h6>Degree Name:</h6>
                                        <input type="text" class="form-control"  value="{{$edu->degree_name}}" disabled>
                                        <h6>Source:</h6>
                                        <input type="text" class="form-control"  value="{{$edu->source}}" disabled>
                                        <h6>Date:</h6>
                                        <input type="text" class="form-control"  value="{{$edu->date}}" disabled>
                                        
                                        <br>
                                       @endforeach
                                    @endif
                                </div>
                                <h6>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</h6>

                                <div class="form-group">
                                    <h3>Experience:</h3>
                                    @if($user->account)
                                        @foreach($user->account->accountsexperiences as $exp) 
                                        <h6>Job Title:</h6>
                                        <input type="text" class="form-control"  value="{{$exp->job_title}}" disabled>
                                        <h6>Company Name:</h6>
                                        <input type="text" class="form-control"  value="{{$exp->company_name}}" disabled>
                                        <h6>Date From:</h6>
                                        <input type="text" class="form-control"  value="{{$exp->date_from}}" disabled>
                                        <h6>Date To:</h6>
                                        <input type="text" class="form-control"  value="{{$exp->date_to}}" disabled>
                                        <h6>Status:</h6>
                                        <input type="text" class="form-control"  value="{{$exp->status}}" disabled>
                                        
                                        <h4>Experience Duties:</h4>

                                            @foreach($exp->appduty as $dut)
                                            <h6>Description:</h6>
                                            <input type="text" class="form-control"  value="{{$dut->duty_description}}" disabled>
                            
                                            @endforeach

                                        <br>
                                       @endforeach
                                    @endif
                                </div>
                                <h6>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</h6>

                                <div class="form-group">
                                    <h3>Skilles:</h3>
                                    @if($user->account)
                                        @foreach($user->account->accskills as $skill) 
                                        <h6>Name:</h6>
                                        <input type="text" class="form-control"  value="{{$skill->name}}" disabled>
                                        <h6>level:</h6>
                                        <input type="text" class="form-control"  value="{{$skill->level}}" disabled>
                                       
                                        <br>
                                       @endforeach
                                    @endif
                                </div>
                                <h6>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</h6>

                                <div class="form-group">
                                    <h3>Language:</h3>
                                    @if($user->account)
                                        @foreach($user->account->acclanguage as $lang) 
                                        <h6>Name:</h6>
                                        <input type="text" class="form-control"  value="{{$lang->name}}" disabled>
                                        <h6>Reading Level:</h6>
                                        <input type="text" class="form-control"  value="{{$lang->reading_level}}" disabled>
                                        <h6>Writing Level:</h6>
                                        <input type="text" class="form-control"  value="{{$lang->writing_level}}" disabled>
                                        <h6>Speaking Level:</h6>
                                        <input type="text" class="form-control"  value="{{$lang->speaking_level}}" disabled>
                                        <h6>Listening Level:</h6>
                                        <input type="text" class="form-control"  value="{{$lang->listening_level}}" disabled>
                                        
                                        <br>
                                       @endforeach
                                    @endif
                                </div>
                                <h6>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</h6>

                                <div class="form-group">
                                    <h3>Contact:</h3>
                                    @if($user->account)
                                        @foreach($user->account->acccontact as $con) 
                                        <h6>Type:</h6>
                                        <input type="text" class="form-control"  value="{{$con->contact_type}}" disabled>
                                        <h6>Value:</h6>
                                        <input type="text" class="form-control"  value="{{$con->contact_value}}" disabled>
                                        
                                        <br>
                                       @endforeach
                                    @endif
                                </div>
                                <h6>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</h6>

                                <div class="form-group">
                                    <h3>Project:</h3>
                                    @if($user->account)
                                        @foreach($user->account->accproject as $proj) 
                                        <h6>Project Name:</h6>
                                        <input type="text" class="form-control"  value="{{$proj->project_name}}" disabled>
                                        <h6>Description:</h6>
                                        <input type="text" class="form-control"  value="{{$proj->description}}" disabled>
                                        <h6>Date From:</h6>
                                        <input type="text" class="form-control"  value="{{$proj->date_from}}" disabled>
                                        <h6>Date To:</h6>
                                        <input type="text" class="form-control"  value="{{$proj ->date_to}}" disabled>
                                        
                                        <br>
                                       @endforeach
                                    @endif
                                </div>
                                <h6>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</h6>

                            
                            </form>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
