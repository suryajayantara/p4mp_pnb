<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $levels = Level::when($request->cari, function($query) use ($request){
            $query->where('level_name','LIKE','%'.$request->cari.'%');
        })->orderBy('id','desc')->paginate($pagination);

        $levels->appends($request->only('cari'));

        return view('dashboard.level.index', compact('levels'))->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.level.add');
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
            'level_name' => 'required|unique:levels,level_name,id',
            'desc' => 'required'
        ],[
            'level_name.unique' => "Data Sudah Ada !"
        ]);

        try {
            Level::create([
                'level_name' => $request->level_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('levels.index')->with('success', 'Data Berhasil Ditambah');

        } catch (\Throwable $th) {
            return $th;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('dashboard.level.edit')->with(compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'level_name' => 'required',
            'desc' => 'required'
        ]);

        try {
            $level->update([
                'level_name' => $request->level_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('levels.index')->with('success', 'Data Berhasil Diubah');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        try {
            $level->delete();
            return redirect()->route('levels.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }
    }
}
