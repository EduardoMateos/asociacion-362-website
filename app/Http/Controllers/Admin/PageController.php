<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class PageController extends Controller
{
    /**
     * Muestra la lista de paginas de la website
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(){
        return view('admin.pages.list')
                ->with('pages', Page::paginate(10));
    }
}
