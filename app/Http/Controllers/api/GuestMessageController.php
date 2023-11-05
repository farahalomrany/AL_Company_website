<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GuestMessageResource;
use App\Models\GuestsMessage;
use Illuminate\Http\Request;
use App\Traits\ResponseTraits;
use Illuminate\Support\Facades\Validator;

class GuestMessageController extends Controller
{
    use ResponseTraits;

    public function send(Request $request)
    {
        $guestmessage = new GuestsMessage();
        $input = $request->all();
       
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'full_name' => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:255',
            'message_body' => 'required',
            'phone' => 'nullable|min:9'
        ]);

        if ($validator->fails()) {
            return $this->sendError([], $validator->errors()->first());

        }
        $guestmessage->email = $request->email;
        $guestmessage->full_name = $request->full_name;
        $guestmessage->message_body = $request->message_body;
        $guestmessage->phone = $request->phone;
        $guestmessage->status = "new";
        $guestmessage->save();
        if (isset($guestmessage)) {
            $resource_data = new GuestMessageResource($guestmessage);
            $data = [
                "guest_messages" => $resource_data
            ];
            return $this->sendResponse($data, 'completed successfully', []);
        } else {
            return $this->sendError([], "error");
        }

    }
}