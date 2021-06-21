<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\Client;
use App\Models\Modele;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

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
        $vehicules = Vehicule::all();

        return view('vehicule_index', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $modeles = Modele::all();
        $statuses = Status::all();
        return view('vehicule_create', compact('clients', 'modeles', 'statuses'));
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
        $vehicule = Vehicule::findOrFail($id);
        $clients = Client::all();
        $modeles = Modele::all();
        $statuses = Status::all();

        return view('vehicule_edit', compact('vehicule', 'clients', 'modeles', 'statuses'));
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
