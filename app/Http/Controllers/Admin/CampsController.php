<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Camp;
use Storage;

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
        $data = Camp::find($id);
        return view('admin.camps.edit')
                ->with('data', $data);
    }

    public function list(){
        $data = Camp::all();
        return view('admin.camps.list')
            ->with('data', $data);
    }

    public function storeImage(Request $request){

        if ($request->hasFile('file')) {

            $image      = $request->file('file');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('camps')->put($fileName, file_get_contents($image->getRealPath()));
        }

        return response()->json(array('location' => '/storage/camps/'.$fileName));

    }

    public function store(Request $request, $id = null){

        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:5|max:255',
            'coorY' => 'required',
            'coorZ' => 'required',
            'content' => 'required',
            'slug' => 'required'
        ],[
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.min' => 'El campo Nombre requiere minimo 3 caracteres.',
            'name.max' => 'El campo Nombre tiene como limite 255 caracteres.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.min' => 'El campo descripción requiere minimo 5 caracteres.',
            'description.max' => 'El campo descripción tiene como limite 255 caracteres.',
            'content.required' => 'El campo de contenido es requerido.',
            'coorY.required' => 'El campo de coordenada es requerido.',
            'coorZ.required' => 'El campo de coordenada es requerido.',
            'slug.required' => 'El campo de la URL es requerido',
        ]);

        if($id != null){
            $camp = Camp::find($id);
            if(!$camp){
                $camp = new Camp;
            }
        }else{
            $camp = new Camp;
        }

        $camp->name = $request->input('name');
        $camp->date = $request->input('date');
        $camp->description = $request->input('description');
        $camp->content = $request->input('content');
        $camp->coorY = $request->input('coorY');
        $camp->coorZ = $request->input('coorZ');
        $camp->slug = $request->input('slug');
        $camp->save();

        return redirect()->route('admin.camps.list')->with('status', 'Cambios guardados.');
 
    }

}