<?php

namespace App\Http\Controllers;

use App\Models\Greeting;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Models\InvitationWord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GreetingController extends Controller
{
    public function index()
    {
        $uid = Auth::id();
        $greeting = DB::table('greetings')->where("user_id", $uid)
            ->latest()
            ->get()
            ->toArray();

        return view('dashboard.guest.ucapan', [
            'greet' => $greeting,
            'words' => InvitationWord::latest()->get()
        ]);
    }
    public function store(Request $request, Greeting $greeting)
    {
        $id = Auth::id();
        $inId = $request->input('pesan');
        $pesanUtama = $request->input('pesanku');

        $pesan = DB::table('invitation_words')
            ->select('word')
            ->where('id', $inId)
            ->get()->toArray();
        $pesan =  $pesan[0]->word;

        if ($pesanUtama != null) {
            $pesan = $pesanUtama;
        }

        $data = [
            'greeting' => $pesan,
            'user_id' => $id,
            'invitation_id' => $inId,
            'pesanku' => $pesanUtama,
        ];

        // Simpan data ke database
        // Greeting::create(['greeting' => $pesan, 'user_id' => $id]);
        Greeting::UpdateOrCreate(["user_id" => Auth::id()], $data);

        return redirect('/dashboard/guests')->with('success', 'New Guest has been added');
    }
}
