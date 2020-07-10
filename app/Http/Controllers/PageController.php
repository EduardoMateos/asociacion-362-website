<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Cache;
use Seo;

class PageController extends Controller
{
    public function show($slug){
        if(env('APP_CACHE') && Cache::has('page_'.$slug)){
            return Cache::get('page_'.$slug);
        }


        $page = Page::where('slug', $slug)->first();

        if($page){

            //seo
            Seo::setTitle('Prueba');
            Seo::setDescription('Prueba');

            $renderHtml = view('page')
                        ->with('page', $page)
                        ->render();
                        
            Cache::put('page_'.$slug, $renderHtml);

            return $renderHtml;
        }
            
        abort(404);
    }
}
