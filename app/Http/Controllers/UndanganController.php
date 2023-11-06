<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Song;
use App\Models\Story;
use App\Models\Images;
use App\Models\Undangan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $date = new DateTime($dateStr);
        setlocale(LC_TIME, $locale);
        $formattedDay = strftime("%A", strtotime($date->format("d F Y")));
        return $formattedDay;
    }

    public function createOrUpdateUndangan($request, $uid, $slug, $link, $lat, $lng)
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

            "resepsi_loc" => $request->resepsi_loc,
            "resepsi_date" => $request->resepsi_date,
            "resepsi_time" => $request->resepsi_time,
            "alamatResepsi" => $request->alamatResepsi,
            "alamatResepsiLengkap" => $request->alamatResepsiLengkap,

            "akad_lat" => $request->akad_lat,
            "akad_lng" => $request->akad_lng,
            "resepsi_lat" => $request->resepsi_lat,
            "resepsi_lng" => $request->resepsi_lng,
            "link" => $link,

            "slug" => $slug,
        ];
        $undangan = Undangan::updateOrCreate(
            ["user_id" => Auth::id()],
            $undanganData
        );

        return $undangan;
    }
    public function createOrUpdateStory($request, $uid, $slug)
    {
        $storyData = ["user_id" => $uid, "slug" => $slug];


        $storyData = $request->validate([
            'title_story' => 'nullable|max:255',
            'tgl_story' => 'nullable',
            'slug' => 'required',
            'description_story' => 'nullable',
            'image_story' => 'image|file|max:5048',
        ]);

        $story = Story::updateOrCreate(
            [
                "user_id" => Auth::id(),
            ],
            $storyData
        );
        return dd($storyData);
        return $story;
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
    public function fetchAllRecords($table, $slug)
    {
        return DB::table($table)
            ->where("slug", $slug)
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
            ->where("user_id", Auth::id())
            ->orderBy("created_at", "desc")
            ->take(20)
            ->get();
    }
    public function index(Undangan $undangans, Story $story)
    {
        // $allowedFieldName = [
        //     "images",
        //     "bride_images",
        //     "groom_images",
        //     "cover_images",
        // ];
        $uid = Auth::id();
        //Get Data Undangan from user_id
        $undangans = DB::table("undangans")
            ->where("user_id", $uid)
            ->latest()
            ->get()
            ->toArray();
        //Get stories with user_id
        $stories = DB::table("stories")
            ->where("user_id", $uid)
            ->get();
        //Get tier with user_id
        $tier = DB::table("users")
            ->where("id", $uid)
            ->value("tier");

        $where = [["user_id", $uid]];
        $edit = false;
        $user = DB::table("users")
            ->where("id", Auth::id())
            ->get();
        $slug = DB::table('undangans')->where("user_id", Auth::id())->value("slug");

        $latestImagesCover = $this->getLatestImages('cover_images');
        $latestImagesGroom = $this->getLatestImages('groom_images');
        $latestImagesBride = $this->getLatestImages('bride_images');
        $latestImages = $this->getLatestImages('images');
        $songs = $this->getLatestImages("songs");
        $data = [
            "user" => $user,
            "slug" => $slug,
            "undangans" => $undangans,
            "stories" => $stories,
            "tier" => $tier,
            "cover_images" => $latestImagesCover,
            "bride_images" => $latestImagesBride,
            "groom_images" => $latestImagesGroom,
            "images" => $latestImages,
            "songs" => $songs
        ];

        return view("dashboard.undangan.index", $data);
    }

    public function store(Request $request, Undangan $undangan, Images $images, Song $song)
    {
        dd($request);
        // Get latitude and longitude from the request
        $lat = $request->lat;
        $lng = $request->lng;


        // Comment/Delete the lines below when getting lat and lng from the form.
        $uid = Auth::id();

        $slug = $this->generateUniqueSlug(
            $request->groom_nickname,
            $request->bride_nickname,
            Auth::id()
        );

        $link = $this->extractYouTubeVideoId($request->link);
        // sent data to other function so the data can be stored in database

        $undangan = $this->createOrUpdateUndangan(
            $request,
            $uid,
            $slug,
            $link,
            $lat,
            $lng
        );

        $theme_id = DB::table("users")
            ->where("id", $uid)
            ->value("theme");

        return redirect()
            ->route("undangan.index")
            ->with("success", "Data berhasil ditambahkan.");
    }

    public function show(Undangan $undangan, Ucapan $ucapans)
    {
        $currentUrl = url()->current();
        $userId = Auth::id();
        $slug = basename(parse_url($currentUrl, PHP_URL_PATH));
        $undanganDate = DB::table("undangans")
            ->select("akad_date", "reception_date")
            ->where("slug", $slug)
            ->first();

        $akadDateRaw = $undanganDate->akad_date !== "" ? $undanganDate->akad_date : "2023-06-06";
        $receptionDateRaw = $undanganDate->reception_date !== "" ? $undanganDate->akad_date : "2023-06-06";
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

        $ucapans = $this->fetchLatestRecord("ucapans", $slug, null);
        $stories = $this->fetchLatestRecord("stories", $slug, 1);

        $songs = $this->fetchLatestRecord("songs", $slug, 1);
        $images = $this->fetchAllRecords("images", $slug);
        $groomImage = $this->fetchAllRecords("groom_images", $slug);
        $brideImage = $this->fetchAllRecords("bride_images", $slug);
        $coverImage = $this->fetchAllRecords("cover_images", $slug);
        $theme_id = DB::table("users")
            ->where("id", $undangan->user_id)
            ->value("theme");
        return view(
            "dashboard.theme.{$theme_id}.index",
            compact(
                "songs",
                "undangan",
                "ucapans",
                "stories",
                "images",
                "coverImage",
                "brideImage",
                "groomImage",
                "slug",
                "akadDay",
                "akadDate",
                "receptionDay",
                "receptionDate"
            )
        );
    }
}
