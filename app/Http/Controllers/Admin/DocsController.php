<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Doc;
use Storage;
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
                ->with('docs', Doc::paginate(10));
    }

    /**
     * Muestra el formulario para añadir un documento
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add(){
        return view('admin.docs.add');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required|min:3|max:255',
            'doc' => 'required',
        ],[
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.min' => 'El campo Nombre requiere minimo 3 caracteres.',
            'name.max' => 'El campo Nombre tiene como limite 255 caracteres.',
            'doc.required' => 'El campo Documento es obligatorio.'
        ]);

        $doc = $request->file('doc');
        $fileName   = strtolower(str_replace("-", " ", $request->get('name'))) . '.' . $doc->getClientOriginalExtension();
        Storage::disk('docs')->put($fileName, file_get_contents($doc->getRealPath()));

        $doc = new Doc;
        $doc->name = $request->get('name');
        $doc->slug = $fileName;
        $doc->save();

        return redirect()->route('admin.docs.list')->with('Documento agregado correctamente.');
    }

    public function destroy($id){
        Doc::destroy($id);
        return redirect()->route('admin.docs.list')->with('Documento eliminado correctamente.');
    }


}
