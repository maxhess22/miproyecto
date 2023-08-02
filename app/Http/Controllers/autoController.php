<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Modelo;
use App\Models\Marca;
use Inertia\Inertia;


class autoController extends Controller
{

    // Funcion para leer registros//
    public  function index() {
        $auto = Auto::all();
        $marca = Marca::all();
        $modelo = Modelo::all();

        return Inertia::render('read', compact('auto', 'marca', 'modelo'));
    }

    // Llama a la vista para crear  // 
    public  function create() {
        $marca = Marca::all();
        $modelo = '';
        return view('create', compact('marca', 'modelo'));
    }
    public  function store(Request $request) {
        $request->validate([
            'Patente' => ['regex:/([A-Z]{2}-[A-Z]{2}-[0-9]{2}$)/', 'max:8', 'bail']
        ]);
        $datosAuto = request()->except('_token');
        $auto = Auto::create($request->all());
    
        
        return redirect('/read');
    }
    public  function delete($auto_id) {
        Auto::destroy($auto_id);
        return redirect('/read');
    }
    public  function edit( $id) {
        $auto= Auto::find($id);
        
        return view('edit', ['auto'=>$auto]);
    }
    public  function update(Request $request, $id) {
        
        // $auto = auto::find($id);
        // $auto -> modelo = $request->modelo;s
        // $auto -> descripcion = $request->descripcion;
        // $auto->save();
        
        $auto= auto::where('id', $id)
            ->update($request->except(['_token','_method']));
        
        session()->flash('message', 'Post successfully updated.');
        return redirect('/read');
    }

    public function show()
    {
        $auto = Auto::all();
        $marca = Marca::all();
        $modelo = Modelo::all();
        return Inertia::render('create', compact('auto', 'marca', 'modelo'));
    }

}

