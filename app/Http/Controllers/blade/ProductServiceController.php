<?php

namespace App\Http\Controllers\blade;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\ProductsService;
class ProductServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $productservice = new ProductsService();
        $input = $request->all();
        $validator = Validator::make($input, [
            'service_id' => 'exists:services,id',
            'product_id' => 'exists:products,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $productservice->service_id = $request->service_id;
        $productservice->product_id = $request->product_id;

        $productservice->save();
        return redirect()->route('all_serviceproduct', $request->product_id)->with('success', 'This ProductsService has created successfully');

    }
    public function add(Request $request, $product_id)
    {      
        $serprods = Product::find($product_id)->servicesproducts;
        $ids = [];
        
            foreach($serprods as $s){
                    array_push($ids, $s->service_id);
            }
        
            $services = Service::whereNotIn('id',$ids)->get();
        if(count($services)>0)
        {
            return view('serviceproduct.add', compact('services', 'product_id'));
        }   
        else{
            return redirect()->route('all_serviceproduct', $product_id)->with('error', 'This services is empty or the product get all exist services.');
        }

    }
    public function edit($id)
    {
        $services = Service::all();
        $prodserv = ProductsService::where('id', '=', $id)->first();
        return view('serviceproduct.edit', compact('prodserv', 'services'));
    }
    public function update($id, Request $request)
    {
        $productservice = ProductsService::find($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'service_id' => 'exists:services,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        $productservice->service_id = $request->service_id;

        $productservice->save();
        return redirect()->route('all_serviceproduct', $productservice->product_id);
    }

    public function delete(Request $request, $id)
    {
        $productservice = ProductsService::find($id);
        $prodid = $productservice->product_id;
        $productservice->delete();
        return redirect()->route('all_serviceproduct', $prodid)->with('success', 'This ProductsService has deleted successfully');
    }
    public function all_servie_for_product(Request $request, $id)
    {
        $product = Product::find($id);
        $prodserv = ProductsService::where('product_id', '=', $id)->get();
        return view('serviceproduct.all', compact('prodserv', 'product'));

    }
}
