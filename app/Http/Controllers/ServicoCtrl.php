<?php

namespace App\Http\Controllers;

use App\Servico;
use Illuminate\Http\Request;

class ServicoCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::all();

        return view('servico', compact('servicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("novoservico");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servico = new Servico();
        $servico->nome = $request->input('nomeServico');
        $servico->descricao = $request->input('descricaoServico');
        $servico->save();
        return redirect('/servico');
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
        $servico = Servico::find($id);
        if(isset($servico)) {
            return view('editarservico',compact('servico'));
        } else {
            return redirect('/servico');
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
        $servico = Servico::find($id);
        if(isset($servico)) {
            $servico->nome = $request->input('nomeServico');
            $servico->descricao = $request->input('descricaoServico');
            $servico->save();
        }
        return redirect('/servico');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servicos = Servico::find($id);
        if(isset($servicos)) {
            $servicos->delete();
        }
        return redirect('/servico');
    }

    public function indexJson()
    {
        $servicos = Servico::all();
        return json_encode($servicos);
    }
}
