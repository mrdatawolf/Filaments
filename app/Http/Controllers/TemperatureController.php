<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temperature;
use App\Printer;
use App\Filament;

class TemperatureController extends Controller
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
        $printers=Printer::all();
        if($printers->isEmpty())
        {
           return redirect()->action('PrinterController@create')->withErrors('No printers were found!  Please create a printer.');
        }

        $filaments=Filament::all();
        if($filaments->isEmpty())
        {
           return redirect()->action('FilamentController@create')->withErrors('No filaments were found!  Please create a filament.');
        }
        return view('temperatures.create', compact('printers','filaments'));
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
            'celsius' => 'required',
            'user_id' => 'required',
            'printer_id' => 'required',
            'filament_id' => 'required',
        ]);
    
        Temperature::create($request->all());
        return redirect()->route('temperatures.index')
                        ->with('success','Temperature created successfully');
    }
    
    /**
     * Show the index for brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temperatures=Temperature::all();
        if($temperatures->isEmpty())
        {
            return $this->create();
        }
        else
        {
            $temperatures = Temperature::paginate(10);

            return view('temperatures/index',compact('temperatures'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the specified brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Temperature $temprature)
    {
        return view('temperatures/index',compact('temperature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Temperature $temperature)
    {
        $temperatures=Temprature::all();
        if($temperatures->isEmpty())
        {
            return $this->create();
        }
        else
        {
            $temperatures = Temperature::paginate(10);

            return view('temperatures/update',compact('temperatures'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $temperature = Temperature::find($id);
        $temperature->update($request->all());
    
        return redirect()->route('temperatures.index')->with('success','Temperature updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
        return redirect()->route('temperatures.index')->with('success','Temperature record was destoryed');
    }
}
