<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }
    public function singleProduct($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_image = $request->product_image;
        $product->brand_id = $request->brand_id;
        $product->categories_id = $request->categories_id;
        $product->quantity = $request->quantity;
        $product->rate = $request->rate;
        $product->purchase_rate = $request->purchase_rate;
        $product->sale_rate = $request->sale_rate;
        $product->barcode = $request->barcode;
        $product->active = $request->active;
        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');

        $product->save();

        return response()->json("Successfully Updated");
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json("Delete Successfully");
    }
    public function createProduct(Request $request)
    {


         Log::debug($request);

                  

        $name = $request->file('file')->getClientOriginalName();

        Log::debug($name);
 
        $path = $request->file('file');

        $destinationPath = 'images';

       $request->file('file')->move($destinationPath, $name);
        

        $product = new Product();
        

        $product->product_name = $request->product_name;
        $product->product_image = $name;
        $product->brand_id = 1;
        $product->categories_id = $request->categories_id;
        $product->quantity = $request->quantity;
        $product->rate = $request->net_rate;
        $product->purchase_rate = "1";
        $product->sale_rate = $request->sale_rate;
        $product->barcode = "00000";
        $product->active = 1;
        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');
        $product->updated_at = date('Y-m-d H:i:s');



        $product->save();
        

        return response()->json("Product Created Successfully");

    }
}
