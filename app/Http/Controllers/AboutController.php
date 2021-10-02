<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sambutan = Category::where('category_name','sambutan')->orderBy('id','desc');
        // return view('dashboard.about.sambutan.index',compact('sambutan'));
    }

    public function sambutan()
    {
        $categories = Category::where('category_name','sambutan')->get();
        foreach ($categories as $category) {
            $id_category = $category->id;
        }
        $posts = Post::where('category_id',$id_category)->orderBy('id','desc')->get();
        return view('dashboard.about.sambutan.index',compact('posts'));
    }

    public function visimisi()
    {
        $categories = Category::where('category_name','visi_misi')->get();
        foreach ($categories as $category) {
            $id_category = $category->id;
        }
        $posts = Post::where('category_id',$id_category)->orderBy('id','desc')->get();
        return view('dashboard.about.visimisi.index',compact('posts'));
    }

    public function sejarah()
    {
        $categories = Category::where('category_name','sejarah')->get();
        foreach ($categories as $category) {
            $id_category = $category->id;
        }
        $posts = Post::where('category_id',$id_category)->orderBy('id','desc')->get();
        return view('dashboard.about.sejarah.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $category_name = $request->category;
        $categories = Category::where('category_name',$category_name)->get();
        if($category_name == 'sambutan'){
            return view('dashboard.about.sambutan.add',compact('categories'));
        }
        if($category_name == 'visi_misi'){
            return view('dashboard.about.visimisi.add',compact('categories'));
        }
        if($category_name == 'sejarah'){
            return view('dashboard.about.sejarah.add',compact('categories'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Category::where('id',$request->category_id)->get();
        foreach($categories as $category){
            $category_name = $category->category_name;
        }

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        try {
            Post::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'url_photo' => NULL,
                'title' => $request->title,
                'content' => $request->content
            ]);
            if($category_name == 'sambutan'){
                return redirect('/sambutan');
            }
            if($category_name == 'sejarah'){
                return redirect('/sejarah');
            }
            if($category_name == 'visi_misi'){
                return redirect('/visimisi');
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // return view('dashboard.about.sambutan.edit',compact('post'));
    }

    public function editsambutan($id)
    {
        $post = Post::find($id);
        return view('dashboard.about.sambutan.edit',compact('post'));
    }

    public function editvisimisi($id)
    {
        $post = Post::find($id);
        return view('dashboard.about.visimisi.edit',compact('post'));
    }

    public function editsejarah($id)
    {
        $post = Post::find($id);
        return view('dashboard.about.sejarah.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categories = Category::where('id',$request->category_id)->get();
        foreach($categories as $category){
            $category_name = $category->category_name;
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        try {
            Post::find($request->id)->update([
                'title' => $request->title,
                'content' => $request->content
            ]);
            if($category_name == 'sambutan'){
                return redirect('/sambutan');
            }
            if($category_name == 'sejarah'){
                return redirect('/sejarah');
            }
            if($category_name == 'visi_misi'){
                return redirect('/visimisi');
            }

        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
