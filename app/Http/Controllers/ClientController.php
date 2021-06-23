<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Departement;
use Illuminate\Support\Facades\Auth;
use DB;

class ClientController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:client-list|client-create|client-edit|client-delete', ['only' => ['index','show']]);
        $this->middleware('permission:client-create', ['only' => ['create','store']]);
        $this->middleware('permission:client-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:client-delete', ['only' => ['destroy']]);

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active['accueil'] = '';
        $active['vehicule'] = '';
        $active['client'] = 'active';
        $active['modele'] = '';
        $active['user'] = '';
        $active['role'] = '';

        $actives = $active;
        $clients = Client::all();
        $departements = Departement::all();

        return view('client_index', compact('clients', 'departements', 'actives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active['accueil'] = '';
        $active['vehicule'] = '';
        $active['client'] = 'active';
        $active['modele'] = '';
        $active['user'] = '';
        $active['role'] = '';

        $departements = Departement::all();
        $actives = $active;
        return view('client_create', compact('departements', 'actives'));
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
            'prenoms' => 'required|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|max:255',
            'adresse' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8|max:8',
            'num_ci' => 'required|max:255',
            'departements_id' => 'required',
        ]);
        $validatedData['users_id'] = Auth::id();
        //var_dump($validatedData); exit();

        $client = Client::create($validatedData);

        return redirect('/clients')->with('success', 'Client créer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$client = Client::findOrFail($id);
        $active['accueil'] = '';
        $active['vehicule'] = '';
        $active['client'] = 'active';
        $active['modele'] = '';
        $active['user'] = '';
        $active['role'] = '';

        $actives = $active;
        $client = DB::table('clients')
            ->join('departements','clients.departements_id','=','departements.id')
            ->join('users','clients.users_id','=','users.id')
            ->where('clients.id', '=', $id)
            ->select('clients.*', 'departements.nom as departement', 'users.name as creator')
            ->orderBy('clients.id', 'desc')
            ->limit(5)
            ->first();
        //dd($client); exit();

        $client_vehicules = DB::table('vehicules')
            ->join('modeles','modeles.id','=','vehicules.modeles_id')
            ->join('statuses','statuses.id','=','vehicules.statuses_id')
            ->where('vehicules.clients_id', '=', $id)
            ->select('vehicules.*', 'modeles.marque', 'modeles.model', 'statuses.titre')
            ->orderBy('vehicules.id', 'desc')
            ->get();

        return view('client_show', compact('client', 'client_vehicules', 'actives'));
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
        $active['vehicule'] = '';
        $active['client'] = 'active';
        $active['modele'] = '';
        $active['user'] = '';
        $active['role'] = '';

        $actives = $active;
        $client = Client::findOrFail($id);
        $departements = Departement::all();

        return view('client_edit', compact('client', 'departements', 'actives'));
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
            'prenoms' => 'required|max:255',
            'date_naissance' => 'required|date',
            'lieu_naissance' => 'required|max:255',
            'adresse' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8|max:8',
            'num_ci' => 'required|max:255',
            'departements_id' => 'required',
        ]);
        $validatedData['users_id'] = Auth::id(); 

        Client::whereId($id)->update($validatedData);

        return redirect('/clients')->with('success', 'Client mise à jour avec succèss');

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
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect('/clients')->with('success', 'Client supprimer avec succèss');
    }
}
