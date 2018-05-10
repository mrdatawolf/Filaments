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

    public function gatherPrintersHeaders()
    {
    }

    public function gatherPrinters()
    {
        return [
            'thumb'   => 'img/mps3v2.jpg',
            'brand'   => 'Monoprice',
            'model'   => 'Select Mini 3D Printer',
            'version' => '2',
            'other' => [
                'notes' => 'stuff...'
            ]
        ];
    }

    //filament CRUD
    //Create
    public function filamentAdd()
    {
        $headers = $this->gatherFilamentHeaders();
        
        if(count($headers) > 1)
        {
            $headers = end($headers);
        }
        
        return view('filament.create',['headers' => $headers]);
    }

    public function filamentCreate()
    {
        ddng('do create');
        return view('filaments')->sucess('filament created!(pretend)');
    }

    //Read
    public function gatherFilamentHeaders()
    {
        $headers = [
            [
                ['text' => 'Filament Info',
                'span' => 5],
                ['text' => 'Movement',
                'span' => 2],
                ['text' => 'Temp',
                'span' => 2],
                ['text' => 'Other Info',
                'span' => 1],
            ],
            [
                ['text' => 'Image',
                'span' => 1],
                ['text' => 'Brand',
                'span' => 1],
                ['text' => 'width (in mm)',
                'span' => 1],
                ['text' => 'type',
                'span' => 1],
                ['text' => 'Name',
                'span' => 1],
                ['text' => 'Retraction (in mm)',
                'span' => 1],
                ['text' => 'Speed (in mm)',
                'span' => 1],
                ['text' => 'Print head Temps',
                'span' => 1],
                ['text' => 'Bed Temps',
                'span' => 1],
                ['text' => 'More Info',
                'span' => 1],
            ]
        ];

        return $headers;
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

    public function filaments() 
    { 
        $filaments['headers'] = $this->gatherFilamentHeaders();
        $filaments['data'] = $this->gatherFilaments();
         
        return view('filaments',['filaments' => $filaments]); 
    } 

    public function myFilaments()
    {
        $filaments['headers'] = $this->gatherFilamentHeaders();
        $filaments['data'] = $this->gatherFilaments();

        return $filaments;
    }

    public function filamentRead()
    {
        return view('filaments')->sucess('filament read!(pretend)');
    }

    //Update
    public function filamentChange()
    {
        $headers = $this->gatherFilamentHeaders();
        
        if(count($headers) > 1)
        {
            $headers = end($headers);
        }
        
        return view('filament.update',['headers' => $headers]);
    }

    public function filamentUpdate()
    {
        ddng('do update');
        return view('filaments')->sucess('filament updated!(pretend)');
    }

    //Destroy

    //printer CRUD

    public function myPrinters()
    {
        $printers['headers'] = $this->gatherPrinterHeaders();
        $printers['data'] = $this->gatherPrinters();
        return view('printers',['printers' => $printers]); 
    }
}
