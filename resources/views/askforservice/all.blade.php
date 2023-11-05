@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Ask For Service Messages</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                    
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Service Description</th>
                            <th>Phone</th>
                            <th>Budget</th>

                        </tr>
                        </thead>
                        <tbody>
                      
                        @foreach($aserv as $p)
                            <tr>
                                <td>{{$p->email}}</td>
                                <td>{{$p->full_name}}</td>
                                <td>{{$p->service_description}}</td>
                                <td>{{$p->phone}}</td>
                                <td>{{$p->budget}}</td>

                            
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
