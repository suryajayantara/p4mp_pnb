<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\Departement;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Certification::join('departements','certifications.id_study','=','departements.id')->select  ('certifications.*','departements.departement_name')->get();
        return view('dashboard.certification.index')->with(compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Departement::all();
        return view('dashboard.certification.add', compact('data'));
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
            Certification::create([
                'id_study' => $request->id_study,
                'level' => $request->level,
                'result' => $request->result,
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
        $certification_data = Certification::find($id);
        return view('dashboard.certification.edit')->with(compact('id','departement_data','certification_data',));
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
            Certification::find($id)->update([
                'id_study' => $request->id_study,
                'level' => $request->level,
                'result' => $request->result,
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
