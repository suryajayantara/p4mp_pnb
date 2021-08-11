<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 4;
        $posts = Post::when($request->cari, function($query) use ($request){
            $query->where('title','LIKE','%'.$request->cari.'%');
        })->orderBy('id','desc')->paginate($pagination);
        
        $posts->appends($request->only('cari'));

        return view('dashboard.post.index',compact('posts'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.post.add',compact('categories'));
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
            'category_id' => 'required',
            'url_photo' => 'required|mimes:jpeg,jpg,png|max:5000',
            'title' => 'required',
            'content' => 'required'
        ]);

        $nama_foto = Str::replace(' ', '_', Auth::user()->name).date('_d_m_Y-H_i_s').".jpg";

        try {
            Post::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'url_photo' => $nama_foto,
                'title' => $request->title,
                'content' => $request->content
            ]);
            $request->file('url_photo')->move(public_path('foto_post'),$nama_foto);
            return redirect()->route('posts.index');

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
        $categories = Category::all();
        return view('dashboard.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category_id' => 'required',
            'url_photo' => 'mimes:jpeg,jpg,png|max:5000',
            'title' => 'required',
            'content' => 'required'
        ]);

        date_default_timezone_set('Asia/Singapore');
        $nama_foto = Str::replace(' ', '_', Auth::user()->name).date('_d_m_Y-H_i_s').".jpg";

        if($request->file('url_photo') == ""){
            try {
                $post->update([
                    'category_id' => $request->category_id,
                    'url_photo' => $post->url_photo,
                    'title' => $request->title,
                    'content' => $request->content
                ]);
                return redirect()->route('posts.index');
    
            } catch (\Throwable $th) {
                return $th;
            }
        }
        else{
            try {
                $post->update([
                    'category_id' => $request->category_id,
                    'url_photo' => $nama_foto,
                    'title' => $request->title,
                    'content' => $request->content
                ]);
                $request->file('url_photo')->move(public_path('foto_post'),$nama_foto);
                return redirect()->route('posts.index');
    
            } catch (\Throwable $th) {
                return $th;
            }
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
        try {
            $post->delete();
            return redirect()->route('posts.index');
        } catch (\Throwable $th) {
            echo 'sad';
        }
    }
}
