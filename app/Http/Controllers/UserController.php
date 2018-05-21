<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Show the index for types.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        if($users->isEmpty())
        {
            return $this->create();
        }
        else
        {
            $users = User::paginate(10);
            
            return view('users.index',compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the specified users.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.index',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user->update($request->all());
        return redirect()->route('users/index')->with('success','the user was updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')
                        ->with('success','User record was destoryed');
    }

    public function printers(Request $request, User $user)
    {
        //$user = User::find($id);
        dd($user->printers);
        //Auth::user()->id
    }

    public function filaments(Request $request, User $user)
    {
        //$user = User::find($id);
        dd($user->filaments);
        //Auth::user()->id
    }
}
