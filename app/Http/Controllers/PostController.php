<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post) //インポートしたPostをインスタンス化して$postとして使用
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
        //getPaginateryByLimit()はPost.phpで定義したメソッドです
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
        //'post'はbladeファイルで使用する変数。中身$postはid=1のPostインスタンス
    }
}
?>