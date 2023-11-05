@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Users</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Job Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vacacc as $p)
                            <tr>
                                <td>{{$p->vacancy->job_title}}</td>
                                <td>{{$p->vacancy->job_description}}</td>                             
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
