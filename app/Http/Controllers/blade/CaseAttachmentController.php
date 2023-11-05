<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CaseStudiesAttachment;
use Illuminate\Support\Facades\Validator;

class CaseAttachmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function allcaseattforcaseid(Request $request, $id)
    {
        $att = CaseStudiesAttachment::where('case_study_id', '=', $id)->get();
        $casestudy = CaseStudy::where('id', '=', $id)->first();
        $project_id = $casestudy->project_id;

        return view('csatt.allwithcaseid', compact('att', 'id', 'project_id'));
    }
    public function addwithcaseid(Request $request, $id)
    {
        return view('csatt.addwithcaseid', compact('id'));

    }

    public function storewithcaseid(Request $request)
    {
        $att = new CaseStudiesAttachment();

        $att->file_name = $request->file_name;
        $att->file_description = $request->file_description;
        if (isset($request->file_url)) {
            $validator = Validator::make($request->all(), [
                'file_url' => 'required|mimes:doc,docx,pdf,txt,png,jpg,gif|max:10000'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            $file = $request->file("file_url")->getClientOriginalName();
            $image_name = "aldr" . Str::random(25) . $file;
            $image = "caseattachment/";
            $image_path = $image . $image_name;
            $att->file_url = $image_path;
            $request->file_url->move(public_path('storage/caseattachment'), $image_name);
        }
        $att->case_study_id = $request->case_study_id;
        $id = $request->case_study_id;
        $att->save();
        return redirect()->to('caseatt/all/' . $id);

    }
    public function deletewithid(Request $request, $id)
    {
        $t = CaseStudiesAttachment::find($id);

        $t->delete();
        return back()->with('success', 'This Attachment has deleted successfully');
    }
    public function editcaseattwithcaseid($id)
    {
        $att = CaseStudiesAttachment::where('id', '=', $id)->first();

        return view('csatt.editwithcaseid', compact('att', 'id'));
    }
    public function updatecaseattwithcaseid($id, Request $request)
    {
        $att = CaseStudiesAttachment::find($id);

        $att->file_name = $request->file_name;
        $att->file_description = $request->file_description;
        if (isset($request->file_url)) {
            $validator = Validator::make($request->all(), [
                'file_url' => 'mimes:doc,docx,pdf,txt,png,jpg,gif|max:10000'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }
            $file = $request->file("file_url")->getClientOriginalName();
            $image_name = "aldr" . Str::random(25) . $file;
            $image = "caseattachment/";
            $image_path = $image . $image_name;
            $att->file_url = $image_path;
            $request->file_url->move(public_path('storage/caseattachment'), $image_name);
        }
        $att->save();
        $id = $att->case_study_id;
        return redirect()->to('caseatt/all/' . $id);
    }

}