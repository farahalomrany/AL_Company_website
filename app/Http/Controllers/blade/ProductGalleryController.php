<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Imagesconfig;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductsGallery;
use App\Traits\ImageSaveTrait;
class ProductGalleryController extends Controller
{
    use ImageSaveTrait;
    public function allimageforproductid(Request $request, $id)
    {
        $images = ProductsGallery::where('product_id', '=', $id)->get();
        $product = Product::find($id);

        return view('prodgallery.allwithproductid', compact('images', 'id','product'));
    }
    public function addwithproductid(Request $request, $id)
    {
        return view('prodgallery.addwithproductid', compact('id'));

    }

    public function storewithproductid(Request $request)
    {
        $gallery = new ProductsGallery();
    
        if (isset($request->image_url)) {

            $gallery->image_url = $this->check_validation_and_save_croped_image($request, "products_galleries", "image_url", "Productgallery");

        }
       
        $gallery->product_id = $request->product_id;
        $id = $request->product_id;
        $gallery->save();
        return redirect()->to('product/gallery/all/'.$id);

    }
    public function deletewithid(Request $request, $id)
    {
        $t = ProductsGallery::find($id);

        $t->delete();
        return back()->with('success', 'This image has deleted successfully');
    }
    public function editimagewithproductid($id)
    {
        $im = ProductsGallery::where('id', '=', $id)->first();

        return view('prodgallery.editwithproductid', compact('im'));
    }
    public function updateimagewithproductid($id, Request $request)
    {
        $gallery = ProductsGallery::find($id);

        if (isset($request->image_url)) {

            $gallery->image_url = $this->check_validation_and_save_croped_image($request, "products_galleries", "image_url", "Productgallery");

        }
        $gallery->save();
        $id = $gallery->product_id;
        return redirect()->to('product/gallery/all/'.$id);
    }
}
