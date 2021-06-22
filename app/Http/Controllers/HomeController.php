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
        //Nombre total d'utilisateur
        $stat['nbr_user'] = DB::table('users')
            ->select('users.*')
            ->get()->count();

        //Nombre total de véhicule
        $stat['nbr_vehicule'] = DB::table('vehicules')
            ->select('vehicules.*')
            ->get()->count();
        
        //Nombre total de client
        $stat['nbr_client'] = DB::table('clients')
            ->select('clients.*')
            ->get()->count();
        
        //Nombre total de modele
        $stat['nbr_modele'] = DB::table('modeles')
            ->select('modeles.*')
            ->get()->count();
        
        //Nombre de véhicules immatriculés
        $stat['nbr_vehicule_cours'] = DB::table('vehicules')
            ->where('vehicules.statuses_id', '=', 2)
            ->select('vehicules.*')
            ->get()->count();

        //Nombre de véhicule en cours de proccessus
        $stat['nbr_vehicule_att'] = DB::table('vehicules')
            ->where('vehicules.statuses_id', '=', 1)
            ->select('vehicules.*')
            ->get()->count();

        //Nombre de véhicules en debut de processus
        $stat['nbr_vehicule_val'] = DB::table('vehicules')
            ->where('vehicules.statuses_id', '=', 3)
            ->select('vehicules.*')
            ->get()->count();

        //Nombre total de véhicule en traintement au cours de chaque mois
        $stat['vehicules_t'] = $this->concacT();

        //Nombre total de véhicule en immatriculés au cours de chaque mois
        $stat['vehicule_by_m'] = $this->concacM();

        //Nombre total de véhicule en immatriculés au cours de chaque mois
        $stat['vehicule_taux_m'] = $this->concacP();

        //Nombre total de véhicule en immatriculés au cours de chaque mois
        $stat['vehicule_taux_f'] = $this->tauxf();
        //dd($stat['vehicule_taux_f']); exit();

        //Les dèrniers véhicule enrégistrés
        $vehicules = DB::table('vehicules')
            ->join('clients','clients.id','=','vehicules.clients_id')
            ->join('modeles','modeles.id','=','vehicules.modeles_id')
            ->join('statuses','statuses.id','=','vehicules.statuses_id')
            ->select('vehicules.*', 'clients.nom as client', 'modeles.marque', 'modeles.model', 'statuses.titre')
            ->orderBy('vehicules.id', 'desc')
            ->limit(10)
            ->get();

        /*$clients = DB::table('clients')
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
            ->get();*/

        //dd($clients); exit();
        return view('home', compact('stat', 'vehicules'));
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

    protected function concacP()
    {
        $conP = '[';
        $m = 1;
        while ($m <= date('n')) {
            $nbrMT = $this->nbrByMonthP($m) + $this->nbrByMonth($m);
            $nbrM = $this->nbrByMonthV($m);
            if ($nbrMT == 0) {
                $nbrP = 0;
            }else{
                $nbrP = ($nbrM / $nbrMT) * 100;
            }
            
            if ($m == date('n')) {
                $conP = $conP.$nbrP.']';
            }else{
                $conP = $conP.$nbrP.', ';
            }

            $m += 1;
            
        }
        return $conP;
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

    protected function tauxf(){
        $nbrT = DB::table('vehicules')
            ->where('vehicules.annee', '=', date('Y'))
            ->select('vehicules.*')
            ->get()->count();

        $nbrV = DB::table('vehicules')
            ->where('vehicules.annee', '=', date('Y'))
            ->select('vehicules.*')
            ->where('vehicules.statuses_id', '=', 3)
            ->get()->count();

        if ($nbrT == 0) {
                $nbr = 0;
            }else{
                $nbr = ($nbrV / $nbrT)*100;
            }
        
        return round($nbr, 2);

    }
}
