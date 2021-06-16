<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departement;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user_index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();

        return view('user_create', compact('departements'));
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8|max:8',
            'departements_id' => 'required|',
            'password' => 'required|min:6',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password'] ) ; 
        //$validatedData['departements_id'] = random_int(1, 12);
        $validatedData['roles_id'] = 2;
        //var_dump($validatedData); exit();

        $user = User::create($validatedData);

        return redirect('/users')->with('success', 'Agent créer avec succèss');
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
        $user = User::findOrFail($id);
        $departements = Departement::all();

        return view('user_edit', compact('user', 'departements'));
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
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8|max:8',
            'departements_id' => 'required|',
        ]);

        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'Agent mise à jour avec succèss');

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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'Agent supprimer avec succèss');
    }
}
