@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="overflow-x: auto;margin-left: -27%;width: 157%;">
                <div class="card-header">All Guest Messages</div>

                <div class="card-body">
                   
                <table class="table table-striped">
                        <thead>
                        <tr>
                    
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Message body</th>
                            <th>Phone</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gmessage as $p)
                            <tr>
                                <td>{{$p->email}}</td>
                                <td>{{$p->full_name}}</td>
                                <td>{{$p->message_body}}</td>
                                <td>{{$p->phone}}</td>
                                <!-- <td>{{$p->status}}</td> -->
                                <td>
                                <select class="status-select " data-id="{{$p->id}}">
                                    <option value="new" {{ ($p->status == 'new') ? 'selected' : '' }}>New</option>
                                    <option value="replied" {{ ($p->status == 'replied') ? 'selected' : '' }}>Replied</option>
                                    <option value="ignored" {{ ($p->status == 'ignored') ? 'selected' : '' }}>Ignored</option>
                                </select>
                            </td>
                                <td>
						        	<a href="/guestmessage/delete/{{$p->id}}" class="btn btn-danger"onclick="return confirmDelete()">Delete</a>
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
        var base_url = '{{ env('APP_URL') }}' + '/guestmessage/edit/' + messageId;
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
