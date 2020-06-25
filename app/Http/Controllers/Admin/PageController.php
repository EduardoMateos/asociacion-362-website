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

    public function add(){
        return view('admin.pages.add');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:1|max:255',
            'slug' => 'required|min:1|max:255',
            'content' => 'required|min:1|max:10000',
        ]);

        $page = new Page;
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->status = 0;
        $page->save();

        return redirect()->route('admin.pages.list');
    }
}
