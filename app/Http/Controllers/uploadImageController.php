<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class uploadImageController extends Controller
{
    //
    function index() {
        $userInfo = User::where('id', Auth::user()->id)->first();
        return Inertia::render('UploadImage', [
            'userInfo' => $userInfo,
        ]);
    }

    function uploadImages(Request $request) {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg',
    
           ]);
           $user_id = $request->id;
    
           $name = $request->file('image')->getClientOriginalName();
    
           $path = $request->file('image')->store('public/images');
    
    
           $save = new Photo;

           $dave->user_id = $user_id;
           $save->name = $name;
           $save->path = $path;
    
           $save->save();
    
           //return redirect('/dashboard');
    }
}
