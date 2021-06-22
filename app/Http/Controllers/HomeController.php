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
        $stat['nbr_user'] = DB::table('users')
            ->select('users.*')
            ->get()->count();
        
        $stat['nbr_vehicule'] = DB::table('vehicules')
            ->select('vehicules.*')
            ->get()->count();
        
        $stat['nbr_client'] = DB::table('clients')
            ->select('clients.*')
            ->get()->count();
        
        $stat['nbr_modele'] = DB::table('modeles')
            ->select('modeles.*')
            ->get()->count();
        
        $stat['nbr_vehicule_cours'] = DB::table('vehicules')
            ->where('vehicules.statuses_id', '=', 2)
            ->select('vehicules.*')
            ->get()->count();

        $stat['nbr_vehicule_att'] = DB::table('vehicules')
            ->where('vehicules.statuses_id', '=', 1)
            ->select('vehicules.*')
            ->get()->count();

        $stat['nbr_vehicule_val'] = DB::table('vehicules')
            ->where('vehicules.statuses_id', '=', 3)
            ->select('vehicules.*')
            ->get()->count();

        //$nbrM = $this->nbrByMonthP(6);
        //dd($nbrM); exit();
        $stat['vehicules_t'] = $this->concacT();

        $stat['vehicule_by_m'] = $this->concacM();
        //dd($stat['vehicule_by_m']); exit();

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
        return view('home', compact('stat', 'vehicules', 'clients', 'modeles'));
    }

    protected function concacT()
    {
        $conY = '[';
        $m = 1;
        while ($m <= date('n')) {
            
            $nbrM = $this->nbrByMonthP($m) + $this->nbrByMonth($m);
            if ($m == date('n')) {
                $conY = $conY.$nbrM.']';
            }else{
                $conY = $conY.$nbrM.', ';
            }

            $m += 1;
            
        }
        return $conY;
    }

    protected function concacM()
    {
        $conM = '[';
        $m = 1;
        while ($m <= date('n')) {
            
            $nbrM = $this->nbrByMonthV($m);
            if ($m == date('n')) {
                $conM = $conM.$nbrM.']';
            }else{
                $conM = $conM.$nbrM.', ';
            }

            $m += 1;
            
        }
        return $conM;
    }

    protected function nbrByMonth($m){
        $nbr = DB::table('vehicules')
            ->where('vehicules.annee', '=', date('Y'))
            ->where('vehicules.mois', '=', $m)
            ->select('vehicules.*')
            ->get()->count();

        return $nbr;

    }

    protected function nbrByMonthP($m){
        $nbr = DB::table('vehicules')
            ->where('vehicules.annee', '=', date('Y'))
            ->where('vehicules.mois', '<', $m)
            ->where('vehicules.statuses_id', '<', 3)
            ->select('vehicules.*')
            ->get()->count();

        return $nbr;
    }

    protected function nbrByMonthV($m){
        $nbr = DB::table('vehicules')
            ->where('vehicules.annee', '=', date('Y'))
            ->where('vehicules.mois', '=', $m)
            ->where('vehicules.statuses_id', '=', 3)
            ->select('vehicules.*')
            ->get()->count();

        return $nbr;

    }
}
