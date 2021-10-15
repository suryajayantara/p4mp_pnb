<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use App\Models\Certification;
use App\Models\Departement;
use App\Models\Level;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;

        $certification = Certification::when($request->cari, function ($query) use ($request) {
            $query->where('id_level', 'LIKE', '%' . $request->cari . '%');
        })->orderBy('id', 'desc')->paginate($pagination);


        $certification->appends($request->only('cari'));

        return view('dashboard.certification.index', compact('certification'))
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
        $results = Accreditation::all();
        return view('dashboard.certification.add', compact('departements', 'levels', 'results'));
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
            'id_study' => 'required|unique:certifications,id_study',
            'id_level' => 'required',
            'id_result' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ], [
            'id_study.unique' => "Data Sudah Ada !"
        ]);
        try {
            Certification::create([
                'id_study' => $request->id_study,
                'id_level' => $request->id_level,
                'id_result' => $request->id_result,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            return redirect()->route('certifications.index');
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
        $result_data = Accreditation::all();
        $certification_data = Certification::find($id);
        return view('dashboard.certification.edit')->with(compact('id', 'departement_data', 'level_data', 'accreditation_data', 'certification_data',));
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
            Certification::find($id)->update([
                'id_study' => $request->id_study,
                'id_level' => $request->id_level,
                'id_result' => $request->id_result,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            return redirect()->route('certifications.index');
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
            Certification::find($id)->delete();
            return redirect()->route('certifications.index');
        } catch (\Throwable $th) {
            echo 'gagal';
        }
    }
}
