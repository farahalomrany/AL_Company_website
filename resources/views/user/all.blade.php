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
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Is Blocked</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $p)
                            <tr>
                                @if($p->account)
                                <td>{{$p->account->full_name}}</td>
                                @else
                                <td></td>
                                @endif
                                <td>{{$p->email}}</td>
                                @if($auth_user_id != $p->id)
                                <td>
                                    <select class="blocked-select " data-id="{{$p->id}}" >
                                        <option value="0" {{ ($p->is_blocked == '0') ? 'selected' : '' }}>False</option>
                                        <option value="1" {{ ($p->is_blocked == '1') ? 'selected' : '' }}>True</option>
                                    </select>
                                </td>
                                @else
                                <td>
                                 
                                </td>
                                @endif
                                
                                <td>
                                <a href="/user/view/{{$p->id}}" class="btn btn-warning">View Account</a>
                                <a href="/user/application/{{$p->id}}" class="btn btn-success">Applications</a>

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

    $('.blocked-select').change( function() {
        var newStatus = $(this).val();
        var messageId = $(this).data('id');
        console.log(newStatus);
        console.log(messageId);
        var base_url = '{{ env('APP_URL') }}' + '/user/edit/' + messageId;
        console.log(base_url);

        $.ajax({
            type: 'POST',
            dataType: "json",
            url: base_url,
            data: { is_blocked: newStatus },
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
