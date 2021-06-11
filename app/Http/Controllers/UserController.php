<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        return view('user_create');
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
            'noms' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8|max:8',
        ]);
        $validatedData['password'] = password_hash(123456, PASSWORD_DEFAULT) ; 
        $validatedData['departements_id'] = random_int(1, 12);
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

        return view('user_edit', compact('user'));
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
            'noms' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8|max:8',
        ]);

        user::whereId($id)->update($validatedData);

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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'Agent supprimer avec succèss');
    }
}
