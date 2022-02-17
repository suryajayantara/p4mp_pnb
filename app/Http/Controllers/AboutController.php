<?php

namespace App\Http\Controllers;

use App\Models\WebContent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function sambutan()
    {
        $webs = WebContent::where('section','sambutan')->get();
        return view('dashboard.about.sambutan.index',compact('webs'));
    }
    public function sejarah()
    {
        $webs = WebContent::where('section','sejarah')->get();
        return view('dashboard.about.sejarah.index',compact('webs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebContent  $webContent
     * @return \Illuminate\Http\Response
     */
    public function show(WebContent $webContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebContent  $webContent
     * @return \Illuminate\Http\Response
     */
    public function edit(WebContent $webContent)
    {
        //
    }

    public function editsambutan($id)
    {
        $web = WebContent::find($id);
        return view('dashboard.about.sambutan.edit',compact('web'));
    }

    public function editvisimisi($id)
    {
        $web = WebContent::find($id);
        return view('dashboard.about.visimisi.edit',compact('web'));
    }

    public function editsejarah($id)
    {
        $web = WebContent::find($id);
        return view('dashboard.about.sejarah.edit',compact('web'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebContent  $webContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebContent $webContent)
    {
        $webs = WebContent::where('section',$request->section)->get();
        foreach ($webs as $web) {
            $section = $web->section;
        }
        
        $request->validate([
            'content' => 'required'
        ]);
            try {
                $webContent->find($request->id)->update([
                    'content' => $request->content
                ]);
                    if($section == 'sejarah'){
                        return redirect('/sejarah');
                    }
                    else if($section == 'visi_misi'){
                        return redirect('/visimisi');
                    }
                    if($section == 'sambutan'){
                        return redirect('/sambutan');
                    }
                
            } catch (\Throwable $th) {
                return $th;
            }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebContent  $webContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebContent $webContent)
    {
        //
    }
}
