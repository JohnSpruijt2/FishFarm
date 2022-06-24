<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Image;
use App\Models\Fish;

class uploadImageController extends Controller
{
    //
    function index() {
        $userInfo = User::where('id', Auth::user()->id)->first();
        $fishTypes = Fish::all();
        return Inertia::render('UploadImage', [
            'userInfo' => $userInfo,
            'fishTypes' => $fishTypes,
        ]);
    }

    function uploadImages(Request $request) {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
            ]);
           
            $fish_type = $request->fish_type;   
            $name = $request->file('image')->getClientOriginalName();

            $path = $request->file('image')->store('public/images');

            $save = new Image;  
            $save->user_id = Auth::user()->id;
            $save->fish_type = $fish_type;
            $save->name = $name;
            $save->path = $path;
            $save->description = $request->description;

            $save->save();

            return redirect('/dashboard');
    }
}
