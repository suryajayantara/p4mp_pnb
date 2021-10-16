<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AccreditationInternational;
use App\Models\Departement;
use App\Models\Faculty;
use App\Models\Level;
use Illuminate\Http\Request;

class AccreditationInternationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $internationals = AccreditationInternational::when($request->cari, function($query) use ($request){
            $query->where('country','LIKE',"%{$request->cari}%")
            ->orWhere('accreditatition_agency','LIKE',"%{$request->cari}%");
        })->orderBy('id','desc')->paginate($pagination);

        $internationals->appends($request->only('cari'));

        return view('dashboard.accreditationinternational.index',compact('internationals'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departement_data = Departement::all();
        $faculty_data = Faculty::all();
        $level_data = Level::all();
        return view('dashboard.accreditationinternational.add',compact('departement_data','faculty_data','level_data'));
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
            'id_faculties' => 'required|unique:accreditation_internationals,id_faculties',
            'id_study' => 'required|unique:accreditation_internationals,id_study',
            'id_level' => 'required',
            'accreditatition_agency' => 'required',
            'country' => 'required',
            's_assessment' => 'required',
            'e_assessment' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ], [
            'id_faculties.unique' => "Data Sudah Ada !",
            'id_study.unique' => "Data Sudah Ada !"
        ]);

        try {
            AccreditationInternational::create([
                'id_faculties' => $request->id_faculties,
                'id_study' => $request->id_study,
                'id_level' => $request->id_level,
                'accreditatition_agency' => $request->accreditatition_agency,
                'country' => $request->country,
                's_assessment' => $request->s_assessment,
                'e_assessment' => $request->e_assessment,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            return redirect()->route('accreditation_internationals.index');

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
        $accreditationInternational = AccreditationInternational::find($id);
        $departement_data = Departement::all();
        $faculty_data = Faculty::all();
        $level_data = Level::all();
        return view('dashboard.accreditationinternational.edit',compact('id','accreditationInternational','departement_data','faculty_data', 'level_data'));
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
            'id_faculties' => 'required',
            'id_study' => 'required',
            'id_level' => 'required',
            'accreditatition_agency' => 'required',
            'country' => 'required',
            's_assessment' => 'required',
            'e_assessment' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        try {
            AccreditationInternational::find($id)->update([
                'id_faculties' => $request->id_faculties,
                'id_study' => $request->id_study,
                'id_level' => $request->id_level,
                'accreditatition_agency' => $request->accreditatition_agency,
                'country' => $request->country,
                's_assessment' => $request->s_assessment,
                'e_assessment' => $request->e_assessment,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            return redirect()->route('accreditation_internationals.index');

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
            AccreditationInternational::find($id)->delete();
            return redirect()->route('accreditation_internationals.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }
    }
}
