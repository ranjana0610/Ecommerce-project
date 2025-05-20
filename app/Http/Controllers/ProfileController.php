<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user(); 
        return view('backend.profile', compact('user'));
    }


    public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|string|min:6',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $user->name = $request->name;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully.');
}



}
