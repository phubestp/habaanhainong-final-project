<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    //GET /post-images/get
    public function getAll()
    {
        return PostImage::all();
    }

    //GET /post-image/get/id/{id}
    public function getFromId($id)
    {
        return PostImage::find($id);
    }

    //GET /post-images/get/post/{post_id}
    public function getPostImagesByPost($post_id)
    {
        return PostImage::where('post_id', $post_id)->get();
    }

    //POST /post-images/add
    public function add(Request $request)
    {
        //verify that the post image data is present
        $validatedData = $request->validate([
            'post_id' => 'required',
            'file_extension' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post_id'));
        if (!$post) {
            return null;
        }

        //create the post image
        $postImage = PostImage::create([
            'post_id' => $request->get('post_id'),
            'file_extension' => $request->get('file_extension'),
        ]);

        return $postImage;
    }

    //POST /post-images/add-test
    public function addTest(Request $request)
    {
        //verify that the post image data is present
        $validatedData = $request->validate([
            'file_extension' => 'required',
        ]);

        //create the post image
        $postImage = PostImage::create([
            'file_extension' => $request->get('file_extension'),
        ]);

        return null;
    }

    //PUT /post-images/save/{id}
    public function saveWithId(Request $request, $id)
    {
        //verify that the post image data is present
        $validatedData = $request->validate([
            'post_id' => 'required',
            'file_extension' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post_id'));
        if (!$post) {
            return null;
        }

        //verify that the post image exists
        $postImage = PostImage::find($id);
        if (!$postImage) {
            return null;
        }

        //update the post image
        $postImage->post_id = $request->get('post_id');
        $postImage->file_extension = $request->get('file_extension');
        $postImage->save();

        return $postImage;
    }

    //PUT /post-images/save
    public function save(Request $request)
    {
        //verify that the post image data is present
        $validatedData = $request->validate([
            'id' => 'required',
            'post_id' => 'required',
            'file_extension' => 'required',
        ]);

        //verify that the post exists
        $post = Post::find($request->get('post_id'));
        if (!$post) {
            return null;
        }

        //verify that the post image exists
        $postImage = PostImage::find($request->get('id'));
        if (!$postImage) {
            return null;
        }

        //update the post image
        $postImage->post_id = $request->get('post_id');
        $postImage->file_extension = $request->get('file_extension');
        $postImage->save();

        return $postImage;
    }

    //DELETE /post-images/delete/{id}
    public function deleteWithId($id)
    {
        //verify that the post image exists
        $postImage = PostImage::find($id);
        if (!$postImage) {
            return null;
        }

        //delete the post image
        $postImage->delete();

        return $postImage;
    }

    //DELETE /post-images/delete
    public function delete(Request $request)
    {
        //verify that the post image exists
        $postImage = PostImage::find($request->get('id'));
        if (!$postImage) {
            return null;
        }

        //delete the post image
        $postImage->delete();

        return $postImage;
    }
}
