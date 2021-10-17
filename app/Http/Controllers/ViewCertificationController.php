<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use App\Models\Result;
use App\Models\AccreditationInternational;
use Illuminate\Http\Request;

class ViewCertificationController extends Controller
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

    public function indexCertification(Request $request)
    {
        $pagination = 1;
        $certifications = Accreditation::orderBy('id','desc')->get();
        $levels = Accreditation::orderBy('id','desc')->get();
        return view('about.certification',compact('certifications','levels'));
    }

    public function indexInternational(Request $request)
    {
        $pagination = 7;
        $certifications = AccreditationInternational::orderBy('id','desc')->paginate($pagination);
        return view('about.international',compact('certifications'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Certification  $certification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
