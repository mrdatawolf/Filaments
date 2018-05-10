<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrinterController extends Controller
{
    /**
     * Show the index for printers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $printers=Printer::all();
        return view('index',compact('passports'));
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
        return redirect('printers')->with('success', 'Information has been added');
    }
}
