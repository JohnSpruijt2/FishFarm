<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;

class uploadImageController extends Controller
{
    //
    function index() {
        
        return Inertia::render('UploadImage', [
            
        ]);
    }

    function uploadImages(Request $request) {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);
         var_dump($request->file('image'));
           
    
           $name = $request->file('image')->getClientOriginalName();
    
           $path = $request->file('image')->store('public/images');
    
    
           $save = new Image;

           $save->user_id = Auth::user()->id;
           $save->name = $name;
           $save->path = $path;
    
           $save->save();
    
           //return redirect('/dashboard');
    }
}
