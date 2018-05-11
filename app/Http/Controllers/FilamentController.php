<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filaments;
use App\Brands;
use App\Types;

class FilamentController extends Controller
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
            $brandController = new BrandController();
           return redirect("brands/create")->withErrors('No brands were found.  Please create the filament\'s brand before attempting to add the filament.');
        }

        $types=Types::all();
        if($types->isEmpty())
        {
            $typeController = new TypeController();
           return redirect("types/create")->withErrors('No types were found.  Please create the filament\'s type before attempting to add the filament.');
        }
        
        return view('filaments/create',compact('brands','types'));
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
            'width' => 'required',
            'revision' => 'required'
        ]);
        Filaments::create($request->all());
        return redirect()->route("filaments/index")->withSuccess("Filament created successfully");
    }
    
    /**
     * Show the index for filaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filaments=Filaments::all();
        if($filaments->isEmpty())
        {
           return $this->create();
        }
        else
        {
            $filaments = Filaments::paginate(10);

            return view('filaments',compact('filaments'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the specified filament.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Filaments $filament)
    {
        return view('filaments',compact('filament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Filaments $filament)
    {
        return view('filaments/edit', compact('filament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Filaments $filament)
    {
        request()->validate([
            'name' => 'required',
            'version' => 'required',
        ]);
        $filament->update($request->all());
        return redirect()->route('filaments/index')->with('success','Filament updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filaments::destroy($id);
        return redirect()->route('filaments/index')->with('success','Filament record was destoryed');
    }

    public function gatherFilaments()
    {
        $filaments = [
            [
                'thumb' => '/img/amolen_thumb.jpg', 
                'brand' => 'AMOLEN', 
                'name'  => 'Frosted Bronze 0.5 LBS Spool - 100% USA', 
                'width' => 1.75,
                'tolerance' => '+/- 0.03 mm',
                'type'  => 'PLA',
                'temps' => [ 
                    'averaged' => [ 
                        'bed' => 50, 
                        'head' => 205,
                        'retraction' => 10,
                        'speed' => 40
                    ], 
                    'user' => [ 
                        'bed' => 50, 
                        'head' => 205,
                        'retraction' => 10,
                        'speed' => 40 
                    ], 
                    'brand' => [ 
                        'bed' => 50, 
                        'head' => 205,
                        'retraction' => 10,
                        'speed' => 40
                    ],
                    'fav' => [
                        'bed' => 50, 
                        'head' => 205,
                        'retraction' => 10,
                        'speed' => 40 
                    ]
                ], 
                'moreInformation' => [ 
                    'videos' => ['youtube' => ['http://youtube.com/aCoolVideo']], 
                    'other' => ['reddit' => ['http://reddit.com/someSubReditInfo']], 
                    'siteNotes' => ['links' => ['http://filaments.app/notes']] 
                ] 
            ], 
            [ 
                'thumb' => '/img/hatchbox_thumb.jpg', 
                'brand' => 'HATCHBOX', 
                'name'  => 'Yellow', 
                'width' => 1.75,
                'tolerance' => '+/- 0.03 mm',
                'type'  => 'PLA',
                'temps' => [ 
                    'averaged' => [ 
                        'bed' => 55, 
                        'head' => 210,
                        'retraction' => 10,
                        'speed' => 40
                    ], 
                    'user' => [ 
                        'bed' => 45, 
                        'head' => 205,
                        'retraction' => 10,
                        'speed' => 40
                    ], 
                    'brand' => [ 
                        'bed' => 50, 
                        'head' => 200,
                        'retraction' => 10,
                        'speed' => 40
                    ],
                    'fav' => [
                        'bed' => 50, 
                        'head' => 205,
                        'retraction' => 10,
                        'speed' => 40
                    ]
                ], 
                'moreInformation' => [ 
                    'videos' => ['youtube' => ['http://youtube.com/aCoolVideo2']], 
                    'other' => ['reddit' => ['http://reddit.com/someSubReditInfo2']] 
                ] 
            ]
        ]; 

        return $filaments;
    }
}
