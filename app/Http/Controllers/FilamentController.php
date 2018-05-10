<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilamentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Show the index for filaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        return view('update');
    }
    
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('filaments')->with('success', 'Record was destoryed(pretend)');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('filaments')->with('success', 'Information has been added(pretend)');
    }
}
