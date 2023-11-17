<?php

namespace App\Imports;

use App\Models\Guest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GuestImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {

        $uid = Auth::id();
        // $slug = DB::table('undangans')->where('user_id', $uid)->first()->slug;
        // $link = "http://ayunika.com/{$slug}?kepada=" . urlencode($row[0]) . "&di=tempat";
        if (!isset($row[0])) {
            return null;
        }
        // Check if data already exists
        if (Guest::where('name', $row[1])->where('user_id', $uid)->exists()) {
            return null; // Skip creation if data already exists

        }

        return new Guest([
            'name' => $row[1],
            'nohp' => $row[2],
            'status' => 0,
            'user_id' => $uid
        ]);
    }
}
