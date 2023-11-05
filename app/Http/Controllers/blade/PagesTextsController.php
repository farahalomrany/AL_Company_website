<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagestext;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class PagesTextsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $text = new Pagestext();

        $text->text = $request->text;
        $text->text_name = $request->text_name;
        $text->page_name = $request->page_name;

      
        $text->save();
        return redirect('/texts');

    }
    public function add(Request $request)
    {

        return view('pagestexts.add');

    }
    public function edit($id)
    {
        $text = Pagestext::where('id', '=', $id)->first();
        return view('pagestexts.edit', compact('text'));
    }
    public function update($id,Request $request){
        $text = Pagestext::find($id);

        if(isset($request->text)){
            $text->text = $request->text;
        }
        // $text->text_name = $request->text_name;
        // $text->page_name = $request->page_name;

      
        $text->save(); 
       return redirect('/texts');
      }

    public function delete(Request $request, $id)
    {
        $text = Pagestext::find($id);
        $text->delete();
        return redirect('/texts')->with('success', 'This Pagestext has deleted successfully');
    }

    public function all(Request $request)
    {
        $text = Pagestext::all();
        return view('pagestexts.all', compact('text'));

    }
}
