<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printers;
use App\Brands;
use App\Types;

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
        $brands=Brands::all();
        if($brands->isEmpty())
        {
           return redirect()->action('BrandController@create')->withErrors('No brands were found!  Please create a brand.');
        }

        $types=Types::all();
        if($types->isEmpty())
        {
           return redirect()->action('TypeController@create')->withErrors('No types were found!  Please create a type.');
        }
        
        return view('printers/create',compact('brands','types'));
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
        $requestValues = $request->all();

        $checkFor=[
            'name' => (string) trim($requestValues['name']),
            'version' => trim($requestValues['version'])
        ];

        if( Printers::where('name','like',$checkFor['name'])->where('version',$checkFor['version'])->exists())
        {
            return redirect()->action('PrinterController@index')->withErrors("The printer already exists!");
        }
        else
        {
            $printer = new Printers();
            $printer->name = $checkFor['name'];
            $printer->version = $checkFor['version'];
            $printer->save();

            $printer->brand()->attach($checkFor['brand_id']);
            foreach($checkFor['type_ids'] as $typeId)
            {
                $printer->types()->attach($typeId);
            }
            
            return redirect()->route('printers.index')
                            ->with('success','Printer created successfully');
        }
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
            $printers = Printers::with('brand')->paginate(10);
            foreach($printers as $printer)
            {

                //dd($printer->toArray());
            }

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
        return view('printers.update', compact('printer'));
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
            'brand' => 'required',
            'name' => 'required',
            'version' => 'required',
        ]);
        dd($request->get('type_ids'));
        //$news = implode(',', $news);
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
