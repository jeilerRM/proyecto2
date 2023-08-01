<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listado['empleados'] = empleado::paginate(5);
        return view('empleados.index',$listado);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //Acceder a create.blade.phhp de la vista para crear los empleados 
    //     return view('create.blade.php');
    // }


    public function create()
    {
        //Acceder a create.blade.phhp de la vista para crear los empleados 
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datosEmpleado = request()->all();
        $datosEmpleado = request()->except(['_token']);

        // Verificar si el usuario ha seleccionado una nueva foto, en caso de verdadero carga 
        if ($request->hasFile('Foto')){
            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        // sino selecciono una nueva foto sigue con la que tenia anteriormente 
        empleado::insert($datosEmpleado);
        //return response()->json($datosEmpleado);
        return redirect('empleados')->with('mensaje','registro ingresado con exito');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $empleado = empleado::findOrFail($id);
        return view('empleados.update', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $datos = request()->except(['_token','_method']);

        // Verificar si el usuario ha seleccionado una nueva foto, en caso de verdadero carga 
        if ($request->hasFile('Foto')){
            $datos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        // sino selecciono una nueva foto sigue con la que tenia anteriormente 
        empleado::where('id','=',$id)->update($datos);
        $empleado = empleado::findOrFail($id);
        return view('empleados.update',compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)    
    {
        //
        $empleado=empleado::findOrfail($id);
        if(Storage::delete('public/'.$empleado->Foto)){
            empleado::destroy($id);
        }
        return redirect('empleados')->with('mensaje','Registro eliminado exitosamente');
    }
}
