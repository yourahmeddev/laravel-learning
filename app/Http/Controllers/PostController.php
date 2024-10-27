<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //listing all posts in table
        $posts = Post::all();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // opening create file
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //storing data in database now
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'is_publish'=>'required',
            'is_active'=>'required'
        ]);
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_publish'=>$request->is_publish,
            'is_active'=>$request->is_active
        ]);
        $request->session()->flash('alert-success', 'Post Saved Successfully');
        return to_route('posts.create');
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
    public function destroy(string $id)
    {
        //
    }
}
