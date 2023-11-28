<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Greeting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\InvitationWord;
use App\Models\Undangan;
use Illuminate\Support\Facades\Auth;

class DashboardGuestController extends Controller
{

    public function index()
    {
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
            ->where('user_id', $id)
            ->first();
        if ($record) {
            $both = [
                'groom_nickname' => $record->groom_nickname,
                'bride_nickname' => $record->bride_nickname,
            ];
        }

        $link = url()->current();
        $guest = Guest::select('name')->get();


        return view('dashboard.guest.index', [
            'guests' => Guest::latest()->where('user_id', $id)->paginate(10),
            'greet' => $greeting,
            'link' => $link,
            'both' => $both
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
    public function update(Request $request, Guest $guest)
    {
        $rules = [
            'title' => 'required|max:255',
            'image' => 'image|file|max:2048',
            'body' => 'required'

        ];



        if ($request->slug != $guest->slug) {
            $rules['slug'] = 'required|unique:guests';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::disk('public')->delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('guest-images', 'public');
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Guest::where('id', $guest->id)
            ->update($validatedData);

        return redirect('/dashboard/guests')->with('success', 'New Guest has been updated');
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
}
