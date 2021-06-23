<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Departement;
use Hash;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active['accueil'] = '';
        $active['vehicule'] = '';
        $active['client'] = '';
        $active['modele'] = '';
        $active['user'] = 'active';
        $active['role'] = '';

        $actives = $active;
        $users = User::all();
        $departements = Departement::all();
        return view('user.index', compact('users', 'departements', 'actives'));
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
        $active['client'] = '';
        $active['modele'] = '';
        $active['user'] = 'active';
        $active['role'] = '';

        $actives = $active;
        $departements = Departement::all();
        $roles = Role::pluck('name','name')->all();
        return view('user.create', compact('departements', 'roles', 'actives'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:8|max:8',
            'departements_id' => 'required|',
            'password' => 'required|min:6',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        /**$validatedData = $request->validate([
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

        $user = User::create($validatedData);**/

        return redirect('/users')->with('success', 'Utilisateur ajouté avec succèss');
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
        $active['vehicule'] = '';
        $active['client'] = '';
        $active['modele'] = '';
        $active['user'] = 'active';
        $active['role'] = '';

        $actives = $active;
        $user = User::find($id);
        return view('users.show',compact('user', 'actives'));
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
        $active['client'] = '';
        $active['modele'] = '';
        $active['user'] = 'active';
        $active['role'] = '';

        $actives = $active;
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $departements = Departement::all();

        return view('user.edit', compact('user', 'departements', 'roles', 'userRole', 'actives'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'phone' => 'required|min:8|max:8',
            'departements_id' => 'required|',
            'roles' => 'required'
        ]);
    
        $input = $request->all();

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        /*$validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8|max:8',
            'departements_id' => 'required|',
        ]);

        User::whereId($id)->update($validatedData);*/

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
        User::find($id)->delete();

        return redirect('/users')->with('success', 'Agent supprimer avec succèss');
    }
}
