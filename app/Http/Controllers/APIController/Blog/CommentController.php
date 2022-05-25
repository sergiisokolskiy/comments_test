<?php

namespace App\Http\Controllers\APIController\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $postId ) {

        $comments = Comment::query()
            ->where('post_id', $postId)
            ->where('parent_id', 0)
            ->with('children')
            ->get();

        return CommentResource::collection($comments);



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $data = $request->validated();

        $comment = Comment::create($data);


        return response([

            'data' => new CommentResource($comment)

        ],Response::HTTP_CREATED);


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $postId, int $commentId)
    {

       $comments = Comment::query() //->findOrFail($commentId);
           ->where('post_id', $postId)
           ->where('id', $commentId)
           ->firstOrFail();

        return new CommentResource($comments);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, int $postId, int $commentId)
    {

        $inputData = $request->validated();

        $comment = Comment::query()
            ->where('post_id', $postId)
            ->where('id', $commentId)
            ->firstOrFail();


            $comment->update($inputData);


        return response(['data' => new CommentResource($comment)], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $postId, int $commentId)
    {

        $comment = Comment::query()
            ->where('post_id', $postId)
            ->where('id', $commentId)
            ->firstOrFail();

        $comment->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}
