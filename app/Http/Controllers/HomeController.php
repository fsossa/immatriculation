<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agents = DB::table('users')
            ->join('departements','users.departements_id','=','departements.id')
            ->where('users.roles_id', '=', 2)
            ->select('users.*', 'departements.nom as departement')
            ->orderBy('users.id', 'desc')
            ->limit(3)
            ->get();

        $vehicules = DB::table('vehicules')
            ->join('clients','clients.id','=','vehicules.clients_id')
            ->join('modeles','modeles.id','=','vehicules.modeles_id')
            ->join('statuses','statuses.id','=','vehicules.statuses_id')
            ->select('vehicules.*', 'clients.nom as client', 'modeles.marque', 'modeles.model', 'statuses.titre')
            ->orderBy('vehicules.id', 'desc')
            ->limit(10)
            ->get();

        $clients = DB::table('clients')
            ->join('departements','clients.departements_id','=','departements.id')
            ->join('vehicules','vehicules.clients_id','=','clients.id')
            ->select('clients.*', 'departements.nom as departement', 'vehicules.*')
            ->orderBy('clients.id', 'desc')
            ->limit(5)
            ->get();

        $modeles = DB::table('modeles')
            ->select('modeles.*')
            ->orderBy('modeles.id', 'desc')
            ->limit(4)
            ->get();

        //dd($clients); exit();
        return view('home', compact('agents', 'vehicules', 'clients', 'modeles'));
    }
}
