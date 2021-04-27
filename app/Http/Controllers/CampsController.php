<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camp;
use Cache;
use Seo;

class CampsController extends Controller
{
    public function show(){
        $content = Camp::all();
        return view('camps')->with('data', $content);
    }

    public function showCamp($slug){
        $content = Camp::where('slug', $slug)->first();
        return view('camp')->with('data', $content);
    }
}
