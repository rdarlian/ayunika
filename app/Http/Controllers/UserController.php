<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view("admin.index");
        $isAdmin = Auth::user()->is_admin;
        if (!$isAdmin) {
            return view("error.forbidden");
        }
        $uid = Auth::id();
        // $users = User::paginate(3);
        $users = User::all();
        $currentDate = Carbon::today()->toDateString();


        return view("dashboard.users.index", [
            "users" => $users,
            "isAdmin" => $isAdmin,
            "currentDate" => $currentDate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("dashboard.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request['period2'] != null) {
            $request['period'] = $request['period2'];
        }

        $request['period_date'] = Carbon::now()->toDateTimeString();
        $validatedData = $request->validate([
            "username" => "required|unique:users",
            "password" => "required",
            "is_admin" => "required|boolean",
        ]);
        if ($request['is_admin'] == "0") {
            $validatedData  += $request->validate([
                "period" => "required",
                "period_date" => "required",
                "tier" => "required",
                "theme" => "required",
            ]);
        }

        User::create($validatedData);

        $users = User::all();
        $count = User::select("username")->count();
        return redirect()->route("users.index")->with([
            "users" => $users,
            "count" => $count,
            "success" => "User berhasil ditambahkan",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("dashboard.users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if ($request['period2'] != null) {
            $request['period'] = $request['period2'];
        }

        if ($request['period']) {
            $to_date = strtotime($user->period_date);
            $from_date = strtotime(now()->toDateString());
            $diff = (((int)$from_date - (int)$to_date)) / 86400;

            $day = (int)max(0, $user->period - $diff);
            if ($day != 0) {
                $request['period'] = ($day + (int)$request['period']);
            }
            $request['period_date'] = Carbon::now()->toDateTimeString();
        }


        $validatedData = $request->validate([
            "username" => "required",
            "theme" => "required",
            "is_admin" => "required",
            "period" => "nullable",
            "period_date" => "",
            "tier" => "required",
        ]);
        $user->update($validatedData);

        $users = User::all();
        return redirect()
            ->route("users.index")
            ->with("users", $users)
            ->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->id == Auth::id()) {
            return redirect()
                ->route("users.index")
                ->with(["error" => "Tidak dapat menghapus user saat ini"]);
        } else {
            $user->delete();
            $users = User::all();
            return redirect()
                ->route("users.index")
                ->with([
                    "users" => $users,
                    "success" => "User berhasil dihapus",
                    "user" => $user,
                ]);
        }
    }
}
