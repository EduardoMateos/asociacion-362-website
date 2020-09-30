<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doc;
use Cache;

class DocsController extends Controller
{
    /**
     * Muestra la lista de documentación adjunta 
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(){
        return view('admin.docs.list')
                ->with('blocks', Doc::paginate(10));
    }



}
