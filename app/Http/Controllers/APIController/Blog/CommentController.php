<?php

namespace App\Http\Controllers\APIController\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;


class CommentController extends Controller
{

    public function index(int $postId): AnonymousResourceCollection|\Illuminate\Http\Response
    {
        $comments = Comment::query()
            ->where('post_id', $postId)
            ->where('parent_id', 0)
            ->with('children')
            ->get();

        if (empty(collect($comments)->all())) {
            return response(null, Response::HTTP_NOT_FOUND);
        } else {
            return CommentResource::collection($comments);
        }

    }

    public function store(CommentRequest $request): \Illuminate\Http\Response|Application|ResponseFactory
    {
        $data = $request->validated();
        $comment = Comment::create($data);

        return response([

            'data' => new CommentResource($comment),

        ], Response::HTTP_CREATED);
    }

    public function show(int $postId, int $commentId): CommentResource
    {
        $comment = Comment::query()
            ->where('post_id', $postId)
            ->where('id', $commentId)
            ->firstOrFail();

        return new CommentResource($comment);
    }

    public function update(CommentRequest $request, int $postId, int $commentId): \Illuminate\Http\Response|Application|ResponseFactory
    {
        $inputData = $request->validated();

        $comment = Comment::query()
            ->where('post_id', $postId)
            ->where('id', $commentId)
            ->firstOrFail();


        $comment->update($inputData);


        return response(['data' => new CommentResource($comment)], Response::HTTP_CREATED);
    }

    public function destroy(int $postId, int $commentId): \Illuminate\Http\Response|Application|ResponseFactory
    {
        $comment = Comment::query()
            ->where('post_id', $postId)
            ->where('id', $commentId)
            ->firstOrFail();

        $comment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
