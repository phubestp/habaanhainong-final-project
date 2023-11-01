<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Animal;

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
        $title = $request->string('title');
        $description = $request->string('description');
        $address = $request->string('address');
        $animal_id = $request->string('animal_id');

        $post->title = $title;
        $post->description = $description;
        $post->address = $address;
        $post->address = $animal_id;
        $post->save();
        $post->refresh();

        $animal = Animal::find($post->animal_id);

        return [
            'post' => $post,
            'animal' => $animal
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $animal = Animal::find($post->animal_id);
        return [
            'post' => $post,
            'animal' => $animal
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $title = $request->string('title');
        $description = $request->string('description');
        $address = $request->string('address');
        $animal_id = $request->string('animal_id');

        $post->title = $title;
        $post->description = $description;
        $post->address = $address;
        $post->address = $animal_id;
        $post->save();
        $post->refresh();

        $animal = Animal::find($post->animal_id);

        return [
            'post' => $post,
            'animal' => $animal
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
