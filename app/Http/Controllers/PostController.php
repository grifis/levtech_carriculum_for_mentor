<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Comment;
use App\Knowledge;
use App\Like;

class PostController extends Controller
{
    public function index(Post $post, Knowledge $knowledge)
    {

        
        // クライアントインスタンス生成
        $client = new \GuzzleHttp\Client();

        // GET通信するURL
        $url = "https://api.openweathermap.org/data/2.5/onecall?lat=35.681236&lon=139.767125&units=metric&lang=ja&appid=b189686c28f3ce7905dca1b79969a9f1";

        // リクエスト送信と返却データの取得
        // Bearerトークンにアクセストークンを指定して認証を行う
        $response = $client->request(
            'GET',
            $url,
            ['Bearer' => config('services.OpenWeatherMap.token')]
        );
        
        // API通信で取得したデータはjson形式なので
        // PHPファイルに対応した連想配列にデコードする
        $questions = json_decode($response->getBody(), true);
        $weather = $questions['current']['weather'][0]['description'];
        // dd($questions);
        // index bladeに取得したデータを渡す
        // dd($knowledge->random());
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'weather' => $weather,
            'knowledges' => $knowledge->random()
        ]);
        
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    public function store(PostRequest $request, Post $post, Like $like)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        $like->post_id = $post->id;
        $like->like = 0;
        $like->save();
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
    
    public function order(Request $request, Post $post, Knowledge $knowledge)
    {
        //dd($request->input('update'));
        if($request->input('update') == 'like'){
            $test = $post->get();
            dd($test->find(1)->id);
            //dd($post);
        }
        return view('posts/index')->with(['posts' => $post->paginate(5), 'knowledges' => $knowledge->ramdom()]);
    }
    
    public function like(Post $post, Knowledge $knowledge)
    {
        $post->like->increment('like');
        $post->like->save();
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(), 'knowledges' => $knowledge->ramdom()]);
    }
}
