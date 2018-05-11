<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Types;

class TypeController extends Controller
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
        return view('types.create');
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
            'slug' => 'required',
        ]);
        Types::create($request->all());
        return redirect()->route('types.index')
                        ->with('success','Type created successfully');
    }
    
    /**
     * Show the index for types.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Types::all();
        if($types->isEmpty())
        {
            return $this->create();
        }
        else
        {
            $types = Types::paginate(10);
            
            return view('types.index',compact('types'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the specified type.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Types $type)
    {
        return view('types.index',compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Types $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Types $type)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $type->update($request->all());
        return redirect()->route('types.index')
                        ->with('success','Type updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Types::destroy($id);
        return redirect()->route('types.index')
                        ->with('success','Type record was destoryed');
    }
}
