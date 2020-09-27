<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Block;
use Cache;

class BlocksController extends Controller
{
    /**
     * Muestra la lista de bloques de la website
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(){
        return view('admin.blocks.list')
                ->with('blocks', Block::paginate(10));
    }


    /**
     * Muestra el formulario de añadir bloque
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(){
        return view('admin.blocks.add');
    }

    /**
     * Valida y almacena los datos de pagina
     *
     * @input Request
     * @return redirect
     */
    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:1|max:255',
            'content' => 'required|min:1|max:10000',
        ]);

        $page = new Block;
        $page->name = $request->name;
        $page->content = $request->content;
        $page->save();

        return redirect()->route('admin.blocks.list');
    }
}
