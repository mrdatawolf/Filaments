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
                'name'  => '3D Printer Filament, Frosted Bronze 1.75mm PLA Filament +/- 0.03 mm, 0.5 LBS Spool, includes Sample Marble Filament - 100% USA',
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
                'name'  => 'HATCHBOX PLA 3D Printer Filament, Dimensional Accuracy +/- 0.03 mm, 1 kg Spool, 1.75 mm, Yellow',
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
}
