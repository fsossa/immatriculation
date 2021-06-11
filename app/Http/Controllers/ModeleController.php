<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modele;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeles = Modele::all();

        return view('modele_index', compact('modeles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modele_create');
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
            'marque' => 'required|max:255',
            'model' => 'required|max:255',
        ]);
        //var_dump($validatedData); exit();

        $modele = Modele::create($validatedData);

        return redirect('/modeles')->with('success', 'Modele créer avec succèss');
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
        $modele = Modele::findOrFail($id);

        return view('modele_edit', compact('modele'));
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
            'marque' => 'required|max:255',
            'model' => 'required|max:255',
        ]);

        Modele::whereId($id)->update($validatedData);

        return redirect('/modeles')->with('success', 'Modele mise à jour avec succèss');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modele = Modele::findOrFail($id);
        $modele->delete();

        return redirect('/modeles')->with('success', 'Modele supprimer avec succèss');
    }
}
