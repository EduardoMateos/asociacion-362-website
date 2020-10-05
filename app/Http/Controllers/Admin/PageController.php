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

    /**
     * Muestra la vista de añadir pagina
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(){
        return view('admin.pages.add');
    }

     /**
     * Muestra el formulario para editar una pagina
     *
     * @input $id page
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id){
        $page = Page::find($id);
        if(!$page){
            abort(404);
        }
        return view('admin.pages.edit')
                    ->with('data', $page);
    }

    /**
     * Valida y almacena los datos de pagina
     *
     * @input Request
     * @return redirect
     */
    public function store(Request $request, $id = null){

        $request->validate([
            'name' => 'required|min:1|max:255',
            'slug' => 'required|min:1|max:255',
            'content' => 'required|min:1|max:10000',
        ]);

        if($id != null){
            $page = Page::find($id);
            if(!$page){
                $page = new Page;
            }
        }else{
            $page = new Page;
        }

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->status = 0;
        $page->save();

        return redirect()->route('admin.pages.list');
    }
}
