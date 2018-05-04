<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function filaments() 
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
                        'head' => 205 
                    ], 
                    'user' => [ 
                        'bed' => 50, 
                        'head' => 205 
                    ], 
                    'brand' => [ 
                        'bed' => 50, 
                        'head' => 205 
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
                        'head' => 210 
                    ], 
                    'user' => [ 
                        'bed' => 45, 
                        'head' => 205 
                    ], 
                    'brand' => [ 
                        'bed' => 50, 
                        'head' => 200 
                    ] 
                ], 
                'moreInformation' => [ 
                    'videos' => ['youtube' => ['http://youtube.com/aCoolVideo2']], 
                    'other' => ['reddit' => ['http://reddit.com/someSubReditInfo2']] 
                ] 
            ] 
        ]; 
         
        return view('filaments',['filaments' => $filaments]); 
    } 

    public function myPrinters()
    {
        $printers = [
            [
                'thumb'   => 'img/mps3v2.jpg',
                'brand'   => 'Monoprice',
                'model'   => 'Select Mini 3D Printer',
                'version' => '2',
                'other' => [
                    'notes' => 'stuff...'
                ]
            ]
        ];
        return view('printers',['printers' => $printers]); 
    }

    public function filamentAdd()
    {
        return view('filament.create');
    }

    public function filamentChange()
    {
        return view('filament.update');
    }

    public function filamentCreate()
    {
        return view('filaments')->sucess('filament created!(pretend)');
    }

    public function filamentRead()
    {
        return view('filaments')->sucess('filament read!(pretend)');
    }

    public function filamentUpdate()
    {
        return view('filaments')->sucess('filament updated!(pretend)');
    }
}
