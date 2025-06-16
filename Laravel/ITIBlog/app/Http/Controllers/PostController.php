<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        [
            'id' => 1,
            'title' => 'First Post',
            'description' => 'This is the first post.',
        ],
        [
            'id' => 2,
            'title' => 'Second Post',
            'description' => 'This is the second post.',
        ],
        [
            'id' => 3,
            'title' => 'Third Post',
            'description' => 'This is the third post.',
        ],
    ];

    public function index()
    {
        $posts = $this->posts;
        return view('posts.index', ['posts' => $posts]);
    }
    public function show($id)
    {
        if (!empty($id)) {
            foreach ($this->posts as $post) {
                if ($post['id'] == $id) {
                    return view('posts.post', ['post' => $post]);
                }
            }
        }
        return abort(404, 'Post not found');
    }
}
