<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Pagesimage;
use App\Traits\ImageSaveTrait;

class PagesImagesController extends Controller
{
    use ImageSaveTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $pimage = new Pagesimage();
        if (isset($request->image)) {

            $pimage->image = $this->check_validation_and_save_croped_image($request, "pagesimages", "image", "Pagesimages");

        }

        if (isset($request->image_mobile)) {

            $pimage->image_mobile = $this->check_validation_and_save_croped_image($request, "pagesimages", "image_mobile", "Pagesimage");

        }
        $pimage->image_name = $request->image_name;
        $pimage->page_name = $request->page_name;

        $pimage->save();
        return redirect('/images');

    }
    public function add(Request $request)
    {

        return view('pagesimages.add');

    }
    public function edit($id)
    {
        $pimage = Pagesimage::where('id', '=', $id)->first();
        return view('pagesimages.edit', compact('pimage'));
    }
    public function update($id, Request $request)
    {
        $pimage = Pagesimage::find($id);
        if ($request->chimage == "on") {
            $pimage->image = null;
        }
        if (isset($request->image)) {

            $pimage->image = $this->check_validation_and_save_croped_image($request, "pagesimages", "image", "Pagesimage");

        }

        if ($request->mobile == "on") {
            $pimage->image_mobile = null;
        }
        if (isset($request->image_mobile)) {

            $pimage->image_mobile = $this->check_validation_and_save_croped_image($request, "pagesimages", "image_mobile", "Pagesimage");

        }
        $pimage->image_name = $request->image_name;
        $pimage->page_name = $request->page_name;

        $pimage->save();
        return redirect('/images');
    }

    public function delete(Request $request, $id)
    {
        $image = Pagesimage::find($id);
        $image->delete();
        return redirect('/images')->with('success', 'This Pagesimage has deleted successfully');
    }

    public function all(Request $request)
    {
        $image = Pagesimage::all();
        return view('pagesimages.all', compact('image'));

    }
}