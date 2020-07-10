<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Camp;

class CampsController extends Controller
{
    public function destroy($id){
        Camp::destroy($id);
        return redirect()->back();
    }

    public function add(){
        return view('admin.camps.add');
    }
    
    public function edit($id){
        $data = Campa::find($id);
        return view('admin.camps.edit')
                ->with('data', $data);
    }

    public function list(){
        $data = Campa::all();
        return view('admin.camps.list')
            ->with('data', $data);
    }

    public function storeeditcampa($id, Request $request){

        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:5|max:255',
            'coorY' => 'required',
            'coorZ' => 'required',
            'contenido' => 'required',
            'slug' => 'required'
            ],[
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.min' => 'El campo Nombre requiere minimo 3 caracteres.',
            'name.max' => 'El campo Nombre tiene como limite 255 caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.min' => 'El campo descripción requiere minimo 5 caracteres.',
            'description.max' => 'El campo descripción tiene como limite 255 caracteres.',
            'contenido.required' => 'El campo de contenido es requerido.',
            'coorY.required' => 'El campo de coordenada es requerido.',
            'coorZ.required' => 'El campo de coordenada es requerido.',
            'slug.required' => 'El campo de la URL es requerido',
        ]);

        $content = Campa::find($id);
        $content->name = $request->input('name');
        $content->date = $request->input('date');
        $content->description = $request->input('description');
        $content->contenido = $request->input('contenido');
        $content->coorY = $request->input('coorY');
        $content->coorZ = $request->input('coorZ');
        $content->slug = $request->input('slug');
        $content->save();
        
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:5|max:255',
            'coorY' => 'required',
            'coorZ' => 'required',
            'contenido' => 'required',
            'slug' => 'required'
            ],[
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.min' => 'El campo Nombre requiere minimo 3 caracteres.',
            'name.max' => 'El campo Nombre tiene como limite 255 caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.min' => 'El campo descripción requiere minimo 5 caracteres.',
            'description.max' => 'El campo descripción tiene como limite 255 caracteres.',
            'contenido.required' => 'El campo de contenido es requerido.',
            'coorY.required' => 'El campo de coordenada es requerido.',
            'coorZ.required' => 'El campo de coordenada es requerido.',
            'slug.required' => 'El campo de la URL es requerido',
        ]);

        $content = new Campa;
        $content->name = $request->input('name');
        $content->date = $request->input('date');
        $content->description = $request->input('description');
        $content->contenido = $request->input('contenido');
        $content->coorY = $request->input('coorY');
        $content->coorZ = $request->input('coorZ');
        $content->slug = $request->input('slug');
        $content->save();
 
    }

}