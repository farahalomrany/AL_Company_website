<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, $id)
    {
        $message = User::findOrFail($id);
        $message->is_blocked = $request->input('is_blocked');
        $message->save();
    
        return response()->json(['message' => 'updated successfully']);
    }

    public function delete(Request $request, $id)
    {
        $gmessage = User::find($id);
        $gmessage->delete();
        return redirect('/users')->with('success', 'This Guest Message has deleted successfully');
    }

    public function all(Request $request)
    {
        $auth_user_id = auth()->user()->id;
        $user = User::all();
        return view('user.all', compact('user','auth_user_id'));

    }
    public function view($id)
    {
        $user = User::where('id', '=', $id)->first();
        if(!isset($user->account)){
            return redirect('/users')->with('error', 'There Is No Account For This User');

        }
        return view('user.view', compact('user'));
    }
     public function application($id)
    {
        $user = User::where('id', '=', $id)->first();
        
        if(!isset($user->account)){
            return redirect('/users')->with('error', 'There Is No Account For This User');
        }else{
            $vacacc = $user->account->vacancyaccounts;
        }
        return view('user.application', compact('vacacc'));
    }
    
}
