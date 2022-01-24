<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
        $product = new Product();

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
        $product->created_at = date('Y-m-d H:i:s');
        $product->updated_at = date('Y-m-d H:i:s');

        $product->save();
        

        return response()->json("Product Created Successfully");

    }
}
