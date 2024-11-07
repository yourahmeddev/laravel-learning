<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //listing all posts in tabl
        $posts = Post::withTrashed()->paginate(10);
        return view('posts.index')->with('posts', $posts);
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
    public function store(CreateRequest $request)
    {
        //storing data in database now
        Post::create([
            'title' => $request->title,
            'user_id'=>1,
            'description' => $request->description,
            'is_publish' => $request->is_publish,
            'is_active' => $request->is_active
        ]);
        $request->session()->flash('alert-success', 'Post Created Successfully');
        return to_route('posts.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //showing indiviual post data
        $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // edit the data of post from database
        $post = Post::findOrFail($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'is_publish' => 'required',
            'is_active' => 'required'
        ]);
        //updating data from database
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_publish' => $request->is_publish,
            'is_active' => $request->is_active
        ]);
        $request->session()->flash('alert-info', 'Post Updated Sucessfully');

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //delete the post
        $post = Post::findOrFail($id);
        $post->delete();
        $request->session()->flash('alert-danger', 'Post Deleted Sucessfully');
        return to_route('posts.index');
    }
    // undo post function in laravel 
    public function softDelete(Request $request, $id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        if ($post) {
            $post->update([
                'deleted_at' => null
            ]);
            // session updation after post undo
            $request->session()->flash('alert-message', 'Post Restored Successfully');
            return to_route('posts.index');
        }
    }
    // learning Query Buider in laravel
    public function queryBuilder()
{
    // $post = DB::table('posts')->find(3);

    // abort_if(!$post, 404, 'Post not found');

    // return $post;
    // using raw sql in laravel
    $post = DB::select('select * from posts where id = ?', [3]);
    return $post;
}

}
