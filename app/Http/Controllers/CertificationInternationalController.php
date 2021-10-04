<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CertificationInternational;
use App\Models\Departement;
use App\Models\Faculty;
use Illuminate\Http\Request;


class CertificationInternationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $internationals = CertificationInternational::when($request->cari, function($query) use ($request){
            $query->where('level','LIKE',"%{$request->cari}%")
            ->orWhere('country','LIKE',"%{$request->cari}%")
            ->orWhere('result','LIKE',"%{$request->cari}%");
        })->orderBy('id','desc')->paginate($pagination);

        $internationals->appends($request->only('cari'));

        return view('dashboard.international.index',compact('internationals'))
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
        return view('dashboard.international.add',compact('departement_data','faculty_data'));
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
            'id_faculties' => 'required',
            'id_study' => 'required',
            'level' => 'required',
            'result' => 'required',
            'country' => 'required',
            's_assessment' => 'required',
            'e_assessment' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        try {
            CertificationInternational::create([
                'id_faculties' => $request->id_faculties,
                'id_study' => $request->id_study,
                'level' => $request->level,
                'result' => $request->result,
                'country' => $request->country,
                's_assessment' => $request->s_assessment,
                'e_assessment' => $request->e_assessment,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            return redirect()->route('internationals.index');

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
        $certificationInternational = CertificationInternational::find($id);
        $departement_data = Departement::all();
        $faculty_data = Faculty::all();
        return view('dashboard.international.edit',compact('id','certificationInternational','departement_data','faculty_data'));
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
            'level' => 'required',
            'result' => 'required',
            'country' => 'required',
            's_assessment' => 'required',
            'e_assessment' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        try {
            CertificationInternational::find($id)->update([
                'id_faculties' => $request->id_faculties,
                'id_study' => $request->id_study,
                'level' => $request->level,
                'result' => $request->result,
                'country' => $request->country,
                's_assessment' => $request->s_assessment,
                'e_assessment' => $request->e_assessment,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);

            return redirect()->route('internationals.index');

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
            CertificationInternational::find($id)->delete();
            return redirect()->route('internationals.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }

    }
}
