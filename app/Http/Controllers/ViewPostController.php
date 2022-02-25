<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class ViewPostController extends Controller
{
    public function index($id){

        $data = Category::where('id',$id)->first();

        return view('categoryPost.index', compact('data'));
    }
}
