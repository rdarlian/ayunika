<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class DashboardGuestController extends Controller
{
    public function index()
    {
        return view('dashboard.guest.index', [
            'guests' => Guest::latest()->paginate(10)
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

        foreach ($dataArray as $item) {
            if (strpos($item, '@') !== false) {
                list($nama, $nohp) = explode('@', $item);
            } else {
                $nama = $item;
                $nohp = null;
            }

            // Simpan data ke database
            Guest::create(['name' => $nama, 'nohp' => $nohp]);
        }
        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'slug' => 'required|unique:guests',
        //     'image' => 'image|file|max:5048',
        //     'guest_id' => 'required',

        // ]);
        // if ($request->file('image')) {
        //     $validatedData['image'] = $request->file('image')->store('guest-images', 'public');
        // }
        // Guest::create($validatedData);

        return redirect('/dashboard/guests')->with('success', 'New Guest has been added');
    }
}
