<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();

        return view('cliente', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("novocliente");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->name = $request->input('nomeCliente');
        $cliente->cpf = $request->input('cpfCliente');
        $cliente->dt_nascimento = $request->input('dtnscCliente');
        $cliente->email = $request->input('emailCliente');
        $cliente->password = Hash::make($request->input('senhaCliente'));
        $cliente->telefone = $request->input('telefoneCliente');
        $cliente->tipo = $request->input('tipoCliente');

        $cliente->save();
        return redirect('/cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        if(isset($cliente)) {
            return view('editarcliente',compact('cliente'));
        } else {
            return redirect('/cliente');
        }
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
        $cliente = Cliente::find($id);

        if (isset($cliente)) {
            $cliente->name = $request->input('nomeCliente');
            $cliente->cpf = $request->input('cpfCliente');
            $cliente->dt_nascimento = $request->input('dtnscCliente');
            $cliente->email = $request->input('emailCliente');

            if ($cliente->password != $request->input('senhaCliente')) {
                $cliente->password = $request->input('senhaCliente');
            }

            $cliente->telefone = $request->input('telefoneCliente');
            $cliente->tipo = $request->input('tipoCliente');


            $cliente->save();
        }
        return redirect('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Cliente::find($id);
        if(isset($clientes)) {
            $clientes->delete();
        }
        return redirect('/cliente');
    }

    public function indexJson()
    {
        $clientes = Cliente::all();
        return json_encode($clientes);
    }

}
