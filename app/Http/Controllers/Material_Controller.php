<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materials;

class Material_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('materials.material');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
         'hsncode' => 'required|unique:materials,hsn_code',
        ]);

        $materials  = new Materials();

        $materials->material_name =$request->input('productname');
        $materials->hsn_code =$request->input('hsncode');
        $materials->cgst =$request->input('cgst');
        $materials->sgst =$request->input('sgst');
        $materials->unit =$request->input('unit');

        $materials->save();

        return redirect()->back()->with('message', 'New Material added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $materials = Materials::all();

        return view('materials.allmaterial')->with('materials',$materials);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
      $material = Materials::find($id);

      return view('materials.material_edit')->with('material',$material);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
         'hsncode' => 'required|unique:materials,hsn_code,'.$id,
        ]);

        $materials  = Materials::find($id);

        $materials->material_name =$request->input('productname');
        $materials->hsn_code =$request->input('hsncode');
        $materials->cgst =$request->input('cgst');
        $materials->sgst =$request->input('sgst');
        $materials->unit =$request->input('unit');

        $materials->save();

        return redirect('/all-material')->with('message', 'Material Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Materials::find($id);

        $material->delete();

        return redirect('/all-material')->with('message', 'Material Deleted!');

    }
    public function getmaterial($id){
        
        $material = Materials::find($id);

        return response()->json($material);
    }
}
