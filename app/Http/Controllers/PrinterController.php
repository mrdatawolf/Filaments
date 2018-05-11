<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printers;

class PrinterController extends Controller
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
        return view('printers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'version' => 'required',
        ]);
        Printers::create($request->all());
        return redirect()->route('printers.index')
                        ->with('success','Printer created successfully');
    }
    
    /**
     * Show the index for printers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $printers=Printers::all();
        if($printers->isEmpty())
        {
            return $this->create();
        }
        else
        {
            $printers = $printers->paginate(10);

            return view('printers.index',compact('printers'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the specified printer.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Printers $printer)
    {
        return view('printers.index',compact('printer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Printers $printer)
    {
        return view('printers.edit', compact('printer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Printers $printer)
    {
        request()->validate([
            'name' => 'required',
            'version' => 'required',
        ]);
        $printer->update($request->all());
        return redirect()->route('printers.index')
                        ->with('success','Printer updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Printers::destroy($id);
        return redirect()->route('printers.index')
                        ->with('success','Printer record was destoryed');
    }
}
