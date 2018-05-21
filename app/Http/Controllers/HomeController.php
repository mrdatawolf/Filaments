<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filament;
use App\Brand;
use App\Http\Controllers\FilamentController;

class HomeController extends Controller
{
    protected $headerGroups = [
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
     * Show the index for filaments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filaments=Filament::all();
        if($filaments->isEmpty())
        {
            return redirect()->action('FilamentController@create')->withErrors('No filaments were found!  Please create a filament.');
        }

        $filaments=Filament::with('brand','type')->paginate(10);
    
        return view('home',compact('filaments'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
