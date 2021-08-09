<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $datass = Departement::all();
        return view('dashboard.departement.index')->with(compact('datass'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dats = Faculty::all();
        return view('dashboard.departement.add', compact('dats')); 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        
        try {
            
            Departement::create([
                'id_faculty' => $request->id_faculty,
                'departement_name' => $request->departement_name,
            ]);
            return redirect()->route('departements.index');

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dats = Faculty::pluck('faculty_name','id');
        $selectedID= Departement::find('id_faculty');
        $data = Departement::find($id);
        return view('dashboard.departement.edit')->with(compact('id','dats','data','selectedID'));
       
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
        try {
            
            Departement::find($id)->update([
                'id_faculty' => $request->id_faculty,
                'departement_name' => $request->departement_name,
            ]);
            return redirect()->route('departements.index');

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Departement::find($id)->delete();
            return redirect()->route('departements.index');
        } catch (\Throwable $th) {
            echo 'gagal';
        }
    }
}
