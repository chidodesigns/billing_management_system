<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(Gate::allows('is-admin')){
        return view('admin.users.index', [
            'users' => User::paginate(10)
        ]);
      }

      $request->session()->flash('error', 'You do not have access to this page');
      return redirect(('/'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.users.create', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // $validatedData = $request->validated();

        // $user = User::create($validatedData);

        //  Laravel Fortify Actions
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));

        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'You have created the user');

        Log::info('A New User Was Created: '. $user->id);

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user =  User::find($id);

        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', [
            'roles' => Role::all(),
            'user' => $user
        ]);   
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
        $user = User::find($id);

        if(!$user){
            $request->session()->flash('error', 'You cannot edit this user');
            return redirect(route('admin.users.index'));
        }

        $user->update($request->except([
            'token',
            'roles'
        ]));

        $user->roles()->sync($request->roles);

        Log::info('A User Was Edited: #ID'. $user->id);

        $request->session()->flash('success', 'You have edited the user');

        return redirect(("admin/users/{$user->id}"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $user = User::find($id);

        User::destroy($id);

        Log::info('A New User Was Deleted: ID#'. $user->id);

        $request->session()->flash('success', 'You have deleted the user');

        return redirect(route('admin.users.index'));
    }
}
