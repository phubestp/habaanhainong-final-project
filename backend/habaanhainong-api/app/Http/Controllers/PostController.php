<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Animal;
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

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
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
