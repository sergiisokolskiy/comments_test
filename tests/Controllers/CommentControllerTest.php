<?php

namespace Tests\Controllers;

use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Comment;
use Carbon\Carbon;

class CommentControllerTest extends TestCase
{

    use WithFaker;

    // INDEX

    public function testIndexReturnsDataInValidFormat()
    {
        $postId = 1;

        $this->json('GET', "api/v1/blog/posts/$postId/comments")
            ->assertStatus(Response::HTTP_OK)  //озвращаемый ответ должен иметь указанный код состояния HTTP

            ->assertJsonStructure( //Метод assertJson утверждает, что ответ имеет переданную структуру JSON
                [
                    'data' => [
                        '*' => [  // ставим, когда объект содержит в ответе массивы объектов
                            'id',
                            'content',
                            'post_id',
                            'parent_id',
                            //'published_at',
                            'children',
                        ],
                    ],
                ]
            );
    }

    // STORE

    public function testCommentIsCreatedSuccessfully()
    {
        $postId = rand(1, 2);
        $dataLoading = [
            'content' => $this->faker->sentence(rand(1, 15), true),
            'parent_id' => rand(1, 22),
            'post_id' => $postId,
        ];
        $this->json('post', "api/v1/blog/posts/$postId/comments", $dataLoading)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(
                [
                    'data' => [
                        'id',
                        'content',
                        'parent_id',
                        'post_id',
                    ],
                ]
            );
        $this->assertDatabaseHas('comments', $dataLoading);
    }

    // SHOW
    public function testCommentIsShownCorrectly()
    {
        $postId = rand(1, 2);

        $comment = Comment::create(
            [
                'content' => $this->faker->sentence(rand(1, 15), true),
                'parent_id' => rand(0, 40),
                'post_id' => $postId,
            ]
        );

        $this->json('get', "api/v1/blog/posts/$postId/comments/$comment->id")
            ->assertStatus(Response::HTTP_OK)
            ->assertExactJson([
                'data' => [
                        'id' => $comment->id,
                        'content' => $comment->content,
                        'parent_id' => $comment->parent_id,
                        'post_id' => $comment->post_id,
                        'created_at' => $comment->created_at,
                        'children' => [],
                ]
            ]);
    }

    //DESTROY
    public function testCommentIsDestroyed()
    {
        $postId = rand(1, 2);
        $commentData = [
            'content' => $this->faker->sentence(rand(1, 15), true),
            'parent_id' => rand(0, 40),
            'post_id' => $postId,
        ];

        $comment = Comment::create(
            $commentData
        );

        $this->json('delete', "api/v1/blog/posts/$postId/comments/$comment->id")
            ->assertNoContent(); //Утверждает, что ответ имеет код 204 состояния HTTP – no content
        $this->assertDatabaseMissing('comments', $commentData); // проверяем, удален ли коммент из базы
    }

    //UPDATE

    public function testUpdateCommentReturnsCorrectData()
    {
        $postId = rand(1, 2);
        $parentId = rand(0, 40);

        $comment = Comment::create(
            [
                'content' => $this->faker->sentence(rand(1, 15), true),
                'parent_id' => $parentId,
                'post_id' => $postId,
            ]
        );


        $newData = [
            'content' => $this->faker->sentence(rand(1, 15), true),
        ];

        $this->json('PUT', "api/v1/blog/posts/$postId/comments/$comment->id", $newData)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertExactJson(
                [
                    'data' => [
                        'id' => $comment->id,
                        'content' => $newData['content'],
                        'parent_id' => $comment->parent_id,
                        'post_id' => $comment->post_id,
                        'created_at' => $comment->created_at,
                        'children' => [],
                    ],
                ]
            );
    }


    // Тест: когда комментарий отсутствует

    //SHOW
    public function testShowForMissingComment()
    {
        $postId = 2;
        $commentId = 1;
        $this->json('get', "api/v1/blog/posts/$postId/comments/$commentId")
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testUpdateForMissingComment()
    {
        $postId = 2;
        $commentId = 1;

        $updData = [
            'content' => $this->faker->sentence(rand(1, 15), true),
        ];

        $this->json('put', "api/v1/blog/posts/$postId/comments/$commentId", $updData)
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testDestroyForMissingComment()
    {
        $postId = 2;
        $commentId = 1;

        $this->json('delete', "api/v1/blog/posts/$postId/comments/$commentId")
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }

    // Тест: запрос, отправленный в STORE функцию, не содержит некоторых необходимых данных

    public function testStoreWithMissingData()
    {
        $postId = rand(1, 2);
        $dataLoading = [
            'parent_id' => rand(1, 22),
            'post_id' => $postId,
            //content is missing
        ];
        $this->json('post', "api/v1/blog/posts/$postId/comments", $dataLoading)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

}
