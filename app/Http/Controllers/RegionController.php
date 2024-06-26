<?php

namespace App\Http\Controllers;

use App\Models\Delegacion;
use App\Models\Region;


use App\Models\Nomenclatura;
use App\Models\Maestro;
use App\Models\Secretaria;







use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{

    /**
     * Funcion contructora
     */
    public function __construct()
    {
        // $this->middleware('can: region.edit')->only('edit');
        // $this->middleware('can: region.create')->only('create');
        // $this->middleware('can: region.show')->only('show');
        // $this->middleware('can: region.edit')->only('edit');
        // $this->middleware('can: region.destroy')->only('destroy');
        $this->middleware('can:region.index')->only('index');
        $this->middleware('can:region.create')->only('create');
        $this->middleware('can:region.show')->only('show');
        $this->middleware('can:region.edit')->only('edit','update');
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            
        // Obtener todas las regiones con el recuento de delegaciones por región
        $regiones = Region::withCount('delegaciones')->get();

        return view('config.regiones.index', compact('regiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return "Crear una nueva Región";
        return view('config.regiones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Definiendo la regla de validación, validando los datos del formulario
        $validation = $request->validate([
            'region' => 'required|string',
            'sede' => 'required|string',
            'coordinador' => 'required|string',
        ]);

        // Creamos una nueva instancia del modelo Región
        $region = new Region();

        // Asignar el valor de los campo convertido a mayúsculas usando mb_strtoupper
        // 'UTF-8' especifica la codificación de caracteres multibyte que estamos utilizando        
        $region->region = mb_strtoupper($request->input('region'),'UTF-8') ;
        $region->sede = mb_strtoupper($request->input('sede'),'UTF-8');
        $region->coordinador = mb_strtoupper($request->input('coordinador'),'UTF-8');

        // Guardar el nuevo registro en la base de datos
        $region->save();

        // Redireccionar a la lista de regiones index después de guardar exitosamente
        // con un mensaje de éxito usando ->with('success', 'Mensaje')        
        return redirect('/regiones')->with('success', 'Su registro se guardo con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Region $region, $id)
    {

        $region = Region::findOrFail($id);

        $delegacion = Delegacion::with(['maestros' => function ($query) {
            $query->orderBy('id', 'desc');
        }])->find($id);

        return view('config.regiones.show', compact('region','delegacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region, $id)
    {
        $region = Region::find($id);
        return view('config.regiones.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region, $id)
    {

        $region = Region::find($id);

        // Definiendo la regla de validación
        $validation = $request->validate([
            'region' => 'required|string',
            'sede' => 'required|string',
            'coordinador' => 'required|string',
        ]);


        $region->region = mb_strtoupper($request->input('region'),'UTF-8') ;
        $region->sede = mb_strtoupper($request->input('sede'),'UTF-8');
        $region->coordinador = mb_strtoupper($request->input('coordinador'),'UTF-8');
        
        // Guardar el nuevo registro en la base de datos
        $region->save();

        return redirect('/regiones')->with('update', 'Su registro ha sido actualizdo con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region, $id)
    {
        // $region = Region::find($id);
        
        // if(!$region) {
        //     return abort(404);
        // }

        // $region->delete();

        // return back()->with('delete', 'Su registro ha sido eliminado.');
        
        try {
            $region = Region::find($id);
            $region->delete();
            return back()->with('delete', 'Su registro ha sido eliminado.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                // return response()->json(['message' => 'No es posible borrar el registro debido a que corresponde a otras delegaciones'], 422);
                return back()->with('error', 'Error al eliminar la región.');
            } else {
                // Si es otra excepción, puedes manejarla según tus necesidades
                // return response()->json(['message' => 'Error desconocido al eliminar el registro'], 500);
                return back()->with('error', 'Error desconocido al eliminar el registro.');
            }
        }
    }
}
