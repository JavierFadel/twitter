<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentConntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = Validator::make($request->all(), [
        //     'comment' => "required|max:255"
        // ]);

        $data = Comment::create([
            'comment' => $request->comment,
            'tweet_id' => $request->post_id,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('tweet.show', ['id' => $request->post_id]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $data = Comment::findOrFail($id)->delete();
        return redirect()->route('tweet.show', ['id' => $request->post_id]);
    }
}
