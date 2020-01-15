<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientsRequest;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientsRequest $request)
    {
        $client = new Client();
        $client->nombre = $request->input('nombre');
        $client->apellido = $request->input('apellido');
        $client->cedula = $request->input('cedula');
        $client->direccion = $request->input('direccion');
        $client->telefono = $request->input('telefono');
        $client->email = $request->input('email');
        $client->save();
        return redirect('/clientes');
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
        $clientUpdate = Client::findOrFail($id);
        return view('clients.edit', compact('clientUpdate'));
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
        $updateClient = Client::findOrFail($id);
        $updateClient->nombre = $request->nombre;
        $updateClient->apellido = $request->apellido;
        $updateClient->cedula = $request->cedula;
        $updateClient->direccion = $request->direccion;
        $updateClient->telefono = $request->telefono;
        $updateClient->email = $request->email;
        $updateClient->save();
        return redirect('/clientes')->with('update', 'El cliente ah sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientDelete = Client::findOrFail($id);
        $clientDelete->delete();
        return redirect('/clientes')->with('delete', 'El cliente se ah eliminado correctamente');
    }
}
