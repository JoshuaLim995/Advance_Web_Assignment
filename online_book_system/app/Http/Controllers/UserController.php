<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', User::class);
        return view('users.index');
    }

    public function apiIndex()
    {
        $users = User::orderBy('name', 'asc')->get();

        return $users;
    }

    public function create()
    {
        $user = new User();

        return view('users.create', [
            'user' => $user,
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|max:191',
            'email' => [
            'required', 
            'unique:users',
            'max:191',
            ],
            'password' => 'required|min:6',
            'role' => 'required',
            ]);

        $user = new User();
        $user->fill($request->all());
        $user->save();

        $user->assign($request->role);

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        if(!$user) throw new ModelNotFoundException;

        return view('users.show', [
            'user' => $user,
            ]);
    }

    public function apiShow($id)
    {
        $user = User::find($id);
        if(!$user) throw new ModelNotFoundException;

        if($user) {
            return $user;
        }
        else {
            return response()->json(null);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        if(!$user) throw new ModelNotFoundException;

        $this->authorize('manage', $book);
        
        return view('users.edit', [
            'user' => $user
            ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user) throw new ModelNotFoundException;

        $request->validate([
            'name' =>'required|max:191',
            'email' => [
            'required', 
            'max:191',
            ],
            'role' => 'required',
            ]);

        $user->fill($request->all());
        $user->save();

        $user->retract(['admin']);
        $user->retract(['member']);

        $user->assign($request->role);
        
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user) throw new ModelNotFoundException;
        $this->authorize('manage', $book);
        $user->delete();

        return redirect()->route('user.index');
    }
}