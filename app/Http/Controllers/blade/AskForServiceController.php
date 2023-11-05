<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AskForService;
class AskForServiceController extends Controller
{
    public function all(Request $request)
    {
        $aserv = AskForService::all();
        return view('askforservice.all', compact('aserv'));

    }
}
