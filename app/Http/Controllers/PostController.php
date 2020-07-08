<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function show($id){

        $post=Post::findorFail($id);

        return view('blog-post', compact('post'));
    }
}
