<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //GET /posts/get
    public function getAll(){
        return response()->json(['is_success' => true, 'message' => 'PostController[getAll]: Posts all', 'data' => Post::all()]);
    }

    //GET /post/get/id/{id}
    public function getFromId($id){
        return response()->json(['is_success' => true, 'message' => 'PostController[getFromId]: Post found', 'data' => Post::find($id)]);
    }

    //GET /posts/get/author/{user_id}
    public function getPostsByAuthor($user_id){
        return response()->json(['is_success' => true, 'message' => 'PostController[getPostsByUser]: Posts found', 'data' => Post::where('author', $user_id)->get()]);
    }

    //GET /posts/get/animal/{animal_id}
    public function getPostsByAnimal($animal_id){
        return response()->json(['is_success' => true, 'message' => 'PostController[getPostsByAnimal]: Posts found', 'data' => Post::where('animal_id', $animal_id)->get()]);
    }

    //GET /posts/get/animal-type/{type}
    public function getPostsByAnimalType($type){
        $animal_type = AnimalType::where('type', $type)->first();
        if(!$animal_type){
            return response()->json(['is_success' => false, 'message' => 'PostController[getPostsByAnimalType]: Animal type not found', 'data' => ""]);
        }
        $animals_by_type = Animal::where('animal_type_id', $animal_type->id)->get();
        $posts = [];
        foreach($animals_by_type as $animal){
            $posts = array_merge($posts, Post::where('animal_id', $animal->id)->get()->toArray());
        }

        return response()->json(['is_success' => true, 'message' => 'PostController[getPostsByAnimalType]: Posts found', 'data' => $posts]);
    }

    //GET /posts/get/followed-by/{user_id}
    public function getPostsFollowedByUser($user_id){
        $user = User::find($user_id);
        if(!$user){
            return response()->json(['is_success' => false, 'message' => 'PostController[getPostsFollowedByUser]: User not found', 'data' => ""]);
        }
        $posts = [];
        foreach($user->follows as $follow){
            $posts = array_merge($posts, Post::where('id', $follow->post)->get()->toArray());
        }
        return response()->json(['is_success' => true, 'message' => 'PostController[getPostsFollowedByUser]: Posts found', 'data' => $posts]);
    }

    //POST /posts/add
    public function add(Request $request){
        //verify that the post data is present
        $validatedData = $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'animal_id' => 'required',
        ]);

        //verify that the animal exists
        $animal = Animal::find($request->get('animal_id'));
        if(!$animal){
            return response()->json(['is_success' => false, 'message' => 'PostController[add]: Animal not found', 'data' => ""]);
        }

        //verify that the author exists
        $author = User::find($request->get('author_id'));
        if(!$author){
            return response()->json(['is_success' => false, 'message' => 'PostController[add]: Author not found', 'data' => ""]);
        }

        //create the post
        $post = new Post();
        $post->title = $request->get('title');
        $post->author = $request->get('author');
        $post->animal_id = $request->get('animal_id');
        $post->save();

        return response()->json(['is_success' => true, 'message' => 'PostController[add]: Post added', 'data' => $post]);
    }

    //PUT /posts/save/{id}
    public function saveWithId(Request $request, Post $post){
        //verify that the post data is present
        $validatedData = $request->validate([
            'title' => 'required',
            'author_id' => 'required',
            'animal_id' => 'required',
        ]);

        //verify that the animal exists
        $animal = Animal::find($request->get('animal_id'));
        if(!$animal){
            return response()->json(['is_success' => false, 'message' => 'PostController[saveWithId]: Animal not found', 'data' => ""]);
        }

        //verify that the author exists
        $author = User::find($request->get('author_id'));
        if(!$author){
            return response()->json(['is_success' => false, 'message' => 'PostController[saveWithId]: Author not found', 'data' => ""]);
        }

        //update the post
        $post->title = $request->get('title');
        $post->author = $request->get('author');
        $post->animal_id = $request->get('animal_id');
        $post->save();

        return response()->json(['is_success' => true, 'message' => 'PostController[saveWithId]: Post updated', 'data' => $post]);
    }

    //PUT /posts/save
    public function save(Request $request){
        //verify that the post data is present
        $validatedData = $request->validate([
            'id' => 'required',
            'title' => 'required',
            'author_id' => 'required',
            'animal_id' => 'required',
        ]);

        //verify that the animal exists
        $animal = Animal::find($request->get('animal_id'));
        if(!$animal){
            return response()->json(['is_success' => false, 'message' => 'PostController[save]: Animal not found', 'data' => ""]);
        }

        //verify that the author exists
        $author = User::find($request->get('author_id'));
        if(!$author){
            return response()->json(['is_success' => false, 'message' => 'PostController[save]: Author not found', 'data' => ""]);
        }

        //update the post
        $post = Post::find($request->get('id'));
        $post->title = $request->get('title');
        $post->author = $request->get('author');
        $post->animal_id = $request->get('animal_id');
        $post->save();

        return response()->json(['is_success' => true, 'message' => 'PostController[save]: Post updated', 'data' => $post]);
    }

    //DELETE /posts/delete/{id}
    public function deleteWithId(Post $post){
        $post->delete();
        return response()->json(['is_success' => true, 'message' => 'PostController[deleteWithId]: Post deleted', 'data' => ""]);
    }

    //DELETE /posts/delete
    public function delete(Request $request){
        //verify that the post data is present
        $validatedData = $request->validate([
            'id' => 'required',
        ]);

        //delete the post
        $post = Post::find($request->get('id'));
        $post->delete();
        return response()->json(['is_success' => true, 'message' => 'PostController[delete]: Post deleted', 'data' => ""]);
    }

}
