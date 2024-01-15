<?php

namespace App\Http\Controllers;

use App\Models\Ucapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UcapanController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::id();
        // get slug based on curent url slug
        $currentUrl = url()->current();
        basename(parse_url($currentUrl, PHP_URL_PATH));
        //validate data
        $validatedData = $request->validate([
            'guest_name' => 'required',
            'ucapan' => 'required',
            'konfirmasi' => 'required',
            // 'jumlah_kehadiran' => 'required',
            'slug' => 'required',
        ]);

        // create data
        $ucapans = Ucapan::create($validatedData);

        DB::table('undangans')->where('user_id', $user_id)->value('slug');
        return response()->json($ucapans, 200);
    }
}
