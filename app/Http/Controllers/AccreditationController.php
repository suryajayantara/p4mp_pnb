<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use App\Http\Controllers\Controller;
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
        $accreditations = Accreditation::when($request->cari, function($query) use ($request){
            $query->where('accreditation_name','LIKE','%'.$request->cari.'%');
        })->orderBy('id','desc')->paginate($pagination);

        $accreditations->appends($request->only('cari'));

        return view('dashboard.accreditation.index', compact('accreditations'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.accreditation.add');
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
            'accreditation_name' => 'required|unique:accreditations,accreditation_name,id',
            'desc' => 'required'
        ],[
            'accreditation_name.unique' => "Data Sudah Ada !"
        ]);

        try {
            Accreditation::create([
                'accreditation_name' => $request->accreditation_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('accreditations.index');

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function show(Accreditation $accreditation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function edit(Accreditation $accreditation)
    {
        return view('dashboard.accreditation.edit')->with(compact('accreditation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accreditation $accreditation)
    {
        $request->validate([
            'accreditation_name' => 'required',
            'desc' => 'required'
        ]);

        try {
            $accreditation->update([
                'accreditation_name' => $request->accreditation_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('accreditations.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accreditation  $accreditation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accreditation $accreditation)
    {
        try {
            $accreditation->delete();
            return redirect()->route('accreditations.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }
    }
}
