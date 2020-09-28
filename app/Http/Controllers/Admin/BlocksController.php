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
     * Muestra el formulario para editar un bloque
     *
     * @input $id block
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id){
        $block = Block::find($id);
        if(!$block){
            abort(404);
        }
        return view('admin.blocks.edit')
                    ->with('block', $block);
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
            'content' => 'required|min:1|max:10000',
        ]);

        if($id != null){
            $block = Block::find($id);
            if(!$block){
                $block = new Block;
            }
        }else{
            $block = new Block;
        }
        
        $block->name = $request->name;
        $block->content = $request->content;
        $block->save();

        //cache clear
        if(Cache::has('block_'.$block->id)){
            Cache::forget('block_'.$id);
        }

        return redirect()->route('admin.blocks.list');
    }
}
