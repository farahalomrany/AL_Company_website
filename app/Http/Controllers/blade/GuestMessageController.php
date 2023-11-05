<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\GuestsMessage;
use Illuminate\Http\Request;
class GuestMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function edit($id)
    // {
    //     $gmessage = GuestMessage::where('id', '=', $id)->first();
    //     return view('guestmessage.edit', compact('text'));
    // }
    public function update(Request $request, $id)
    {
        $message = GuestsMessage::findOrFail($id);
        $message->status = $request->input('status');
        // dd($request->input('status'));
        $message->save();
    
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function delete(Request $request, $id)
    {
        $gmessage = GuestsMessage::find($id);
        $gmessage->delete();
        return redirect('/guestmessages')->with('success', 'This Guest Message has deleted successfully');
    }

    public function all(Request $request)
    {
        $gmessage = GuestsMessage::all();
        return view('guestmessage.all', compact('gmessage'));

    }
}
