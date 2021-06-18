<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $users = DB::table('users')
            ->join('departements','users.departements_id','=','departements.id')
            ->join('roles','users.roles','=','roles.id')
            ->select('users.*', 'departements.nom as departement', 'roles.name as role')
            ->get();
        //$users = User::all();
        //dd($users); exit();
        //$users = User::orderBy('id','ASC')->paginate(5);
        return view('user_index', compact('users')) ;//->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        $roles = Role::pluck('name','name')->all();
        return view('user_create', compact('departements', 'roles'));
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
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|min:8|max:8',
            'departements_id' => 'required|',
            'password' => 'required|min:6',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['roles'] = DB::table('roles')->where('roles.name', '=', $input['roles'])->select('roles.id')->first()->id;
        $input['password'] = Hash::make($input['password']);
        //dd($input); exit();
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

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
        $user = User::find($id);
        return view('user_show', compact('user'));
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
        $roles = Role::pluck('name','name')->all();
        //$userRole = $user->roles->pluck('name','name')->all();

        return view('user_edit', compact('user', 'departements', 'roles'));
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
            'roles' => 'required|',
        ]);
        $validatedData['roles'] = DB::table('roles')->where('roles.name', '=', $validatedData['roles'])->select('roles.id')->first()->id;
        $user = User::find($id);
        $user->update($validatedData);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        return redirect('/users')->with('success', 'Utilisateur mise à jour avec succèss');

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
