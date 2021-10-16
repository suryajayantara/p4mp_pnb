<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $results = Result::when($request->cari, function($query) use ($request){
            $query->where('accreditation_name','LIKE','%'.$request->cari.'%');
        })->orderBy('id','desc')->paginate($pagination);

        $results->appends($request->only('cari'));

        return view('dashboard.result.index', compact('results'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.result.add');
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
            'accreditation_name' => 'required|unique:results,accreditation_name,id',
            'desc' => 'required'
        ],[
            'accreditation_name.unique' => "Data Sudah Ada !"
        ]);

        try {
            Result::create([
                'accreditation_name' => $request->accreditation_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('results.index');

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Result $result)
    {
        return view('dashboard.result.edit')->with(compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        $request->validate([
            'accreditation_name' => 'required',
            'desc' => 'required'
        ]);

        try {
            $result->update([
                'accreditation_name' => $request->accreditation_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('results.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        try {
            $result->delete();
            return redirect()->route('results.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }
    }
}
