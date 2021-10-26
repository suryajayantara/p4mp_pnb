<?php

namespace App\Http\Controllers;

use App\Models\CategoryDocument;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 5;
        $category_documents = CategoryDocument::when($request->cari, function($query) use ($request){
            $query->where('category_name','LIKE','%'.$request->cari.'%');
        })->orderBy('id','desc')->paginate($pagination);

        $category_documents->appends($request->only('cari'));

        return view('dashboard.document_category.index',compact('category_documents'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.document_category.add');
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
            'category_name' => 'required|unique:category_documents,category_name,id',
            'desc' => 'required',
        ],[
            'category_name.unique' => "Data Sudah Ada !"
        ]);

        try {
            CategoryDocument::create([
                'category_name' => $request->category_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('category_documents.index');

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryDocument  $categoryDocument
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryDocument $categoryDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryDocument  $categoryDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryDocument $categoryDocument)
    {
        return view('dashboard.document_category.edit',compact('categoryDocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryDocument  $categoryDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryDocument $categoryDocument)
    {
        $request->validate([
            'category_name' => 'required',
            'desc' => 'required',
        ]);

        try {
            $categoryDocument->update([
                'category_name' => $request->category_name,
                'desc' => $request->desc,
            ]);
            return redirect()->route('category_documents.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryDocument  $categoryDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDocument $categoryDocument)
    {
        try {
            $categoryDocument->delete();
            return redirect()->route('category_documents.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }
    }
}
