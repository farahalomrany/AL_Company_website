@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Applications for Vacancy : {{$vac->job_title}}</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($vacacc as $p)
                            <tr> 
                                <td>{{$p->account->full_name}}</td>
                                <td>{{$p->account->user->email}}</td>
                                <td>{{$p->date}}</td>
                                <td>
                                    <select class="status-select " data-id="{{$p->id}}">
                                        <option value="new" {{ ($p->status == 'new') ? 'selected' : '' }}>New</option>
                                        <option value="refuse" {{ ($p->status == 'refuse') ? 'selected' : '' }}>Refuse</option>
                                        <option value="accepted" {{ ($p->status == 'accepted') ? 'selected' : '' }}>Accepted</option>
                                        <option value="reviewed" {{ ($p->status == 'reviewed') ? 'selected' : '' }}>Reviewed</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="/vacancy/applications/details/{{$p->account->user->id}}" class="btn btn-info">Details</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
   $(document).ready(function() {
    // Get the CSRF token
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $('.status-select').change( function() {
        var newStatus = $(this).val();
        var messageId = $(this).data('id');
        console.log(newStatus);
        console.log(messageId);
        var base_url = '{{ env('APP_URL') }}' + '/vacancy/applications/update/' + messageId;
        console.log(base_url);

        $.ajax({
            type: 'POST',
            dataType: "json",
            url: base_url,
            data: { status: newStatus },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(response) {
                // Handle success response (e.g. display a success message)
            },
            error: function(xhr, status, error) {
                // Handle error response (e.g. display an error message)
            }
        });
    });
});

</script>
@endsection
