<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Departement;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('client_index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();

        return view('client_create', compact('departements'));
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
        $validatedData['users_id'] = 8;
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
        $client = Client::findOrFail($id);
        $departements = Departement::all();

        return view('client_edit', compact('client', 'departements'));
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
