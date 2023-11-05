<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Imagesconfig;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ImagesConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $imco = new Imagesconfig();
// dd($request->hight);
        $imco->table_name = $request->table_name;
        $imco->field_name = $request->field_name;
        $imco->hight = $request->hight;
        $imco->width = $request->width;

        $imco->save();
        return redirect('/image/configs');

    }
    public function add(Request $request)
    {
        $tables = DB::select('SHOW TABLES');
        // $fields = DB::getSchemaBuilder()->getColumnListing($tables[0]->Tables_in_aldrproject);
        // dd($fields);
        // dd($tables[0]->Tables_in_aldrproject);
        return view('imagesconfig.add', compact('tables'));

    }
    public function get_fields($table)
    {
        $fields = DB::getSchemaBuilder()->getColumnListing($table);
        return response()->json(['data' => $fields]);
    }
    public function edit($id)
    {
        $imco = Imagesconfig::where('id', '=', $id)->first();
        return view('imagesconfig.edit', compact('imco'));
    }
    public function update($id, Request $request)
    {
        $imco = Imagesconfig::find($id);

      
        $imco->hight = $request->hight;
        $imco->width = $request->width;
        $imco->save();
        return redirect('/image/configs');
    }

    public function delete(Request $request, $id)
    {
        $imco = Imagesconfig::find($id);
        $imco->delete();
        return redirect('/image/configs')->with('success', 'This Image config has deleted successfully');
    }

    public function all(Request $request)
    {
        $imco = Imagesconfig::all();
        return view('imagesconfig.all', compact('imco'));

    }
}