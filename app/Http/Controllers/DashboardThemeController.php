<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardThemeController extends Controller
{
    public function index()
    {
        return view('dashboard.theme.index', [
            'themes' => Theme::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.theme.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:themes',
            'image' => 'image|file|max:5048',
            'theme_id' => 'required',

        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('theme-images', 'public');
        }
        Theme::create($validatedData);

        return redirect('/dashboard/themes')->with('success', 'New Theme has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('dashboard.theme.edit', [
            'theme' => $theme,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $rules = [
            'name' => 'required|max:255',
            'theme_id' => 'required',
            'image' => 'image|file|max:2048',
        ];

        if ($request->slug != $theme->slug) {
            $rules['slug'] = 'required|unique:themes';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::disk('public')->delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('theme-images', 'public');
        }

        Theme::where('id', $theme->id)
            ->update($validatedData);

        return redirect('/dashboard/themes')->with('success', 'New Theme has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        if ($theme->image) {
            Storage::delete($theme->image);
        }
        Theme::destroy($theme->id);
        return redirect('/dashboard/themes')->with('success', 'Theme has been deleted');
    }

    public function checkSlug(Request $request)
    {

        $slug = SlugService::createSlug(Theme::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
