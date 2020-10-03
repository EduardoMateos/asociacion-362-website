<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doc;
use Cache;
use Seo;

class DocsController extends Controller
{
    public function show(){
        $docs = Doc::all();
        return view('docs')->With('docs', $docs);
    }
}
