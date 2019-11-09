<?php

namespace App\Http\Controllers;

use App\Voo;
use Illuminate\Http\Request;

class VooCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voos = Voo::all();

        return view('voo', compact('voos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("novovoo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voo = new Voo();
        $voo->destino = $request->input('destinoVoo');
        $voo->dt_voo = $request->input('dataVoo');
        $voo->save();
        return redirect('/voo');
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
        $voo = Voo::find($id);
        if(isset($voo)) {
            return view('editarvoo',compact('voo'));
        } else {
            return redirect('/voo');
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
        $voo = Voo::find($id);
        if(isset($voo)) {
            $voo->destino = $request->input('destinoVoo');
            $voo->dt_voo = $request->input('dataVoo');
            $voo->save();
        }
        return redirect('/voo');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voos = Voo::find($id);
        if(isset($voos)) {
            $voos->delete();
        }
        return redirect('/voo');
    }

    public function indexJson()
    {
        $voos = Voo::all();
        return json_encode($voos);
    }
}
