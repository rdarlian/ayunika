<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Greeting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InvitationWord;
use App\Models\Undangan;
use App\Models\UserUndangan;
use Illuminate\Support\Facades\Auth;

class DashboardGuestController extends Controller
{

    public function index()
    {
        $slug = Auth::user()->slug;
        $id = Auth::id();

        $data = Greeting::where('user_id', $id)->first();
        if ($data) {
            $greeting = $data->greeting;
        } else {
            $greeting = Greeting::create(['user_id' => $id]);
            $data = Greeting::where('user_id', $id)->first();
            $greeting = $data->greeting;
        }



        // $tamu = Guest::where('id', $tamu);
        // $link = Undangan::where('id', $id)->select('slug')->get();


        $record = Undangan::select('groom_nickname', 'bride_nickname')
            ->where('slug', $slug)
            ->first();
        if ($record == null) {
            $record = UserUndangan::select('groom_nickname', 'bride_nickname')
                ->where('slug', $slug)
                ->first();
        }
        if ($record != null) {
            $both = [
                'groom_nickname' => $record->groom_nickname,
                'bride_nickname' => $record->bride_nickname,
            ];
        } else
            $both = null;

        $link = url('');
        $guest = Guest::latest()->where('user_id', $id)->paginate(10);

        return view('dashboard.guest.index', [
            'guests' => $guest,
            'greet' => $greeting,
            'link' => $link,
            'both' => $both,
            'copy' => $data,
            'slug' => $slug,
        ]);
    }

    public function create()
    {
        return view('dashboard.guest.create');
    }

    public function store(Request $request)
    {
        $data = $request->input('name');
        $dataArray = explode(PHP_EOL, $data);
        $i = 0;
        $uid = Auth::id();

        foreach ($dataArray as $item) {
            if (strpos($item, '@') !== false) {
                list($nama, $nohp) = explode('@', $item);
            } else {
                $nama = $item;
                $nohp = null;
            }
            // Simpan data ke database
            Guest::create(['name' => $nama, 'nohp' => $nohp, 'user_id' => $uid]);
        }


        return redirect('/dashboard/guests')->with('success', 'New Guest has been added');
    }

    public function edit(Guest $guest)
    {
        return view('dashboard.guest.edit', [
            'guest' => $guest,
        ]);
    }

    public function update(Request $request, Guest $guest)
    {
        $rules = [
            'name' => 'required|max:255',
            'nohp' => 'nullable',
        ];

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;

        Guest::where('id', $guest->id)
            ->update($validatedData);

        return redirect('/dashboard/guests')->with('success', 'Tamu Berhasil diupdate');
    }

    public function updateGreeting(Request $request, Guest $guest)
    {
        $rules = [
            'greeting' => 'required',
            // 'title' => 'required|max:255',
            // 'image' => 'image|file|max:2048',
            // 'body' => 'required'
        ];



        // $validatedData = $request->validate($rules);
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        Guest::where('id', $guest->id)
            ->update($validatedData);

        return redirect('/dashboard/guests')->with('success', 'New Guest has been updated');
    }
    public function destroy(Guest $guest)
    {
        Guest::destroy($guest->id);
        return redirect('/dashboard/guests')->with('success', 'Tamu Sudah Dihapus');
    }
}
