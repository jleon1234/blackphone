<?php

namespace App\Http\Controllers;

use App\Client;
use App\Phone;
use App\Ventas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fecha = new \DateTime();
        $fechaActual = $fecha->format('Y-m-d');
        $clientCount = Client::count();
        $recibosCount = Phone::count();
        $ventas = Ventas::whereDate("created_at", $fechaActual)->get();
        $ventasCount = count($ventas);
        $totalVendido = 0;
        for ($i=0; $i < count($ventas) ; $i++) { 
            $totalVendido += $ventas[$i]->total;
        }
        return view('home', compact('clientCount','recibosCount', 'ventasCount', 'totalVendido', 'fechaActual'));
    }
}
