<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $username = $request->get('username');
        $title = $request->get('title');
        $description = $request->get('description');
        $address = $request->get('address');
        $animal_id = $request->get('animal_id');
        
        $post->username = $username;
        $post->title = $title;
        $post->description = $description;
        $post->address = $address;
        $post->address = $animal_id;
        $post->save();
        $post->refresh();

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    public function showOwnerPost(String $username)
    {
        $user = User::where('username', $username)->first();
        Log::info($user);
        return $user->all_posts;
    }
    

    public function showWithAnimalTypeFilter(String $animal_type)
    {
        $animals = collect(Animal::where('animal_type', $animal_type)->get('id')->toArray());
        $animals->transform(function (array $item) {
            return $item['id'];
        });
        $posts = Post::whereIn('animal_id', $animals)->get();
        return $posts;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $address = $request->get('address');
        $animal_id = $request->get('animal_id');

        $post->title = $title;
        $post->description = $description;
        $post->address = $address;
        $post->address = $animal_id;
        $post->save();
        $post->refresh();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
