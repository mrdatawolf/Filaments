<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brands;

class BrandController extends Controller
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
        return view('brands.create');
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
        Brands::create($request->all());
        return redirect()->route('brands.index')
                        ->with('success','Brand created successfully');
    }
    
    /**
     * Show the index for brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=Brands::all();
        if($brands->isEmpty())
        {
            return $this->create();
        }
        else
        {
            $brands = Brands::paginate(10);

            return view('brands/index',compact('brands'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the specified brand.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Brands $brand)
    {
        return view('brands/index',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brands $brand)
    {
        return view('brands/edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Brands $brand)
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $brand->update($request->all());
        return redirect()->route('brands/index')
                        ->with('success','Brand updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brands::destroy($id);
        return redirect()->route('brands/index')
                        ->with('success','Brand record was destoryed');
    }
}
