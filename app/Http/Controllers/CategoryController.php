<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
    }

    public function singleCategory($id)
    {
        $catgeory = Category::find($id);
        return response()->json($catgeory);
    }
    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category = $request->category;
        $category->status = $request->status;
        $category->updated_at = date('Y-m-d H:i:s');

        $category->save();

        return response()->json("Successfully Updated");
    }
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json("Delete Successfully");
    }
    public function createcategory(Request $request)
    {
        $category = new Category();

        $category->category = $request->category;
        $category->status = $request->status;
        $category->created_at = date('Y-m-d H:i:s');
        $category->updated_at = date('Y-m-d H:i:s');

        $category->save();
        

        return response()->json("Category Created Successfully");

    }
}
