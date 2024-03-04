<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function showCreatePost()
    {
        return view('create-post');
    }

    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            "title" => "required",
            "body" => "required"
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $newPost = Post::create($incomingFields);
        return redirect("/posts/{$newPost->id}")->with('success', 'Post Created Successfully');
    }

    public function showSinglePost(Post $post)
    {
        $post['body'] = strip_tags(Str::markdown($post->body), '<p><ul><ol><li><strong><em><h1><h2><h3><h4><h5><h6><br>');
        return view('single-post', ["post" => $post]);
    }
}
