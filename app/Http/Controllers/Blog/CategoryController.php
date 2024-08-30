<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        try {

            if (!$request->has("name") || $request->name == null) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "Name is required."
                ]);
            }

            $name = $request->name;
            $description = $request->description;

            $logo = $request->file("logo");
            $fileName = "";
            if ($logo) {
                $fileName = date('h-m-y-h-i-s') . '-' . $logo->getClientOriginalName();
                $logo->move("image_upload", $fileName);
                $fileName = url("image_upload/$fileName");
            }

            $category = new Category();
            $category->name = $name;
            $category->description = $description;
            $category->logo = $fileName;
            $category->save();

            // Remove
            unset($category->updated_at);
            unset($category->created_at);
            $category->logo = $category->logo ?: emptyImage();
            
            return response()->json([
                "status" => "success",
                "msg" => "Category save success.",
                "record" => $category
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getCategory()
    {
        try {
            $category = Category::select([
                "id",
                "name",
                "description",
                "logo"
            ])->get();

            if (!$category->count() > 0) {
                return response()->json([
                    "status" => "failed",
                    "msg" => "Category is empty."
                ]);
            }

            $category->map(function ($q) {
                return $q->logo = $q->logo ?: emptyImage();
            });

            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "records" => $category
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
