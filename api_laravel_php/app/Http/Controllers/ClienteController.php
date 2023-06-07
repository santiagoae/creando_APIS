<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
    public function index()
    {
        return Cliente::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'lastname' => 'required'
        ]);
        $cliente = new Cliente;
        $cliente->nombres = $request->name;
        $cliente->apellidos = $request->lastname;
        $cliente->save();

        return $cliente;
    }

    
    public function show(Cliente $cliente)
    {
        //en este caso lo que hace es que va al modelo y hace un find. Cliente::find($cliente)
        return $cliente;
    }

    
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->nombres = $request->name;
        $cliente->apellidos = $request->lastname;
        $cliente->update();
        return $cliente;
    }

    
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        //return "El cliente fue eliminado con exito";
        return response()->noContent(); //status 200 con aviso de que no tiene contenido que mostrar
    }
}
