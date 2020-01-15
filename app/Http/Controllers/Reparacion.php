<?php

namespace App\Http\Controllers;

use App\Client;
use App\Phone;
use App\Http\Requests\ReciboRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;


class Reparacion extends Controller
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
        $recibos = Phone::all();
        return view('recibos.index', compact('recibos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $recibo_numero = Phone::count() + 1;
        return view('recibos.create', compact('clients', 'recibo_numero'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReciboRequest $request)
    {
        $phone = new Phone();
        $phone->numero_recibo = $request->input('numero_recibo');
        $phone->marca = $request->input('marca');
        $phone->modelo = $request->input('modelo');
        $phone->imei = $request->input('imei');
        $phone->codigo = $request->input('codigo');
        $phone->daño = $request->input('daño');
        $phone->total = $request->input('total');
        $phone->abono = $request->input('abono');
        $phone->restante = $request->input('restante');
        $phone->estado = $request->input('estado');
        $phone->client_id = $request->input('cliente'); 
        $recibo = $phone->save();
        $client = Client::find($request->input('cliente'));
        $fecha = new \DateTime();
        $fechaActual = $fecha->format('Y-m-d H:i:s');
        $data = [
            'created_at' => $fechaActual, 
            'daño' => $request->input('daño'), 
            'codigo' => $request->input('codigo'), 
            'marca' => $request->input('marca'), 
            'modelo' => $request->input('modelo'), 
            'total' => $request->input('total'), 
            'abono' => $request->input('abono'), 
            'restante' => $request->input('restante'), 
            'client' => $client , 
            'imei' => $request->input('imei'), 
            'numero_recibo' => $request->input('numero_recibo')
        ];
        $customPaper = array(0,0,840,820);
        $pdf = PDF::loadView('recibos.pdf',$data)->setPaper($customPaper, 'portrait');
        try{
            Mail::send('recibos.pdf', $data, function($message)use($data,$pdf) {
                
                $message->to($data['client']->email, $data['client']->nombre)
                ->subject("Recibo BlackPhone")
                ->attachData($pdf->output(), 'recibo.pdf');
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";

        }else{

           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }

        return redirect('/recibos')->with('create', "Se creo un nuevo Recibo con exito");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recibo = Phone::find($id);
        return view('recibos.show', compact('recibo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reciboUpdate = Phone::findOrFail($id);
        return view('recibos.edit', compact('reciboUpdate'));
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
        $reciboUpdate = Phone::findOrFail($id);
        $reciboUpdate->numero_recibo = $request->numero_recibo;
        $reciboUpdate->marca = $request->marca;
        $reciboUpdate->modelo = $request->modelo;
        $reciboUpdate->imei = $request->imei;
        $reciboUpdate->codigo = $request->codigo;
        $reciboUpdate->daño = $request->daño;
        $reciboUpdate->total = $request->total;
        $reciboUpdate->abono = $request->abono;
        $reciboUpdate->restante = $request->restante;
        $reciboUpdate->estado = $request->estado;
        $reciboUpdate->client_id = $request->cliente; 
        $reciboUpdate->save();
        return redirect('/recibos')->with('update', "Se Actualizo el recibo con exito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reciboDelete = Phone::findOrFail($id);
        $reciboDelete->delete();
        return redirect('/recibos')->with('delete', "Se Elimino el recibo con exito");
    }

    public function exportarPDF($id){
        $recibo = Phone::find($id);
        $data = ['created_at' => $recibo->created_at, 'daño' => $recibo->daño, 'codigo' => $recibo->codigo, 'marca' => $recibo->marca, 'modelo' => $recibo->modelo, 'total' => $recibo->total, 'abono' => $recibo->abono, 'restante', $recibo->restante, 'client' => $recibo->client , 'imei' => $recibo->imei, 'numero_recibo' => $recibo->id];
        $customPaper = array(0,0,840,820);
        $pdf = PDF::loadView('recibos.pdf',$data)->setPaper($customPaper, 'portrait');
        return $pdf->download("reciboPdf");
        try{
            Mail::send('recibos.pdf', $data, function($message)use($data,$pdf) {
                
                $message->to('jp279077@gmail.com', "Juan Pablo")
                ->subject("Recibo BlackPhone")
                ->attachData($pdf->output(), 'recibo.pdf');
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";

        }else{

           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        // return redirect('/create-certificate-colombia')->with('enviado', 'Correo enviado Exitosamente!');
        return $pdf->download("reciboPdf");
        
        // return view('recibos.pdf', compact('recibo'));
        // $pdf = PDF::loadView('recibos.pdf', compact('recibo'));
        // return $pdf->download('recibo.pdf');
    }

}
