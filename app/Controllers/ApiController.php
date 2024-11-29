<?php

namespace App\Controllers;

use Core\Controller;

class ApiController extends Controller {
    public function __construct() {
        header('Content-Type: application/json');
    }

    public function getPosts() {
        $posts = [
            ['id' => 1, 'title' => 'Post 1', 'content' => 'Content of post 1'],
            ['id' => 2, 'title' => 'Post 2', 'content' => 'Content of post 2']
        ];

        echo json_encode($posts);
    }

    public function createPost() {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->title) && isset($data->content)) {
            $newPost = [
                'id' => 3,
                'title' => $data->title,
                'content' => $data->content
            ];

            echo json_encode(['message' => 'Post created', 'post' => $newPost]);
        } else {
            echo json_encode(['error' => 'Missing title or content']);
        }
    }

    public function updatePost($id) {
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->title) && isset($data->content)) {
            $updatedPost = [
                'id' => $id,
                'title' => $data->title,
                'content' => $data->content
            ];

            echo json_encode(['message' => 'Post updated', 'post' => $updatedPost]);
        } else {
            echo json_encode(['error' => 'Missing title or content']);
        }
    }

    public function deletePost($id) {
        echo json_encode(['message' => 'Post deleted', 'id' => $id]);
    }
}


/*
Example:

	GET /api/posts
		Responses:
		[
			{"id": 1, "title": "Post 1", "content": "Content of post 1"},
			{"id": 2, "title": "Post 2", "content": "Content of post 2"}
		]
		
	POST /api/posts
		Request body: { "title": "New Post", "content": "This is a new post" }
		Responses:
		{
			"message": "Post created",
			"post": {
				"id": 3,
				"title": "New Post",
				"content": "This is a new post"
			}
		}
	
	PUT /api/posts/1 (id)
		Request body: { "title": "Updated Post", "content": "Updated content" }
		Responses:
		{
			"message": "Post updated",
			"post": {
				"id": 1,
				"title": "Updated Post",
				"content": "Updated content"
			}
		}

	DELETE /api/posts/1 (id)
		Responses:
		{
			"message": "Post deleted",
			"id": 1
		}
*/