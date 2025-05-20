<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
   public function createcategory()
    {
        return view('backend.createcategory');
    }
    public function viewcategory()
    {
        $categories = Category::all();

        return view('backend.viewcategory', compact('categories'));
    }

    public function storecategory(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('backend/categories'), $imageName);

        $category = new Category();
        $category->title = $request->title;
        $category->image = $imageName;
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);

        if (is_string($categories->images)) {
            $categories->images = json_decode($categories->images, true);
        }

        return view('backend.editcategory', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $category = Category::findOrFail($id);
        $category->title = $request->input('title');

        if ($request->hasFile('image')) {
          
            $this->deleteCategoryImage($category->image);

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('backend/categories'), $imageName);

            $category->image = $imageName;
        }

        $category->save();

        return redirect()->route('category.view')->with('success', 'Category updated successfully.');
    }

    
    private function deleteCategoryImage($imageFileName)
    {
        $imagePath = public_path('backend/categories/' . $imageFileName);

        if ($imageFileName && file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $this->deleteCategoryImage($category->image);

        $category->delete();

        return redirect()->route('category.view')->with('success', 'Category deleted successfully.');
    }

}
