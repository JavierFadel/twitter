<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.tweet-create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.tweet-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request['image_url'] != NULL) {
            $extension = $request['image_url']->extension();
            $strname = strtolower(str_replace(' ', '', Auth::id()));
            $fileName = bcrypt($request->image_url);
            $picture_name = $fileName.'.'.$extension;

            // Store file.
            $request->image_url->storeAs('public/images/', $picture_name);

            // Generate file path, creating instance.
            $data = Tweet::create([
                'user_id' => Auth::id(),
                'content' => $request['content'],
                'image_url' => Storage::url('images/'.$picture_name)
            ]);
            return redirect('dashboard');
        } else {
            $data = Tweet::create([
                'user_id' => Auth::id(),
                'content' => $request['content'],
            ]);
            return redirect('dashboard');
        }

        return view('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tweet = Tweet::findOrFail($id);
        $comments = DB::table('comments')->where('tweet_id', $id)->get();

        return view('page.tweet-show', compact('tweet', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tweet = Tweet::findOrFail($id);
        return view('page.tweet-edit', compact('tweet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // $data = Tweet::findOrFail($id);

        $data = Tweet::findOrFail($request->id)->update([
            'content' => $request->content
        ]);

        return redirect()->route('tweet.show', ['id' => $request->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tweet::findOrFail($id)->delete();
        return redirect('dashboard');   
    }
}
