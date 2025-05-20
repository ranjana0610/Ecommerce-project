<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function createproduct()
    {
        $categories = Category::all();
        return view('backend.createproduct', compact('categories'));
    }
    public function viewproduct()
    {
        $products = Product::all();

        return view('backend.viewproduct', compact('products'));
    }
    
    public function storeproduct(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $originalName = strtolower($image->getClientOriginalName());
                $image->move(public_path('backend/products'), $originalName);
                $imagePaths[] = 'backend/products/' . $originalName;
            }
        }

        Product::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'size' => $request->size,
            'price' => $request->price,
            'description' => $request->description,
            'images' => $imagePaths,
        ]);

        return redirect()->route('product.add')->with('success', 'Product saved successfully.');
    }

    public function edit($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all(); 

        if (is_string($product->images)) {
            $product->images = json_decode($product->images, true);
        }

        return view('backend.editproduct', compact('product', 'categories'));
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $images = json_decode($product->image, true);
        if (is_array($images)) {
            foreach ($images as $imagePath) {
                $fullPath = public_path($imagePath);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $existingImages = is_array($product->images)
            ? $product->images
            : (json_decode($product->images, true) ?? []);

        if ($request->has('deleted_images')) {
            $deletedImages = json_decode($request->deleted_images, true);

            if (is_array($deletedImages) && !empty($deletedImages)) {
                foreach ($deletedImages as $img) {
                    $path = public_path($img);
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }

                $existingImages = array_values(array_diff($existingImages, $deletedImages));
            }
        }
        $request->validate([
            'images.*' => 'mimes:jpg,jpeg,png|max:2048'
        ], [
            'images.*.mimes' => 'Only JPG, JPEG, and PNG images are allowed.',
            'images.*.max' => 'Each image must be less than 2MB.'
        ]);


        if ($request->hasFile('images')) {
            $newImageCount = count($request->file('images'));
            $existingImageCount = count($existingImages);
            $totalImageCount = $existingImageCount + $newImageCount;

            if ($totalImageCount > 5) {
                return redirect()->back()->withErrors(['images' => 'You can only upload a maximum of 5 images.']);
            }
            $uploadedImages = [];
            $allowedExtensions = ['jpg', 'jpeg', 'png'];

            foreach ($request->file('images') as $file) {
                $extension = strtolower($file->getClientOriginalExtension());

                if (!in_array($extension, $allowedExtensions)) {
                    continue;
                }

                $originalName = $file->getClientOriginalName();
                $filename = pathinfo($originalName, PATHINFO_FILENAME);
                $safeFilename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $filename);
                $finalName = strtolower($safeFilename . '.' . $extension);

                $destination = public_path('backend/products');
                $counter = 1;

                while (file_exists($destination . '/' . $finalName)) {
                    $finalName = strtolower($safeFilename . '_' . $counter . '.' . $extension);
                    $counter++;
                }

                $file->move($destination, $finalName);

                $uploadedImages[] = 'backend/products/' . $finalName;
            }

            $existingImages = array_merge($existingImages, $uploadedImages);
        }

        $product->title = $request->title;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->images = json_encode($existingImages);

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully!');
    }
}
