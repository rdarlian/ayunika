<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardSongController extends Controller
{
    public function index()
    {
        return view('dashboard.song.index', [
            'songs' => Song::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard.song.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'link' => 'required|file|mimes:audio/mpeg,mpga,mp3,mp4,wav,aac'
        ]);
        if ($request->file('link')) {
            $validatedData['link'] = $request->file('link')->store('undangan-songs', 'public');
        }

        Song::create($validatedData);

        return redirect('/dashboard/song')->with('success', 'New Song has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('dashboard.song.edit', [
            'song' => $song,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $rules = [
            'judul' => 'required|max:255',
            'link' => 'required|file|mimes:audio/mpeg,mpga,mp3,mp4,wav,aac'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('link')) {
            if ($request->oldLink) {
                Storage::disk('public')->delete($request->oldLink);
            }
            $validatedData['link'] = $request->file('link')->store('undangan-songs', 'public');
        }

        Song::where('id', $song->id)
            ->update($validatedData);

        return redirect('/dashboard/song')->with('success', 'New Song has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        if ($song->link) {
            Storage::delete($song->link);
        }
        Song::destroy($song->id);
        return redirect('/dashboard/song')->with('success', 'Theme has been deleted');
    }
}
