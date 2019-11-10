<?php

namespace App\Http\Controllers;

use App\Passagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassagemCtrl extends Controller
{

    public function indexView()
    {
        return view('passagem');
    }

    public function index()
    {
        $passagens = Passagem::all();
        return view('passagem', compact('passagens'));
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

        if (Auth::check()) {

            $user = Auth::user();

            $passagem = new Passagem();
            $passagem->tipo = $request->input('tipoPassagem');
            $passagem->classe = $request->input('classePassagem');
            $passagem->assento = $request->input('assentoPassagem');
            $passagem->portao = $request->input('portaoPassagem');
            $passagem->preco = $request->input('precoPassagem');
            $passagem->voo_id = $request->input('vooPassagem');
            $passagem->cliente_id = $user->id;
            $passagem->save();
            return redirect('/passagem');
        } else {
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $passagem = Passagem::find($id);
        if (isset($passagem)) {
            return json_encode($passagem);
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
        $passagem = Passagem::find($id);
        if(isset($passagem)) {
            return view('editarpassagem',compact('passagem'));
        } else {
            return redirect('/passagem');
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
        $passagem = Passagem::find($id);
        if (isset($passagem)) {
            $passagem->tipo = $request->input('tipoPassagem');
            $passagem->classe = $request->input('classePassagem');
            $passagem->assento = $request->input('assentoPassagem');
            $passagem->portao = $request->input('portaoPassagem');
            $passagem->preco = $request->input('precoPassagem');
            $passagem->voo_id = $request->input('vooPassagem');
            $passagem->save();
            return redirect('/passagem');
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
        $passagem = Passagem::find($id);
        if (isset($passagem)) {
            $passagem->delete();
            return response('OK', 200);
        }
        return response('Passagem não encontrado', 404);
    }
}
