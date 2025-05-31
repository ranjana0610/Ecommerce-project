<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;


class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('backend.homeslider', compact('homes'));
    }

    public function create()
    {
        return view('backend.addhomeslider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_slider.0' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'side_slider.0' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $home = new Home();
        $home->title = $request->title;
        $home->description = $request->description;

        // Upload Main Slider Images
        if ($request->hasFile('main_slider')) {
            foreach ($request->file('main_slider') as $key => $image) {
                if ($image) {
                    $filename = time().'_main_'.$key.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('backend/homeslider'), $filename);
                    $home->{'image_'.($key + 1)} = 'backend/homeslider/' . $filename;
                }
            }
        }

        // Upload Side Slider Images (image_4 & image_5)
        if ($request->hasFile('side_slider')) {
            foreach ($request->file('side_slider') as $key => $image) {
                if ($image) {
                    $filename = time().'_side_'.$key.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('backend/homeslider'), $filename);
                    $home->{'image_'.($key + 4)} = 'backend/homeslider/' . $filename;

                }
            }
        }

        $home->save();

        return redirect()->route('home.view')->with('success', 'Slider added successfully.');
    }

    public function edit($id)
    {
        $home = Home::findOrFail($id);
        return view('backend.edithomeslider', compact('home'));
    }

    public function update(Request $request, $id)
    {
        $home = Home::findOrFail($id);
        $home->title = $request->title;
        $home->description = $request->description;

        // Update main_slider images
        if ($request->hasFile('main_slider')) {
            foreach ($request->file('main_slider') as $key => $image) {
                if ($image) {
                    $path = public_path($home->{'image_'.($key + 1)});
                    if (File::exists($path)) File::delete($path);

                    $filename = time().'_main_'.$key.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('backend/homeslider'), $filename);
                    $home->{'image_'.($key + 1)} = 'backend/homeslider/' . $filename;

                }
            }
        }

        // Update side_slider images
        if ($request->hasFile('side_slider')) {
            foreach ($request->file('side_slider') as $key => $image) {
                if ($image) {
                    $path = public_path($home->{'image_'.($key + 4)});
                    if (File::exists($path)) File::delete($path);

                    $filename = time().'_side_'.$key.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('backend/homeslider'), $filename);
                    $home->{'image_'.($key + 4)} = 'backend/homeslider/' . $filename;
                }
            }
        }

        $home->save();

        return redirect()->route('home.view')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $home = Home::findOrFail($id);

        // Delete images
        for ($i = 1; $i <= 5; $i++) {
            $imgPath = public_path($home->{'image_'.$i});
            if ($home->{'image_'.$i} && File::exists($imgPath)) {
                File::delete($imgPath);
            }
        }

        $home->delete();

        return redirect()->route('home.view')->with('success', 'Slider deleted successfully.');
    }

    public function deleteImage(Request $request)
    {
        $home = Home::find($request->home_id);
        $field = $request->image_field;

        if ($home && isset($home->$field)) {
            $imagePath = public_path($home->$field);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $home->$field = null;
            $home->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


     public function homepage()
    {
        $homepage = Home::latest()->first();
        $featuredProducts = Product::where('ptype', 1)->get();
        $trendingProducts = Product::where('ptype', 2)->get();
        $topsellingProducts = Product::where('ptype', 3)->get();
        $allProducts = Product::limit(12)->get();
        $allcategories = Category::all();
        return view('frontend.homepage', compact('homepage', 'featuredProducts', 'trendingProducts', 'topsellingProducts','allProducts', 'allcategories'));
    }
}

