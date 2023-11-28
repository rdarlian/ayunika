<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ThemeController extends Controller
{
    public function index(Request $request)
    {
        $themes = Theme::latest()->paginate(12);
        if ($request->ajax()) {
            $view = view('infinitetheme', compact('themes'))->render();
            return Response::json(['view' => $view, 'nextPageUrl' => $themes->nextPageUrl()]);
        }

        return view('theme', [
            "title" => "Themes",
            "active" => 'themes',
            // "themes" => Post::latest()->filter(request(['search', 'category', 'author']))::paginate(10)
            "themes" => $themes,
        ]);
    }
}
