<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Controllers\Controller;
use App\Models\CategoryDocument;
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
        $category_document = CategoryDocument::all();
        return view('dashboard.document.add', compact('category_document'));
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
            'id_category' => 'required',
            'desc' => 'required'
        ],[
            'url_file.mimes' => "Format file yang di dukung (pdf,xlsx)",
            'url_file.max' => "Format file maksimal 5 MB"
        ]);

        $filename = date('d_m_Y-H_i_s').'.'.$request->file('url_file')->getClientOriginalName();
        try {
            Document::create([
                'url_file' => $filename,
                'title' => $request->title,
                'id_category' => $request->id_category,
                'desc' => $request->desc
            ]);
            $request->file('url_file')->move(public_path('document_post'),$filename);
            return redirect()->route('documents.index')->with('success', 'Data Berhasil Ditambah');

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
        $category_document = CategoryDocument::all();
        return view('dashboard.document.edit', compact('document', 'category_document'));
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
            'id_category' => 'required',
            'desc' => 'required'
        ],[
            'url_file.mimes' => "Format file yang di dukung (pdf,xlsx)",
            'url_file.max' => "Format file maksimal 5 MB"
        ]);

        if($request->file('url_file') == ""){
            try {
                $document->update([
                    'url_file' => $document->url_file,
                    'title' =>$request->title,
                    'id_category' =>$request->id_category,
                    'desc' => $request->desc,
                ]);
                return redirect()->route('documents.index')->with('success', 'Data Berhasil Diubah');
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        else{
            $filename = date('d_m_                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          Y-H_i_s').'.'.$request->file('url_file')->getClientOriginalName();
                try {
                    $document->update([
                        'url_file' => $filename,
                        'title' => $request->title,
                        'desc' => $request->desc
                    ]);
                    $request->file('url_file')->move(public_path('document_post'),$filename);
                    return redirect()->route('documents.index')->with('success', 'Data Berhasil Diubah');

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
            // dd($document['url_file']);
            unlink('document_post/'.$document['url_file']);
            return redirect()->route('documents.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
