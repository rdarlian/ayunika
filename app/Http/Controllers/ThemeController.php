<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ThemeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Theme::latest()->paginate(12);
        if ($request->ajax()) {
            $view = view('infinitepost', compact('posts'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $posts->nextPageUrl()]);
        }
        // if (request('author')) {
        //     $author = User::firstWhere('username', request('author'));
        //     $title = ' by ' . $author->name;
        // }
        return view('theme', [
            "title" => "Blogs",
            "active" => 'blogs',
            // "posts" => Post::latest()->filter(request(['search', 'category', 'author']))::paginate(10)
            "posts" => $posts,
        ]);
    }
}
