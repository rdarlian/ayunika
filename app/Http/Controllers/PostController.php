<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(12);
        if ($request->ajax()) {
            $view = view('infinitepost', compact('posts'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $posts->nextPageUrl()]);
        }

        $title = '';

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('posts', [
            "title" => "Blogs" . $title,
            "active" => 'blogs',
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))::paginate(10)
            "posts" => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "active" => 'berita',
            "title" => "Single Post",
            "post" => $post
        ]);
    }
    public function lazyload(Request $request)
    {
        $posts = Post::latest()->paginate(20);
        if ($request->ajax()) {
            $view = view('coba', compact('posts'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $posts->nextPageUrl()]);
        }
        return view('coba', compact('posts'));
    }
}
