<?php

namespace App\Utils;

use App\Models\Block as MBlock;
use Cache;

class Block {

    /*
    *
    *   Renderiza en la vista el bloque y lo cachea para evitar consultas
    *
    */
    public static function renderBlock($id){
        if(Cache::has('block_'.$id)){
            $data_to_render = Cache::get('block_'.$id);
        }else{
            $block = MBlock::find($id);
            if(!$block){
                $data_to_render = '';
            }else{
                $data_to_render = $block->content;
                Cache::put('block_'.$id, $data_to_render);
            }
        }
        return $data_to_render;
    }

}