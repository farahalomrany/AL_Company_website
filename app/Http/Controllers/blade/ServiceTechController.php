<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\Technology;
use App\Models\ServicesTechnology;

class ServiceTechController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $serv = new ServicesTechnology();
        $input = $request->all();
        $validator = Validator::make($input, [
            'service_id' => 'exists:services,id',
            'technology_id' => 'exists:technologies,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $serv->service_id = $request->service_id;
        $serv->technology_id = $request->technology_id;

        $serv->save();
        return redirect()->route('all_servicetech', $request->service_id)->with('success', 'This Technology has created successfully');

    }
    public function add(Request $request, $service_id)
    {
        $sertechs = Service::find($service_id)->servicestechs;
        $ids = [];
        foreach ($sertechs as $s) {
            array_push($ids, $s->technology_id);
        }

        $techs = Technology::whereNotIn('id', $ids)->get();

        if (count($techs) > 0) {
            return view('servicetech.add', compact('techs', 'service_id'));
        } else {
            return redirect()->route('all_servicetech', $service_id)->with('error', 'This technology is empty or the service get all exist technologies.');
        }
    }
    public function edit($id)
    {
        $techs = Technology::all();
        $servtech = ServicesTechnology::where('id', '=', $id)->first();
        return view('servicetech.edit', compact('servtech', 'techs'));
    }
    public function update($id, Request $request)
    {
        $serv = ServicesTechnology::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'technology_id' => 'exists:technologies,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $serv->technology_id = $request->technology_id;

        $serv->save();
        return redirect()->route('all_servicetech', $serv->service_id);
    }

    public function delete(Request $request, $id)
    {
        $serv = ServicesTechnology::find($id);
        $servid = $serv->service_id;
        $serv->delete();
        return redirect()->route('all_servicetech', $servid)->with('success', 'This Technology has deleted successfully');
    }
    public function all_technology_for_service(Request $request, $id)
    {
        $service = Service::find($id);
        $servtech = ServicesTechnology::where('service_id', '=', $id)->get();
        // dd($servtech[0]->technology);
        return view('servicetech.all', compact('servtech', 'service'));

    }
    
}