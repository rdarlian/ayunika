<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Song;
use App\Models\User;
use App\Models\Guest;
use App\Models\Story;
use App\Models\Theme;
use App\Models\Images;
use App\Models\Ucapan;
use App\Models\Greeting;
use App\Models\Undangan;
use App\Models\UserSong;
use App\Models\BrideImage;

use App\Models\CoverImage;
use App\Models\DataAmplop;
use App\Models\GroomImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UndanganController extends Controller
{
    public function generateUniqueSlug($groomNickname, $brideNickname, $userId)
    {
        // if($userId == 1)
        // {

        // }
        $slug = Str::slug($groomNickname . "-" . $brideNickname);

        $count = 1;
        $slugExists = Undangan::where("slug", $slug)
            ->whereNotIn("user_id", [$userId])
            ->exists();

        while ($slugExists) {
            $slug = Str::slug($slug) . "-" . $count;
            $count++;

            $slugExists = Undangan::where("slug", $slug)
                ->whereNotIn("user_id", [$userId])
                ->exists();
        }
        return $slug;
    }

    public function extractYouTubeVideoId($url)
    {
        $pattern =
            '/(?:v=|\/embed\/|\/v\/|\/vi\/|\/user\/\w\/|\/videos\/|\/channels\/\w\/|\/embed\/|www\.youtube\.com\/watch\?v=|youtu.be\/|youtube.com\/s\?v=|y2u.be\/|youtu.be\/|youtube.com\/v\/|youtube.com\/user\/\w\?v=|youtube.com\/(?:embed|v|shorts|attribution_link)\?video_id=|youtube.com\/(?:embed|v|shorts|attribution_link)\?video_id=)([^#\&\?\n\/<>\'"]+)/i';
        $matches = [];

        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        return $url;
    }

    public function formatDate($dateStr, $locale)
    {
        $date = new DateTime($dateStr);
        $formattedDate = $date->format("d F Y");
        setlocale(LC_TIME, $locale);
        $formattedDate = strftime("%e %B %Y", strtotime($formattedDate));
        return $formattedDate;
    }

    public function formatDay($dateStr, $locale)
    {
        $date = Carbon::parse($dateStr);
        $formattedDay = $date->translatedFormat("l");
        return $formattedDay;
    }
    public function createOrUpdateUndangan($request, $uid, $slug, $data_states, $link, $lat, $lng)
    {
        $undanganData = [
            "quote" => $request->quote,
            "quote_source" => $request->quote_source,
            "bride_name" => $request->bride_name,
            "groom_name" => $request->groom_name,
            "groom_child_order" => $request->groom_child_order,
            "bride_nickname" => $request->bride_nickname,
            "bride_child_order" => $request->bride_child_order,
            "groom_nickname" => $request->groom_nickname,
            "bride_father" => $request->bride_fathername,
            "bride_mother" => $request->bride_mothername,
            "bride_address" => $request->bride_address,
            "groom_father" => $request->groom_fathername,
            "groom_mother" => $request->groom_mothername,
            "groom_address" => $request->groom_address,
            "user_id" => $uid,
            "akad_loc" => $request->akad_loc,
            "akad_date" => $request->akad_date,
            "akad_time" => $request->akad_time,
            "alamatAkad" => $request->alamatAkad,
            "alamatAkadLengkap" => $request->alamatAkadLengkap,

            "timetitle" => $request->timetitle,

            "isSameAddress" => $request->isSameAddress,
            "isUserSong" => $request->isUserSong,
            "resepsi_loc" => $request->resepsi_loc,
            "resepsi_date" => $request->resepsi_date,
            "resepsi_time" => $request->resepsi_time,
            "alamatResepsi" => $request->alamatResepsi,
            "alamatResepsiLengkap" => $request->alamatResepsiLengkap,

            "akad_lat" => $request->akad_lat,
            "akad_lng" => $request->akad_lng,
            "resepsi_lat" => $request->resepsi_lat,
            "resepsi_lng" => $request->resepsi_lng,
            "songs" => $request->songs,
            "link" => $link,

            "slug" => $slug,
        ];
        $undangan = Undangan::updateOrCreate(
            [
                "user_id" => Auth::id(),
                "data_states" => $data_states,
            ],
            $undanganData
        );

        return $undangan;
    }
    public function createOrUpdateStory($request, $uid, $slug, $data_states)
    {
        $title_story = $request->title_stories;
        $tgl_story = $request->tgl_stories;
        $description_story = $request->description_stories;
        $image_story = $request->file('images');
        $oldImage = $request->oldImage;

        $data = Story::where('slug', $slug)->where('data_states', $data_states)->get();

        if ($title_story != null)
            foreach ($title_story as $index => $title) {
                $details = new Story();
                // $details->customer_id = session('customer_id');
                $details->title_story = $title_story[$index];
                $details->tgl_story = $tgl_story[$index];
                $details->description_story = $description_story[$index];
                $details->user_id = $uid;
                $details->slug = $slug;

                $validateData = [
                    'title_story' => $details->title_story,
                    'tgl_story' => $details->tgl_story,
                    'slug' =>  $details->slug = $slug,
                    'description_story' =>   $details->description_story,
                    "data_states" => $data_states,

                ];
                // Update records directly without using a loop
                Story::where('id', $data[$index]->id)->where('data_states', $data_states)->update($validateData);
            }

        if ($request->title_story != '') {
            $storyData = $request->validate([
                'title_story' => 'nullable|max:255',
                'tgl_story' => 'nullable',
                'slug' => '',
                'description_story' => 'nullable',
                'image_story' => 'image|file',
            ]);

            foreach ($request->title_story as $index => $title) {
                $validated["title_story"] = $storyData['title_story'][$index];
                $validated["tgl_story"] = $storyData['tgl_story'][$index];
                $validated["description_story"] = $storyData['description_story'][$index];

                if (isset($request->file('image_story')[$index])) {
                    $validated['image_story'] = $request->file('image_story')[$index]->store('undangan-images', 'public');
                }
                $validated["user_id"] = $uid;
                $validated["slug"] = $slug;
                $validated["data_states"] = $data_states;

                // Use updateOrCreate for simplicity
                $story = Story::Create($validated);
            }
        }



        // if ($request->file('image_story')) {
        //     $storyData['image_story'] = $request->file('image_story')->store('story-images', 'public');
        // }
    }

    public function createOrUpdateSong($request, $uid, $slug, $data_states)
    {
        $audio = $request->validate([
            'audio_path' => 'nullable|file|mimes:audio/mpeg,mpga,mp3,mp4,wav,aac'
        ]);
        if ($request->songopt == null) {
            $audio['judul'] = $request->songopt;
        }

        if (isset($request->songopt) && $request->songopt !== $request->oldSong) {
            if ($request->oldSong) {
                $isSongopt = Song::where('id', $request->oldSong)->first();
                if (!isset($isSongopt)) {
                    $oldPath = UserSong::select('audio_path')->where('judul', $request->oldSong)
                        ->where('slug', $slug)->where('data_states', $data_states)->first();
                    Storage::disk('public')->delete($oldPath->audio_path);
                }
            }

            $path = Song::select('link')->where('id', $request->songopt)->first();
            $audio['audio_path'] = $path->link;
            $audio['judul'] = $request->songopt;
        }


        if ($request->file('songs') != null && $request->file('songs') !== $request->oldSong) {
            if ($request->oldSong != null) {
                $isSongopt = Song::where('id', $request->oldSong)->first();
                if (!isset($isSongopt)) {
                    $oldPath = UserSong::select('audio_path')->where('judul', $request->oldSong)
                        ->where('slug', $slug)->where('data_states', $data_states)->first();
                    Storage::disk('public')->delete($oldPath->audio_path);
                }
            }
            $audio['audio_path'] = $request->file('songs')->store('user-songs', 'public');
            $audio['judul'] = 'upload';
        }

        $audio["user_id"] = $uid;
        $audio['slug'] = $slug;
        $audio['data_states'] = $data_states;


        if (UserSong::where('user_id', $uid)->where('data_states', $data_states)->first() != null) {
            UserSong::where('data_states', $data_states)->update(
                $audio
            );
        } else {
            UserSong::create(
                $audio
            );
        }
    }

    public function createOrUpdateDataAmplop($request, $uid, $slug, $data_states)
    {
        $dataAmplop = [
            "nama_bank" => $request->nama_bank,
            "norek" => $request->norek,
            "pemilik_rekening" => $request->pemilik_rekening,
            "nowa" => $request->nowa,
            "slug" => $slug,
        ];


        $amplop = DataAmplop::updateOrCreate(
            [
                "user_id" => Auth::id(),
                "data_states" => $data_states
            ],
            $dataAmplop
        );

        return $amplop;
    }

    // fetcch latest record based on slug
    public function fetchLatestRecord($table, $slug, $limit = 1)
    {
        $query = DB::table($table)
            ->where("slug", $slug)
            ->latest()
            ->orderBy("id", "desc");

        if ($limit !== null) {
            $query->limit($limit);
        }

        return $query->get();
    }

    // fetch record based on slug
    public function fetchAllRecords($table, $slug, $data_states)
    {
        return DB::table($table)
            ->where("slug", $slug)
            ->where('data_states', $data_states)
            ->get();
    }

    private function getModelClass($fieldName)
    {
        // Define a mapping between field names and model classes
        $modelMap = [
            "images" => Image::class,
            "bride_images" => BrideImage::class,
            "groom_images" => GroomImage::class,
            "cover_images" => CoverImage::class,
        ];

        // Attempt to find a model class based on the provided field name
        // If a match is found, return the corresponding model class
        // If no match is found, return null
        return $modelMap[$fieldName] ?? null;
    }
    public function getLatestImages($table)
    {
        return DB::table($table)
            // ->select($table, "filesize") // Add 'filesize' to the select statement
            ->where("slug", Auth::user()->slug)
            ->orderBy("created_at", "desc")
            ->take(20)
            ->get();
    }
    public function getLatestImagesState($table, $data_states)
    {
        return DB::table($table)
            // ->select($table, "filesize") // Add 'filesize' to the select statement
            ->where("slug", Auth::user()->slug)
            ->where("data_states", $data_states)
            ->orderBy("created_at", "desc")
            ->take(20)
            ->get();
    }
    public function getSingleData($table)
    {
        return DB::table($table)
            // ->select($table, "filesize") // Add 'filesize' to the select statement
            ->where("slug", Auth::user()->slug)
            ->orderBy("created_at", "desc")
            ->take(1)
            ->get();
    }
    public function getSingleDataState($table, $data_states)
    {
        return DB::table($table)
            ->where("slug", Auth::user()->slug)
            ->where("data_states", $data_states)
            ->orderBy("created_at", "desc")
            ->take(1)
            ->get();
    }
    public function index(Undangan $undangans, Story $story)
    {
        $uid = Auth::id();
        $slug = Auth::user()->slug;
        //Get Data Undangan from user_id
        $data_states = DB::table("undangans")->select('data_states', 'id')
            ->where("slug", $slug)
            ->get();
        $states = DB::table("undangans")->select('data_states')
            ->where("slug", $slug)
            ->first();

        $undangans = DB::table("undangans")
            ->where("slug", $slug)
            ->where("data_states", $states->data_states)
            ->get()
            ->toArray();


        //Get stories with user_id
        $stories = DB::table("stories")
            ->where("slug", $slug)
            ->get();
        //Get Data Amplop with user_id
        $amplop = DB::table("data_amplops")
            ->where("slug", $slug)
            ->get();
        //Get latest stories with user_id
        $endStory = DB::table("stories")
            ->where("slug", $slug)->orderByDesc('created_at')->get();

        //Get tier with user_id
        $tier = DB::table("users")
            ->where("id", $uid)
            ->value("tier");

        $where = [["user_id", $uid]];
        $edit = false;
        $user = DB::table("users")
            ->where("id", Auth::id())
            ->get();

        $latestImagesCover = $this->getSingleData('cover_images');
        $latestImagesGroom = $this->getSingleData('groom_images');
        $latestImagesBride = $this->getSingleData('bride_images');
        $latestImages = $this->getLatestImages('images');
        $songs = $this->getLatestImages("user_songs");
        $songopt = DB::table("songs")->get();

        $data = [
            "user" => $user,
            "slug" => $slug,
            "undangans" => $undangans,
            "stories" => $stories,
            "amplop" => $amplop,
            "endStory" => $endStory,
            "tier" => $tier,
            "cover_images" => $latestImagesCover,
            "bride_images" => $latestImagesBride,
            "groom_images" => $latestImagesGroom,
            "images" => $latestImages,
            "songs" => $songs,
            "songopt" => $songopt,
            "states" => $data_states,
        ];
        return view("dashboard.undangan.index", $data);
    }
    public function home()
    {
        $uid = Auth::id();
        $slug = Auth::user()->slug;
        $states = DB::table("undangans")->select('data_states', 'id')
            ->where("slug", $slug)
            ->get();
        return view("dashboard.undangan.home", ['states' => $states]);
    }
    public function state_data(Undangan $undangans, Story $story, Request $request)
    {
        $uid = Auth::id();
        $currentUrl = url()->current();
        $data_states = basename(parse_url($currentUrl, PHP_URL_PATH));
        $slug = Auth::user()->slug;
        //Get Data Undangan from user_id
        $undangans = DB::table("undangans")
            ->where("slug", $slug)
            ->where("data_states", $data_states)
            ->latest()
            ->get()
            ->toArray();

        $states = DB::table("undangans")->select('data_states', 'id')
            ->where("slug", $slug)
            ->get();
        //Get stories with user_id
        $stories = DB::table("stories")
            ->where("slug", $slug)
            ->where("data_states", $data_states)
            ->get();
        //Get Data Amplop with user_id
        $amplop = DB::table("data_amplops")
            ->where("slug", $slug)
            ->where("data_states", $data_states)
            ->get();
        //Get latest stories with user_id
        $endStory = DB::table("stories")
            ->where("slug", $slug)
            ->where("data_states", $data_states)
            ->orderByDesc('created_at')->get();

        //Get tier with user_id
        $tier = DB::table("users")
            ->where("id", $uid)
            ->value("tier");

        $where = [["user_id", $uid]];
        $edit = false;
        $user = DB::table("users")
            ->where("id", Auth::id())
            ->get();

        $latestImagesCover = $this->getSingleDataState('cover_images', $data_states);
        $latestImagesGroom = $this->getSingleDataState('groom_images', $data_states);
        $latestImagesBride = $this->getSingleDataState('bride_images', $data_states);
        $latestImages = $this->getLatestImagesState('images', $data_states);
        $songs = $this->getLatestImagesState("user_songs", $data_states);
        $songopt = DB::table("songs")->get();

        $data = [
            "user" => $user,
            "slug" => $slug,
            "undangans" => $undangans,
            "stories" => $stories,
            "amplop" => $amplop,
            "endStory" => $endStory,
            "tier" => $tier,
            "cover_images" => $latestImagesCover,
            "bride_images" => $latestImagesBride,
            "groom_images" => $latestImagesGroom,
            "images" => $latestImages,
            "songs" => $songs,
            "songopt" => $songopt,
            "states" => $states
        ];
        return view("dashboard.undangan.index", $data);
    }

    public function store(Request $request, Undangan $undangan, Images $images, Song $song)
    {
        // Get latitude and longitude from the request
        $lat = $request->akad_lat;
        $lng = $request->akad_lng;


        // Comment/Delete the lines below when getting lat and lng from the form.
        $uid = Auth::id();
        $slug = Auth::user()->slug;
        $data_states = $request->data_states;
        $user = DB::table('users')->select('is_admin')->where('id', $uid)->get();

        // if ($user[0]->is_admin !== 1) {
        //     $slug =  $this->generateUniqueSlug(
        //         $request->groom_nickname,
        //         $request->bride_nickname,
        //         Auth::id()
        //     );
        // } else {
        //     $slug = 'preview';
        // }

        //call Youtube Function
        $link = $this->extractYouTubeVideoId($request->link);

        //UpdateStory FUnction
        $this->createOrUpdateStory(
            $request,
            $uid,
            $slug,
            $data_states,
        );
        $this->createOrUpdateDataAmplop(
            $request,
            $uid,
            $slug,
            $data_states
        );

        $this->createOrUpdateSong(
            $request,
            $uid,
            $slug,
            $data_states
        );

        // sent data to other function so the data can be stored in database
        $this->createOrUpdateUndangan(
            $request,
            $uid,
            $slug,
            $data_states,
            $link,
            $lat,
            $lng,
        );

        $theme_id = DB::table("users")
            ->where("id", $uid)
            ->value("theme");

        return redirect("dashboard/undangan/$data_states")
            ->with("success", "Data berhasil ditambahkan.");
    }

    public function show(Undangan $undangan, Ucapan $ucapans, $theme = null)
    {
        $currentUrl = url()->current();
        $userId = Auth::id();

        $slug = basename(parse_url($currentUrl, PHP_URL_PATH));
        $uid = DB::table('undangans')->select('id')->where('slug', $slug)->first();

        $theme = DB::table('users')->select('theme')->where('slug', $slug)->first();

        if ($theme != null) {
            $theme = $theme->theme;
        }
        if ($theme == null && $slug != null) {
            $slug =  basename(parse_url(dirname($currentUrl), PHP_URL_PATH));
            $theme = basename(parse_url($currentUrl, PHP_URL_PATH));
            $data_states = DB::table('themes')->select('data_states')->where('slug', $slug)->where('theme_id', $theme)->first();
        }

        if ($theme != 0) {
            $currentUrl = dirname($currentUrl);
            $undangan = Undangan::where('slug', $slug)->where('data_states', $data_states->data_states)->first();
        }
        $undanganDate = DB::table("undangans")
            ->select("akad_date", "resepsi_date")
            ->where("slug", $slug)
            ->first();
        // Mendapatkan tanggal akad dari undanganDate atau menggunakan default jika tidak tersedia
        $akadDateRaw = $undanganDate->akad_date ?? "2023-06-06";

        $receptionDateRaw = $undanganDate->resepsi_date ?? "2023-06-06";
        $akadDay = $this->formatDay($akadDateRaw, "id_ID");
        $akadDate = $this->formatDate($akadDateRaw, "id_ID");

        $receptionDay = $this->formatDay(
            $receptionDateRaw,
            "id_ID"
        );
        $receptionDate = $this->formatDate(
            $receptionDateRaw,
            "id_ID"
        );

        $explodeReception = explode(" ", trim($receptionDate));
        $explodeAkad = explode(" ", $akadDate);

        $ucapans = $this->fetchLatestRecord("ucapans", $slug, 5);
        $stories =  DB::table('stories')->where('slug', $slug)->get();

        $songs = $this->fetchAllRecords("user_songs", $slug, $data_states->data_states);
        $amplops = $this->fetchAllRecords("data_amplops", $slug, $data_states->data_states);
        $images = $this->fetchAllRecords("images", $slug, $data_states->data_states);
        $groomImage = $this->fetchAllRecords("groom_images", $slug, $data_states->data_states);
        $brideImage = $this->fetchAllRecords("bride_images", $slug, $data_states->data_states);
        $coverImage = $this->fetchAllRecords("cover_images", $slug, $data_states->data_states);

        if ($theme != null) {
            $theme_id = (int)$theme;
        }

        return view(
            "dashboard.template.{$theme_id}.index",
            compact(
                "songs",
                "undangan",
                "ucapans",
                "stories",
                "amplops",
                "images",
                "coverImage",
                "brideImage",
                "groomImage",
                "slug",
                "akadDay",
                "akadDate",
                "receptionDay",
                "receptionDate",
                "explodeReception",
                "explodeAkad",
            )
        );
    }
    public function createStates()
    {
        return view(
            "dashboard.undangan.datastates",
        );
    }
    public function storestates(Request $request)
    {
        $validatedData = $request->validate([
            'data_states' => 'required|max:255',
        ]);


        $validatedData['user_id'] = Auth::id();
        $validatedData['slug'] = Auth::user()->slug;

        Undangan::create($validatedData);
        return redirect('/dashboard/undangan')->with('success', 'New Theme has been added');
    }
    public function edit($state)
    {
        return view('dashboard.undangan.edit', [
            'undangan' => $state,
        ]);
    }
    public function updateStates(Request $request, $undangan)
    {
        $validatedData = $request->validate([
            'data_states' => 'required|max:255',
        ]);
        $validatedData['user_id'] = Auth::id();
        $validatedData['slug'] = Auth::user()->slug;


        Undangan::find($request->id);
        Undangan::where('data_states', $undangan)
            ->update($validatedData);

        Story::Where('data_states', $undangan)->update($validatedData);
        DataAmplop::Where('data_states', $undangan)->update($validatedData);
        Theme::Where('data_states', $undangan)->update($validatedData);

        BrideImage::Where('data_states', $undangan)->update($validatedData);

        CoverImage::where('data_states', $undangan)->update($validatedData);

        GroomImage::where('data_states', $undangan)->update($validatedData);

        Images::where('data_states', $undangan)->update($validatedData);

        UserSong::where('data_states', $undangan)->update($validatedData);

        return redirect('/dashboard/undangan')->with('success', 'Data States has been added');
    }

    // public function calendarEvents(Request $request)
    // {

    //     switch ($request->type) {
    //         case 'create':
    //             $event = CrudEvents::create([
    //                 'event_name' => $request->event_name,
    //                 'event_start' => $request->event_start,
    //                 'event_end' => $request->event_end,
    //             ]);

    //             return response()->json($event);
    //             break;

    //         case 'edit':
    //             $event = CrudEvents::find($request->id)->update([
    //                 'event_name' => $request->event_name,
    //                 'event_start' => $request->event_start,
    //                 'event_end' => $request->event_end,
    //             ]);

    //             return response()->json($event);
    //             break;

    //         case 'delete':
    //             $event = CrudEvents::find($request->id)->delete();

    //             return response()->json($event);
    //             break;

    //         default:
    //             # ...
    //             break;
    //     }
    // }

    public function destroy($id)
    {
        $story = Story::find($id);

        if ($story->image_story) {
            Storage::disk('public')->delete($story->image_story);
        }
        $delete = story::destroy($story->id);
        return $delete;
    }

    public function deleteData($id)
    {
        $undangan = undangan::find($id);
        $theme = Theme::where('data_states', $undangan->data_states)->first();

        if ($theme != null) {
            return redirect("dashboard/undangan/$undangan->data_states")
                ->with([
                    "error" => "Data pada Undangan ini masih digunakan",
                ]);
        }

        dd($theme);

        $story = Story::Where('data_states', $undangan->data_states)->get();
        $bride_images = BrideImage::Where('data_states', $undangan->data_states)->first();
        $cover_images = CoverImage::where('data_states', $undangan->data_states)->first();
        $groom_images = GroomImage::where('data_states', $undangan->data_states)->first();
        $gallery = Images::where('data_states', $undangan->data_states)->get();
        $song = UserSong::where('data_states', $undangan->data_states)->first();
        $undangan = Undangan::where('data_states', $undangan->data_states)->first();

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
                if ($stori->image) {
                    Storage::delete($stori->image);
                }
            }
            $storyIds = $story->pluck('id');
            Story::whereIn('id', $storyIds)->delete();
        }

        if ($song != null) {
            if ($song->audio_path) {
                Storage::delete($song->audio_path);
            }
            $song->delete();
        }

        DataAmplop::where('data_states', $undangan->data_states)->delete();
        $undangan = Undangan::find($undangan->id);
        $undangan->delete();


        return redirect()
            ->route("undangan.index")
            ->with([
                "success" => "User berhasil dihapus",
            ]);
    }
}
