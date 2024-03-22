<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guest;
use App\Models\Story;
use App\Models\Images;
use App\Models\Ucapan;
use App\Models\Greeting;
use App\Models\Undangan;
use App\Models\UserSong;
use App\Models\BrideImage;
use App\Models\CoverImage;
use App\Models\DataAmplop;
use App\Models\GroomImage;
use App\Models\UserUndangan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Support\ValidatedData;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $validationRules = [
            "username" => "required|unique:users",
            "password" => "required",
            "is_admin" => "required|boolean",
        ];

        if ($request['is_admin'] == "0") {
            $validationRules += [
                "slug" => ['required', Rule::unique("users", 'slug')],
                "period" => "required",
                "period_date" => "required",
                "tier" => "required",
                "theme" => "required",
            ];
        } elseif ($request['is_admin'] == "1") {
            $request['slug'] = 'preview';
            $validationRules += [
                "slug" => "required"
            ];
        }

        $validatedData = $request->validate($validationRules);
        $user = User::create($validatedData);

        if ($request['is_admin'] == "1") {
            $isPreview = User::where("slug", 'preview')->select('slug')->first();
            if (!isset($isPreview)) {
                Undangan::create([
                    "slug" => $request->input("slug"),
                    // Add other undangan fields as needed
                    "user_id" => $user->id, // Assuming user_id is the foreign key in Undangan
                ]);
            }
        } else {

            // If it's not an admin request, create the undangan
            UserUndangan::create([
                "slug" => $request->input("slug"),
                // Add other undangan fields as needed
                "user_id" => $user->id, // Assuming user_id is the foreign key in Undangan
            ]);
        }

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

        if ($request["slug"]) {
            dd("hayoo");
        }

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
            $story = Story::Where('slug', $user->slug)->get();
            $bride_images = BrideImage::Where('slug', $user->slug)->first();
            $cover_images = CoverImage::where('slug', $user->slug)->first();
            $data_amplop = DataAmplop::where('slug', $user->slug)->first();
            $groom_images = GroomImage::where('slug', $user->slug)->first();
            $gallery = Images::where('slug', $user->slug)->get();
            $greeting = Greeting::where('id', $user->id)->first();
            $guest = Guest::where('id', $user->id)->first();
            $ucapan = Ucapan::where('slug', $user->slug)->first();
            $song = UserSong::where('slug', $user->slug)->first();
            $undangan = Undangan::where('slug', $user->slug)->first();
            $userundangan = UserUndangan::where('slug', $user->slug)->first();

            //Handle Delete Cloudinary
            $imageTypes = [$bride_images, $cover_images, $groom_images];
            foreach ($imageTypes as $imageType) {
                $images = $imageType;
                if ($images != null) {
                    $cloudinaryURL = $images->images;
                    $regex = '~\/([^/.]+)(\.\w+)$~';
                    preg_match($regex, $cloudinaryURL, $matches);
                    $extractedString = $matches[1];
                    $finalString = "pxl-ayunika-dev/$extractedString";

                    $response = Cloudinary::destroy($finalString);

                    // If the deletion is successful, the API response will contain 'result' => 'ok'
                    if ($response['result'] === 'ok' && $images->exists()) {
                        $images->delete();
                    } elseif ($images->doesntExist()) {
                        return response()->json(['error' => 'Data not found in the database.']);
                    } else {
                        return response()->json(['error' => "Failed to remove {$imageType}."]);
                    }
                }
            }

            foreach ($gallery ?? [] as $galeri) {
                $images = $galeri;

                if ($images != null) {
                    $cloudinaryURL = $images->images;
                    $regex = '~\/([^/.]+)(\.\w+)$~';
                    preg_match($regex, $cloudinaryURL, $matches);
                    $extractedString = $matches[1];
                    $finalString = "pxl-ayunika-dev/$extractedString";

                    $response = Cloudinary::destroy($finalString);

                    // If the deletion is successful, the API response will contain 'result' => 'ok'
                    if ($response['result'] === 'ok' && $images->exists()) {
                        $images->delete();
                    } elseif ($images->doesntExist()) {
                        return response()->json(['error' => 'Data not found in the database.']);
                    } else {
                        return response()->json(['error' => "Failed to remove {$imageType}."]);
                    }
                }
            }


            if ($story != null) {
                foreach ($story as $stori) {
                    if ($stori->image_story) {
                        Storage::disk('public')->delete($stori->image_story);
                    }
                }
                $storyIds = $story->pluck('id');
                Story::whereIn('id', $storyIds)->delete();
            }

            if ($greeting != null) {
                Greeting::where('user_id', $user->id)->delete();
            }
            if ($guest != null) {
                Guest::where('user_id', $user->id)->delete();
            }
            if ($ucapan != null) {
                Ucapan::where('slug', $user->slug)->delete();
            }
            if ($data_amplop != null) {
                DataAmplop::where('slug', $user->slug)->delete();
            }

            if ($song != null) {
                if ($song->audio_path) {
                    Storage::delete($song->audio_path);
                }
                $song->delete();
            }
            if ($undangan != null) {
                $undangan = Undangan::find($undangan->id);
                $undangan->delete();
            }
            if ($userundangan != null) {
                $userundangan = UserUndangan::find($userundangan->id);
                $userundangan->delete();
            }

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
