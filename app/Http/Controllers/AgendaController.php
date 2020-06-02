<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// el modelo usar
use App\Agenda;

class AgendaController extends Controller
{

//proteger con milddleware si no esta autenticado no podra

    public function __construct()
    {
        //solo aplicar al create
        $this->middleware('auth',['only'=>'create']);


        //otra manera es hacerlo asi
        $this->middleware('auth')->only(['edit']);
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //la variable Request con nombre $request servira para buscar
    public function index(Request $request)
    {
        //traiga todo de la base
        //$Agenda= Agenda::all();

        /// del inde del name input
        $buscar=$request->get('buscarpor');
         $tipo=$request->get('tipo');

         //sirve para llamar a todas las variables
         $variablesurl=$request->all();
         
        
        // quitamos el all por que se vuelve lenta la pagina
        //usaremos el paginate con el numero 5 que me pondra 5 por cada pagina max
         // el appends es para conervar las busquedas en cada pagina
        $Agenda=Agenda::buscarpor($tipo,$buscar)->paginate(3)->appends($variablesurl);
        
        //pasamos la variable agenda
        return view('agenda.index',compact('Agenda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //instanciar al modelo
        $Agenda= new Agenda;
        $Agenda->nombres= $request->nombres;
         $Agenda->apellidos= $request->apellidos;
          $Agenda->telefono= $request->telefono;
         $Agenda->celular= $request->celular;
          $Agenda->sexo= $request->sexo;
         $Agenda->email= $request->email;
         $Agenda->posicion = $request->posicion;
         $Agenda->departamento= $request->departamento;
          $Agenda->salario= $request->salario;
         $Agenda->fechadenacimiento= $request->fechadenacimiento;


         $Agenda->save();
         
         //return "Guardado correctament";
        //aredireccionar si agenda index  with con una variable datos que tendra dentro registro guar.........
         return redirect()->route('agenda.index')->with('datos','Registro Guardado correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //vamos a buscar por id y mostraremos

        $Agenda=Agenda::findOrFail($id);

        return view('agenda.show',compact('Agenda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Agenda=Agenda::findOrFail($id);

        return view('agenda.edit',compact('Agenda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //buscar por id para modificar

        $Agenda=Agenda::findOrFail($id);

        //poner en todos los campos lo que modifico y lo que no 

         $Agenda->nombres= $request->nombres;
         $Agenda->apellidos= $request->apellidos;
          $Agenda->telefono= $request->telefono;
         $Agenda->celular= $request->celular;
          $Agenda->sexo= $request->sexo;
         $Agenda->email= $request->email;
         $Agenda->posicion = $request->posicion;
         $Agenda->departamento= $request->departamento;
          $Agenda->salario= $request->salario;
         $Agenda->fechadenacimiento= $request->fechadenacimiento;


         $Agenda->save();
         
         //return "Guardado correctament";
        //aredireccionar si agenda index  with con una variable datos que tendra dentro registro guar.........
         return redirect()->route('agenda.index')->with('datos','Registro Actualizado Correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //pasamos id
        $Agenda=Agenda::findOrFail($id);
        //llamamos al metodo delete
        $Agenda->delete();

        return redirect()->route('agenda.index')->with('datos','Registro Borrado correctamente');
    }

     public function confirm($id)
    {
        //
        $Agenda=Agenda::findOrFail($id);

        return view('agenda.confirm',compact('Agenda'));
    }
}
