<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $documents = Document::when($request->cari, function($query) use ($request){
            $query->where('title','LIKE','%'.$request->cari.'%');
        })->orderBy('id','desc')->paginate($pagination);

        $documents->appends($request->only('cari'));

        return view('dashboard.document.index',compact('documents'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.document.add');
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
            'url_file' => 'required|mimes:pdf,xlsx|max:5000',
            'title' => 'required',
            'desc' => 'required'
        ]);
        $filename = date('d_m_Y-H_i_s').'.'.$request->file('url_file')->getClientOriginalName();
        try {
            Document::create([
                'url_file' => $filename,
                'title' => $request->title,
                'desc' => $request->desc
            ]);
            $request->file('url_file')->move(public_path('document_post'),$filename);
            return redirect()->route('documents.index');

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return view('dashboard.document.edit')->with(compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'url_file' => 'mimes:pdf,xlsx|max:5000',
            'title' => 'required',
            'desc' => 'required'
        ]);



        if($request->file('url_file') == ""){
            try {
                $document->update([
                    'url_file' => $document->url_file,
                    'title' =>$request->title,
                    'desc' => $request->desc,
                ]);
                return redirect()->route('documents.index');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        else{
            $filename = date('d_m_Y-H_i_s').'.'.$request->file('url_file')->getClientOriginalName();
                try {
                    $document->update([
                        'url_file' => $filename,
                        'title' => $request->title,
                        'desc' => $request->desc
                    ]);
                    $request->file('url_file')->move(public_path('document_post'),$filename);
                    return redirect()->route('documents.index');

                } catch (\Throwable $th) {
                    return $th;
                }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        try {
            $document->delete();
            return redirect()->route('documents.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }
    }
}
