<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function createproduct()
    {
        $categories = Category::all();
        return view('backend.createproduct', compact('categories'));
    }
    public function viewproduct()
    {
        $products = Product::with('category')->paginate(10);
    return view('backend.viewproduct', compact('products'));
    }

   public function getProducts(Request $request)
    {
        $columns = ['title', 'category_id', 'size', 'price', 'description'];

        $totalRecords = Product::count();

        $query = Product::with('category');

        if ($search = $request->input('search.value')) {
            $query->where('title', 'like', "%{$search}%")
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%");
                });
        }

        $filteredRecords = $query->count();

        $products = $query
            ->offset($request->input('start'))
            ->limit($request->input('length'))
            ->get();

        $data = [];
        foreach ($products as $product) {
            $images = is_string($product->images) ? json_decode($product->images, true) : $product->images;
            $firstImage = is_array($images) && count($images) > 0 ? asset($images[0]) : 'No Image';

            $imageHtml = is_array($images) && count($images) > 0 ? '<img src="' . $firstImage . '" width="50">' : '<span>No Image</span>';

            $data[] = [
                $product->title,
                $product->category->title,
                $product->size,
                $product->price,
                $product->description,
                $imageHtml,
                '<a href="' . route('product.edit', $product->id) . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                <form method="POST" action="' . route('product.delete', $product->id) . '" style="display:inline-block;">' .
                csrf_field() . method_field('DELETE') . '
                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                </form>'
            ];
        }

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }

    public function storeproduct(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'size' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
             'ptype' => 'required|in:0,1,2,3',
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
            'ptype' => $request->ptype,
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
        $product->ptype = $request->ptype;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->images = json_encode($existingImages);

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    
    // live search code start 

  public function search(Request $request)
{
    $query = $request->input('query');

    if (!$query) {
        return response()->json([]);
    }

    $products = Product::where('title', 'like', '%' . $query . '%')
                ->take(50) // fetch up to 50 items
                ->get();

    $html = '';

    if ($products->isEmpty()) {
        $html .= '<div class="list-group-item text-muted text-center">No results found</div>';
    } else {
       foreach ($products as $product) {
    $slug = Str::slug($product->title); // Creates URL-friendly version
    $html .= '<a href="/search/product/' . $product->id . '/' . $slug . '" class="list-group-item list-group-item-action">'
             . htmlentities($product->title) .
             '</a>';
}

    }

    return response($html);
}

public function searchProductDetails($id, $slug)
{
    $product = Product::findOrFail($id);


    $actualSlug = Str::slug($product->title);
    if ($slug !== $actualSlug) {
        return redirect()->route('search.product.details', ['id' => $product->id, 'slug' => $actualSlug]);
    }

    $images = json_decode($product->images, true);

    return view('frontend.searchproduct_details', compact('product', 'images'));
}


}
