@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('api.blog.posts.index') }}"><h2>Главная</h2></a>
                </nav>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <li id="li-comment-{{$comment->id}}" class="comment">
                                <div id="comment-{{$comment->id}}" class="comment-container">
                                    <div class="comment-meta commentmetadata">
                                        <div class="intro">
                                            <div class="commentDate">
                                                {{ is_object($comment->created_at) ? $comment->created_at->format('d.m.Y в H:i') : ''}}
                                            </div>
                                        </div>
                                        <div class="comment-body">
                                            <p>
                                                <a href='{{ route('api.blog.comments.show', ['post'=>$comment->post_id,'comment' => $comment->id]) }}'>
                                                    ID: {{$comment->id}} </a></p>
                                            <span class="border border-2"> {{ $comment->content }} </span>
                                            <p> Parent_id:{{$comment->parent_id}}</p>


                                            {{--    @foreach($item->children as $val)
                                                    <div class="comment-body">
                                                        {{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}}
                                                        <p>ID: {{$val->id}}</p>
                                                        <span class="border border-2"> {{ $val->content }} </span>
                                                        <p> Parent_id:{{$val->parent_id}}</p>
                                                    </div>
                                                @endforeach  --}}
                                        </div>


                                        <ul class="nav justify-content-lg-start">
                                            <li class="nav-item">

                                                {{-- Создание ответа на комментарий --}}
                                                <form method="GET" action="{{-- route('blog.comments.create') --}}">
                                                    @csrf

                                                    {{--  <input name="parent_id"
                                                             type="hidden"
                                                             value="{{ $item->id }}"
                                                             class="form-control">
                                                      <input name="post_id"
                                                             type="hidden"
                                                             value="{{ $post_id }}"
                                                             class="form-control">  --}}

                                                    <button type="submit" class="btn btn-link">Ответить</button>

                                                </form>
                                            </li>

                                            {{-- Редактирование комментария --}}
                                            <li class="nav-item">
                                                <a class="nav-link active"
                                                   href="{{-- route('blog.comments.edit', $item->id) --}}">
                                                    Редактировать</a>
                                            </li>


                                            {{--  Удаление комментария --}}
                                            <li class="nav-item">
                                                {{-- <form method="POST" action="route('blog.comments.destroy', $item->id) ">
                                            @method("DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-link">Удалить</button>
                                        </form>--}}

                                            </li>

                                        </ul>

                                    </div>
                                </div>

                                {{-- @if(isset($item->children))
                                     <ul>
                                         @include('blog.comments.comment',['comments' => $item->children])
                                     </ul>
                                 @endif --}}

                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
