<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index(){

        $posts=Post::all();

        return view('admin.posts.post-index',compact('posts'));
    }

    public function show($id){

        $post=Post::findorFail($id);

        return view('blog-post', compact('post'));
    }

    public function create(){
        return view('admin.posts.post-create');
    }

    public function store(){
        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);
        
        return redirect()->route('post.index');
    }

    public function destroy($id, Request $request){
        $post=Post::findorFail($id);
        $post->delete();
 
        $request->session()->flash('message','Post was deleted.');

        return back();
    }

    public function edit(Post $post)
    {
 
        return view('admin.posts/post-edit', compact('post'));
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => 'required | min:8 | max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image=$inputs['post_image'];
        }

        $post->title= $inputs['title'];
        $post->body = $inputs['body'];

        auth()->user()->posts()->save($post);

        session()->flash('message-update','Post was updated.');

        return redirect()->route('post.index');
      
    }

}
