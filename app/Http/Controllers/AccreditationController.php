<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use App\Models\Departement;
use App\Models\Level;
use App\Models\Result;
use Illuminate\Http\Request;

class AccreditationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;

        $accreditations = Accreditation::when($request->cari, function ($query) use ($request) {
            $query->where('id_level', 'LIKE', '%' . $request->cari . '%');
        })->orderBy('id', 'desc')->paginate($pagination);


        $accreditations->appends($request->only('cari'));

        return view('dashboard.accreditation.index', compact('accreditations'))
            ->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        $levels = Level::all();
        $results = Result::all();
        return view('dashboard.accreditation.add', compact('departements', 'levels', 'results'));
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
            'id_study' => 'required|unique:accreditations,id_study',
            'id_level' => 'required',
            'id_result' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ], [
            'id_study.unique' => "Data Sudah Ada !"
        ]);
        try {
            Accreditation::create([
                'id_study' => $request->id_study,
                'id_level' => $request->id_level,
                'id_result' => $request->id_result,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            return redirect()->route('accreditations.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departement_data = Departement::all();
        $level_data = Level::all();
        $result_data = Result::all();
        $accreditation_data = Accreditation::find($id);
        return view('dashboard.accreditation.edit')->with(compact('id', 'departement_data', 'level_data', 'accreditation_data', 'result_data',));
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
            'id_study' => 'required',
            'id_level' => 'required',
            'id_result' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        try {
            Accreditation::find($id)->update([
                'id_study' => $request->id_study,
                'id_level' => $request->id_level,
                'id_result' => $request->id_result,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            return redirect()->route('accreditations.index');
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
            Accreditation::find($id)->delete();
            return redirect()->route('accreditations.index');
        } catch (\Throwable $th) {
            echo 'gagal';
        }
    }
}
