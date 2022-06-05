<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
// use App\Category;

class PostController extends Controller
{
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/');
        // return redirect('/posts/' . $post->id);
    }
    
    public function page_change(Post $post){
        $count_rainy = Post::where('weather_id',1)->count();
        $count_sunny = Post::where('weather_id',2)->count();
        if($count_rainy-$count_sunny<1){
            return view('home1');
        }
        elseif($count_rainy-$count_sunny<2){
            return view('home2');
        }
        elseif($count_rainy-$count_sunny<3){
            return view('home3');
        }
    }
    
   // public function index(){
     //   $count = \App\Post::count();
       // console.log($count);
    //}
    // public function index(Post $post)
    // {
    //     return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    // }
    
    // public function show(Post $post)
    // {
    //     return view('posts/show')->with(['post' => $post]);
    // }
    
    // public function create(Category $category)
    // {
    //     return view('posts/create')->with(['categories' => $category->get()]);;
    // }
    
    // public function store(PostRequest $request, Post $post)
    // {
    //     $input = $request['post'];
    //     $post->fill($input)->save();
    //     return redirect('/posts/' . $post->id);
    // }
    
    // public function edit(Post $post)
    // {
    //     return view('posts/edit')->with(['post' => $post]);
    // }
    
    // public function update(PostRequest $request, Post $post)
    // {
    //     $input_post = $request['post'];
    //     $post->fill($input_post)->save();
        
    //     return redirect('/posts/' . $post->id);
    // }
    
    // public function delete(Post $post)
    // {
    //     $post->delete();
    //     return redirect('/');
    // }
    
}
