<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
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
        $request->validate([
            'comment' => ['required'],
            'user_id' => ['required'],
            'post_id' => ['required'],
        ]);
        // dd($request);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->parent_id = $request->parent_id;
        $comment->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)
            ->with('user:id,name',
                'comments.user:id,name',
                'comments.replies.user:id,name',
                'comments.replies.replies.user:id,name')
            ->first();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
