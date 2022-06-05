<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use GuzzleHttp\Client;
use App\Kasa;

class PostController extends Controller
{
    public function map(Kasa $kasa)
    {
        $lat = -54.625388616131495;
        $lng = 158.8538197821135;
        $apiKey = '1236b67a22e6499c7370b9f6d925778f';
        $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lng&appid=$apiKey";
        $method = "GET";
        
        $client = new Client();
        
        $response = $client->request($method, $url);
        $data = $response->getBody();
        $data = json_decode($data, true);
        if(isset($data['rain']['1h'])){
            $rain = $data['rain']['1h'];
        }else{
            $rain = 0;
        }
        
        return view('posts/map')->with(['kasa'=>$kasa->get()]);
    }
    
    public function kasa(Kasa $kasa)
    {
        return view('posts/umbrella')->with(['kasa'=>$kasa]);
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}
