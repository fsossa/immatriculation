<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\Client;
use App\Models\Modele;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use DB;

class VehiculeController extends Controller
{
   
    function __construct()
    {
        $this->middleware('permission:vehicule-list|vehicule-create|vehicule-edit|vehicule-delete', ['only' => ['index','show']]);
        $this->middleware('permission:vehicule-create', ['only' => ['create','store']]);
        $this->middleware('permission:vehicule-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:vehicule-delete', ['only' => ['destroy']]);

        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active['accueil'] = '';
        $active['vehicule'] = 'active';
        $active['client'] = '';
        $active['user'] = '';
        $active['modele'] = '';
        $active['role'] = '';

        $actives = $active;
        $vehicules = DB::table('vehicules')
            ->join('clients','clients.id','=','vehicules.clients_id')
            ->join('modeles','modeles.id','=','vehicules.modeles_id')
            ->join('statuses','statuses.id','=','vehicules.statuses_id')
            ->select('vehicules.*', 'clients.nom as client', 'modeles.marque', 'modeles.model', 'statuses.titre')
            ->orderBy('vehicules.id', 'desc')
            ->get();

        $clients = Client::all();
        $modeles = Modele::all();
        $statuses = Status::all();

        return view('vehicule_index', compact('vehicules', 'clients', 'modeles', 'statuses', 'actives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active['accueil'] = '';
        $active['vehicule'] = 'active';
        $active['client'] = '';
        $active['user'] = '';
        $active['modele'] = '';
        $active['role'] = '';

        $actives = $active;
        $clients = Client::all();
        $modeles = Modele::all();
        $statuses = Status::all();
        return view('vehicule_create', compact('clients', 'modeles', 'statuses', 'actives'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump("expression"); exit();
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'num_chassis' => 'required|max:255',
            'plaque' => 'required',
            'annee_sortie' => 'required|min:4|max:4',
            'clients_id' => 'required',
            'modeles_id' => 'required',
            'statuses_id' => 'required',
        ]);
        $validatedData['users_id'] = Auth::id();
        $validatedData['mois'] = date('n');
        $validatedData['annee'] = date('Y');
        //var_dump($validatedData); exit();

        $vehicule = Vehicule::create($validatedData);

        return redirect('/vehicules')->with('success', 'Immatriculation effectuée avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $active['accueil'] = '';
        $active['vehicule'] = 'active';
        $active['client'] = '';
        $active['user'] = '';
        $active['modele'] = '';
        $active['role'] = '';

        $actives = $active;
        $vehicule = DB::table('vehicules')
            ->join('clients','clients.id','=','vehicules.clients_id')
            ->join('modeles','modeles.id','=','vehicules.modeles_id')
            ->join('statuses','statuses.id','=','vehicules.statuses_id')
            ->join('users','users.id','=','vehicules.users_id')
            ->where('vehicules.id', '=', $id)
            ->select('vehicules.*', 'clients.nom as c_nom', 'clients.prenoms', 'clients.id as c_id', 'clients.num_ci', 'clients.phone', 'clients.email', 'modeles.marque', 'modeles.model', 'statuses.titre', 'users.name as user')
            ->first();

        return view('vehicule_show', compact('vehicule', 'actives'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $active['accueil'] = '';
        $active['vehicule'] = 'active';
        $active['client'] = '';
        $active['user'] = '';
        $active['modele'] = '';
        $active['role'] = '';

        $actives = $active;
        $vehicule = Vehicule::findOrFail($id);
        $clients = Client::all();
        $modeles = Modele::all();
        $statuses = Status::all();

        return view('vehicule_edit', compact('vehicule', 'clients', 'modeles', 'statuses', 'actives'));
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
        //var_dump("expression"); exit();
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'num_chassis' => 'required|max:255',
            'plaque' => 'required',
            'annee_sortie' => 'required|min:4|max:4',
            'clients_id' => 'required',
            'modeles_id' => 'required',
            'statuses_id' => 'required',
        ]);
        $validatedData['mois'] = date('n');
        $validatedData['annee'] = date('Y');

        Vehicule::whereId($id)->update($validatedData);

        return redirect('/vehicules')->with('success', 'Immatriculation mise à jour avec succèss');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //var_dump("expression"); exit();
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();

        return redirect('/vehicules')->with('success', 'Immatriculation supprimée avec succèss');
    }
}
