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
           return redirect()->action('BrandController@create')->withErrors('No brands were found!  Please create a brand.');
        }

        $types=Types::all();
        if($types->isEmpty())
        {
           return redirect()->action('TypeController@create')->withErrors('No types were found!  Please create a type.');
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
        $requestValues = $request->all();
        request()->validate([
            'name' => 'required',
            'width' => 'required',
            'revision' => 'required'
        ]);
        $checkFor=[
            'name' => (string) trim($requestValues['name']),
            'width' => (double) trim($requestValues['width']),
            'revision' => (string) trim($requestValues['revision'])
        ];
       // dd(Filaments::where('name','like',$requestValues['name'])->where('revision',$requestValues['revision'])->toSql());
        if( Filaments::where('name','like',$requestValues['name'])->where('revision',$requestValues['revision'])->exists())
        {
            return redirect()->action('FilamentController@index')->withErrors("The filament already exists!");
        }
        else
        {
            $filament = new Filaments();
            $filament->name=$requestValues['name'];
            $filament->width=$requestValues['width'];
            $filament->revision=$requestValues['revision'];
            $filament->save();
            $filament->brand()->attach($requestValues['brand_id']);
            $filament->type()->attach($requestValues['type_id']);
            return redirect()->action('FilamentController@index')->withSuccess("The filament was created successfully!");
        }
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

            return view('filaments/index',compact('filaments'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        return redirect()->route('filaments/index')->with('success','the filament updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Filaments::destroy($id);
        return redirect()->route('filaments/index')->with('success','The filament record was destoryed!');
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
