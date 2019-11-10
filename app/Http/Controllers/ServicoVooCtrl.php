<?php

namespace App\Http\Controllers;

use App\ServicoVoo;
use Illuminate\Http\Request;

class ServicoVooCtrl extends Controller
{
    public function indexView()
    {
        return view('servicovoo');
    }

    public function index()
    {
        $prods = ServicoVoo::all();
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new ServicoVoo();
        $prod->descricao = $request->input('descricao');
        $prod->servico_id = $request->input('servico_id');
        $prod->passagem_id = $request->input('passagem_id');
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
        $prod = ServicoVoo::find($id);
        if (isset($prod)) {
            return json_encode($prod);
        }
        return response('ServicoVoo não encontrado', 404);
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
        $prod = ServicoVoo::find($id);
        if (isset($prod)) {
            $prod->descricao = $request->input('descricao');
            $prod->servico_id = $request->input('servico_id');
            $prod->passagem_id = $request->input('passagem_id');
            $prod->save();
            return json_encode($prod);
        }
        return response('ServicoVoo não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = ServicoVoo::find($id);
        if (isset($prod)) {
            $prod->delete();
            return response('OK', 200);
        }
        return response('ServicoVoo não encontrado', 404);
    }
}
