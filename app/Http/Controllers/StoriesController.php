<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoriesController extends Controller
{
    public function submitForm(Request $request)
    {
        if ($request->file('stories')) {
            if ($request->oldImage[0]) {
                Storage::disk('public')->delete($request->oldImage[0]);
            }
            $validatedData['image_story'] = $request->file('stories')->store('undangan-images', 'public');
        }
        $form = Story::where('id', $request->id)
            ->update($validatedData);
        return response()->json($form);
    }
    public function destroy(Request $request)
    {
        $image = $request->get("image");
        $item = DB::table('stories')->where('image_story', '=', $image)->first();
        try {
            if ($image) {
                Storage::disk('public')->delete($item->image_story);
            }
            $validatedData['image_story'] = null;
            Story::where('image_story', '=', $image)->update($validatedData);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        return response()->json(200);
    }


    public function deleteStory(Request $request)
    {
        $title_story = $request->title_stories;
        $tgl_story = $request->tgl_stories;
        $description_story = $request->description_stories;
        $image_story = $request->file('images');
        $oldImage = $request->oldImage;

        $data = Story::where('slug', $slug)->get();

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
                ];
                // Update records directly without using a loop
                Story::where('id', $data[$index]->id)->update($validateData);
            }

        if ($request->title_story != '') {
            $storyData = $request->validate([
                'title_story' => 'nullable|max:255',
                'tgl_story' => 'nullable',
                'slug' => '',
                'description_story' => 'nullable',
                'image_story' => 'image|file',
            ]);

            // dd($storyData['title_story'], $request->title_story);

            foreach ($request->title_story as $index => $title) {
                $validated["title_story"] = $storyData['title_story'][$index];
                $validated["tgl_story"] = $storyData['tgl_story'][$index];
                $validated["description_story"] = $storyData['description_story'][$index];

                if (isset($request->file('image_story')[$index])) {
                    $validated['image_story'] = $request->file('image_story')[$index]->store('undangan-images', 'public');
                }
                $validated["user_id"] = $uid;
                $validated["slug"] = $slug;

                // Use updateOrCreate for simplicity
                $story = Story::Create($validated);
            }
        }



        // if ($request->file('image_story')) {
        //     $storyData['image_story'] = $request->file('image_story')->store('story-images', 'public');
        // }
    }
}
