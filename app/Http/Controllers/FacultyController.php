<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $faculties = Faculty::when($request->cari, function($query) use ($request){
            $query->where('faculty_name','LIKE','%'.$request->cari.'%');
        })->orderBy('id','desc')->paginate($pagination);

        $faculties->appends($request->only('cari'));

        return view('dashboard.faculty.index', compact('faculties'))->with('i', ($request->input('page', 1) - 1) * $pagination);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.faculty.add');
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
            'faculty_name' => 'required|unique:faculties,faculty_name,id',
            'desc' => 'required'
        ],[
            'faculty_name.unique' => "Data Sudah Ada !"
        ]);

        try {
            Faculty::create([
                'faculty_name' => $request->faculty_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('faculties.index');

        } catch (\Throwable $th) {
            return $th;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        return view('dashboard.faculty.edit')->with(compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'faculty_name' => 'required',
            'desc' => 'required'
        ]);

        try {
            $faculty->update([
                'faculty_name' => $request->faculty_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('faculties.index');
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        try {
            $faculty->delete();
            return redirect()->route('faculties.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }

    }
}
