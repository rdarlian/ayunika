<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Images;
use App\Models\BrideImage;
use App\Models\CoverImage;
use App\Models\GroomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FileUploadController extends Controller
{
    /**
     * Show the dropzone file upload view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dropzoneUi()
    {
        return view("dashboard.test");
    }

    /**
     * Get the corresponding model class based on the field name.
     *
     * @param string $fieldName
     * @return mixed|null
     */
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

    /**
     * Upload a single file to Cloudinary and update the database.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $fieldName
     * @param int $uid
     * @param string $slug
     * @param int $fileSize
     * @return void
     */
    private function uploadFileSingular($file, $fieldName, $uid, $slug, $fileSize)
    {
        $result = CloudinaryStorage::upload(
            $file->getRealPath(),
            $file->getClientOriginalName()
        );

        $modelClass = $this->getModelClass($fieldName);
        $modelClass::updateOrCreate(
            [
                "user_id" => Auth::id(),
            ],
            [
                "user_id" => $uid,
                $fieldName => $result,
                "filesize" => "111111", // You might want to change this value based on the actual file size.
                "slug" => $slug,
            ]
        );
    }

    /**
     * Handle the dropzone file upload request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function dropzoneFileUpload(Request $request)
    {

        // Define the list of allowed fields and their corresponding model classes
        $uid = Auth::id();
        $slug = DB::table('undangans')->where("user_id", Auth::id())->value("slug");
        $allowedFields = [
            "bride_images" => BrideImage::class,
            "groom_images" => GroomImage::class,
            "cover_images" => CoverImage::class,
        ];

        // Get the user's tier to determine the allowed number of images
        $tier = DB::table("users")
            ->where("id", $uid)
            ->value("tier");

        // Set of rules for uploading images
        $rules = [
            "images.*" => "image|max:10240", // Each image file should be an image and have a maximum size of 10MB.
            "images" => "max:10", // Maximum of 10 image files by default.
        ];

        $messages = [
            "images.max" => "Hanya bisa mengupload sampai :max foto", // Custom error message when exceeding the maximum number of images.
        ];

        if ($tier === 3) {
            $rules["images"] = "max:20"; // If the user's tier is 3, allow a maximum of 20 image files instead of the default.
        }

        // Use the Validator to validate the request data
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // If validation fails, redirect back with the validation errors and the input data.
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        if ($request->hasFile("songs")) {
            $file = $request->file("songs");
            $audioPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $audioTitle = $file->getClientOriginalName();
            $uploadedFile = Cloudinary::upload($audioPath, [
                "resource_type" => "video",
                "folder" => "audio_uploads",
                "resource_type" => "auto",
                "overwrite" => true,
            ]);

            $audioUrl = $uploadedFile->getSecurePath();

            return Song::updateOrCreate(
                [
                    "user_id" => Auth::id(),
                ],
                [
                    "judul" => $audioTitle,
                    "songs" => $audioUrl,
                    "slug" => $slug,
                ]
            );
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            if (!empty($files)) {
                // Take a maximum number of files based on the user's tier
                $files = collect($files)->take($tier === 3 ? 20 : 10);

                foreach ($files as $file) {
                    // Upload the file using the uploadFile method
                    $fileSize = $file->getSize();
                    $result = CloudinaryStorage::upload(
                        $file->getRealPath(),
                        $file->getClientOriginalName()
                    );
                    $uid = Auth::id();
                    Images::create([
                        "user_id" => $uid,
                        "images" => $result,
                        "slug" => $slug,
                    ]);

                    $latestImages = DB::table("images")
                        ->select("images") // Add 'filesize' to the select statement
                        ->where("user_id", Auth::id())
                        ->orderBy("created_at", "desc")
                        ->take(20)
                        ->get();

                    return response()->json([
                        "success" => true,
                        "result" => $result,
                        "latest" => $latestImages,
                    ]);
                }
            }
        }

        // Handle the other allowed fields (bride_images, groom_images, cover_images)
        foreach ($allowedFields as $fieldName => $modelClass) {
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $fileSize = $file->getSize();

                $result = CloudinaryStorage::upload(
                    $file->getRealPath(),
                    $file->getClientOriginalName()
                );


                $modelClass = $this->getModelClass($fieldName);

                $modelClass::updateOrCreate(
                    [
                        "user_id" => $uid,
                    ],
                    [
                        "images" => $result,
                        "user_id" => $uid,
                        $fieldName => $result,
                        "slug" => $slug,

                    ]
                );

                $latestImages = DB::table($fieldName)
                    ->select("images") // Add 'filesize' to the select statement
                    ->where("user_id", Auth::id())
                    ->orderBy("created_at", "desc")
                    ->take(20)
                    ->get();


                return response()->json([
                    // "success" => true,
                    "result" => $result,
                    "latest" => $latestImages,
                ]);
            }
        }
    }

    /**
     * Delete the uploaded file.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function fileDestroy(Request $request)
    {
        $filename = $request->get("filename");
        $name = $request->get("name");
        $fieldName = $request->get("fieldName");
        try {
            $response = Cloudinary::destroy($filename);
            $image = DB::table($fieldName)->where('images', '=', $name);
            // If the deletion is successful, the API response will contain 'result' => 'ok'
            if ($response['result'] === 'ok' && $image->exists()) {
                $image->delete();
                return response()->json(['message' => 'Image has been successfully removed!']);
            } elseif ($image->doesntExist()) {
                return response()->json(['error' => 'Data not found in the database.']);
            } else {
                return response()->json(['error' => 'Failed to remove image.']);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json($filename, 200);
    }
    public function destroyMultiple(Request $request)
    {
    }
}
