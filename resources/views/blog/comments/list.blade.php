<!doctype html>
@extends('layouts.app')
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <style>
        article:not(:last-child) {
            padding-bottom: 10px;
            border-bottom: 2px dotted orange;
        }
    </style>
</head>
<body>

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
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="maindata" role="tabpanel">
                            <form method="GET" action="{{-- route('blog.comments.create') --}}">

                                @csrf

                                  {{--  <input name="post_id"
                                           type="hidden"
                                           value="{{ $post_id }}"
                                           class="form-control">
                                    <input name="parent_id"
                                           type="hidden"
                                           value="{{ $parent_id = NULL }}"
                                           class="form-control"> --}}
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-primary">Новый комментарий</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <br>
                    @php /** @var  \App\Models\Comment $comments */  @endphp

                    <posts>
                        @foreach($comments as $val)
                            <article>

                                <p> <a href="{{route('api.blog.comments.show', $val->id )}}"> ID: {{$val->id}} </a></p>
                                <p> Parent_Id: {{$val->parent_id}}</p>

                                <p> {{$val->content}} </p>

                                <i>Дата создания: {{$val->created_at}}</i>


                                @forelse ($val->children as $item)
                                    @include('blog.comments.comment', ['item' => $item])

                                @endforelse




                                <br>
                            {{--    <form method="GET" action="{{ route('blog.comments.create') }}">
                                    @csrf

                                    <input name="parent_id"
                                           type="hidden"
                                           value="{{ $item->id }}"
                                           class="form-control">
                                    <input name="post_id"
                                           type="hidden"
                                           value="{{ $post_id }}"
                                           class="form-control">

                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-link">Ответить</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                &nbsp;&nbsp;
                                <a href="{{ route('blog.comments.edit', $item->id) }}">
                                    <i> Редактировать </i>
                                </a>
                                <form method="POST" action="{{route('blog.comments.destroy', $item->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-link">Удалить</button>
                                </form>  --}}

                            </article>
                       {{-- @empty
                            <p>Здесь пока ничего нет.</p> --}}
                        @endforeach

                        @csrf
                    </posts>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>
