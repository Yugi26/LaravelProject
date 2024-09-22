<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; //useする

class PostController extends Controller
{
    public function index(Post $post) //インポートしたPostをインスタンス化して$postとして使用
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
        //getPaginateryByLimit()はPost.phpで定義したメソッドです
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
        //'post'はbladeファイルで使用する変数。中身$postはid=1のPostインスタンス
    }

    public function store(Post $post, PostRequest $request) //引数をRequestからPostRequestに変更
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(PostRequest $request, Post $post) //引数をRequestからPostRequestに変更
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
}
?>