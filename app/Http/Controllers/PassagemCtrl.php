<?php

namespace App\Http\Controllers;

use App\Passagem;
use Illuminate\Http\Request;

class PassagemCtrl extends Controller
{
    public function indexView()
    {
        return view('passagem');
    }

    public function index()
    {
        $prods = Passagem::all();
        return $prods->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("novapassagem");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Passagem();
        $prod->tipo = $request->input('tipoPassagem');
        $prod->classe = $request->input('classePassagem');
        $prod->assento = $request->input('assentoPassagem');
        $prod->portao = $request->input('portaoPassagem');
        $prod->preco = $request->input('precoPassagem');
        $prod->voo_id = $request->input('vooPassagem');
       // $prod->cliente_id = $request->input('clientePassagem');
        $prod->save();
        return json_encode($prod);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prod = Passagem::find($id);
        if (isset($prod)) {
            return json_encode($prod);
        }
        return response('Passagem não encontrada', 404);
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
        $prod = Passagem::find($id);
        if (isset($prod)) {
            $prod->nome = $request->input('nome');
            $prod->preco = $request->input('preco');
            $prod->estoque = $request->input('estoque');
            $prod->categoria_id = $request->input('categoria_id');
            $prod->save();
            return json_encode($prod);
        }
        return response('Passagem não encontrada', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Passagem::find($id);
        if (isset($prod)) {
            $prod->delete();
            return response('OK', 200);
        }
        return response('Passagem não encontrado', 404);
    }
}
