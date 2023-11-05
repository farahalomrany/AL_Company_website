<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ProjectsGallery;
use App\Traits\ImageSaveTrait;
class ProjectGalleryController extends Controller
{
    use ImageSaveTrait;
    public function allimageforprojectid(Request $request, $id)
    {
        $images = ProjectsGallery::where('project_id', '=', $id)->get();
        $project = Project::find($id);

        return view('projgallery.allwithprojectid', compact('images', 'id','project'));
    }
    public function addwithprojectid(Request $request, $id)
    {
        return view('projgallery.addwithprojectid', compact('id'));

    }

    public function storewithprojectid(Request $request)
    {
        $gallery = new ProjectsGallery();
    
        if (isset($request->image_url)) {

            $gallery->image_url = $this->check_validation_and_save_croped_image($request, "projects_galleries", "image_url", "Projectgallery");

        }
    

       
        $gallery->project_id = $request->project_id;
        $id = $request->project_id;
        $gallery->save();
        $im = ProjectsGallery::where('project_id', '=', $request->project_id)->get();
        return redirect()->to('project/gallery/all/'.$id);

    }
    public function deletewithid(Request $request, $id)
    {
        $t = ProjectsGallery::find($id);

        $t->delete();
        return back()->with('success', 'This image has deleted successfully');
    }
    public function editimagewithprojectid($id)
    {
        $im = ProjectsGallery::where('id', '=', $id)->first();

        return view('projgallery.editwithprojectid', compact('im'));
    }
    public function updateimagewithprojectid($id, Request $request)
    {
        $gallery = ProjectsGallery::find($id);

      
        if (isset($request->image_url)) {

            $gallery->image_url = $this->check_validation_and_save_croped_image($request, "projects_galleries", "image_url", "Projectgallery");

        }
        $gallery->save();
        $id = $gallery->project_id;
        return redirect()->to('project/gallery/all/'.$id);
    }
    
}
