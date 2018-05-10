<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilamentController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function read()
    {
        return view('read');
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
    public function destroy()
    {
        return view('delete');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('filaments')->with('success', 'Information has been added');
    }
}
