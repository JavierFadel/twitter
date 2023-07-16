<?php

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

function getPostAuthor($id) 
{
    return User::findOrFail($id)->username;
}

function getPostAuthorName($id)
{
    return User::findOrFail($id)->name;
}

function getPostAuthorImage($id)
{
    $url = URL::to("/storage/") . '/' . User::findOrFail($id)->profile_photo_path;
    return $url;
}

function getComments($id)
{
    return Comment::where('tweet_id', $id);
}

function convertDateToTime($date)
{
	return date('D, H:i A', strtotime($date));
}

function convertToTime($date)
{
    return date('h:i A', strtotime($date));
}
