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
    public function index(Request $request)
    {
        $pagination=5;
        $datas =Departement::when($request->cari, function($query) use ($request){
            $query->where('departement_name','LIKE','%'.$request->cari.'%');
        })->orderBy('id','desc')->paginate($pagination);


        $datas->appends($request->only('cari'));

        return view('dashboard.departement.index', compact('datas'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);

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
        $request->validate([
            'id_faculty' => 'required|unique:departements,id_faculty',
            'departement_name' => 'required|unique:departements,departement_name,id'
        ], [
            'id_faculty.unique' => "Data Sudah Ada !",
            'departement_name.unique' => "Data Sudah Ada !"
        ]);

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
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty_data = Faculty::all();
        $departement_data = Departement::find($id);
        return view('dashboard.departement.edit')->with(compact('id','faculty_data','departement_data',));

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
            'id_faculty' => 'required',
            'departement_name' => 'required'
        ]);

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
