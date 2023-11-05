<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageSaveTrait;
class ProductController extends Controller
{
    use ImageSaveTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $prod = new Product();
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|min:2|max:255',
            'domain' => 'required|min:2',
            'description' => 'nullable',
            'imp_year' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $prod->name = $request->name;
        $prod->domain = $request->domain;
        if (isset($request->image)) {

            $prod->image = $this->check_validation_and_save_croped_image($request, "products", "image", "Products");

        }


        $prod->description = $request->description;
        $prod->imp_year = $request->imp_year;

        $prod->save();
        return redirect('/products');

    }
    public function add(Request $request)
    {
        $years = range(Carbon::now()->year, 2010);
        return view('product.add', compact('years'));

    }
    public function edit($id)
    {
        $prod = Product::where('id', '=', $id)->first();
        $years = range(Carbon::now()->year, 2010);
        return view('product.edit', compact('prod', 'years'));
    }
    public function update($id, Request $request)
    {
        $prod = Product::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'min:2|max:255',
            'domain' => 'min:2',
            'description' => 'nullable',
            'imp_year' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $prod->name = $request->name;
        $prod->domain = $request->domain;
        if ($request->chechbox == "on") {
            $prod->image = null;
        }
        if (isset($request->image)) {

            $prod->image = $this->check_validation_and_save_croped_image($request, "products", "image", "Products");

        }
        $prod->description = $request->description;
        $prod->imp_year = $request->imp_year;

        $prod->save();
        return redirect('/products');
    }

    public function delete(Request $request, $id)
    {
        $prod = Product::find($id);
        $prod->delete();
        return redirect('/products')->with('success', 'This Product has deleted successfully');
    }

    public function all(Request $request)
    {
        $prod = Product::all();
        return view('product.all', compact('prod'));

    }
}