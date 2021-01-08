<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empleado;

class empleadoController extends Controller
{
    //Nos dará la visa de nuestros empleados
    public function index(){
        //Ordena los empleados por ID en paginas de 10
        $empleados = empleado::orderBy('id','DESC')->paginate(10);
        //Regresa a la vista la variable empleados para ser recorrida
        return view('index',compact('empleados'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $this->validate(
            $request,
            ['codigo'=>'required'],
            ['nombre'=>'required'],
            ['apellidopaterno'=>'required'],
            ['apellidomaterno'=>'required'],
            ['email'=>'required|email'],
            ['contrato'=>'required']
        );
        empleado::create($request->all());
        return redirect()->route('empleado.index')->with('success','Registro Creado');
    }

    public function show($id){
        $empleados = empleado::find($id);
        return view('empleado.show',compact('empleados'));
    }

    public function edit($id){
        $empleados = empleado::find($id);
        return view('edit', compact('empleados'));
    }

    public function update(Request $request,$id){
        $this->validate(
            $request,
            ['codigo'=>'required'],
            ['nombre'=>'required'],
            ['apellidopaterno'=>'required'],
            ['apellidomaterno'=>'required'],
            ['email'=>'required|email'],
            ['contrato'=>'required']
        );
        empleado::find($id)->update($request->all());
        return redirect()->route('index')->with('success','Registro actualizado');
    }

    public function destroy($id){
        empleado::find($id)->delete();
        return redirect()->route('empleado.index')->with('success','Registro eliminado');
    }

    public function cambiostat($id) {
        $data = empleado::find($id);
        if ($data->status){
            $data->status = false;
            $data->save();
        }else{
            $data->status = true;
            $data->save();
        }
        return redirect()->route('empleado.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function status($id)
    {
        $empleados=empleado::find($id);
        return view('masinfo',compact('empleados'));
    }

}
