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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="maindata" role="tabpanel">
                               <form method="GET" action="{{-- route('api.blog.comments.create') --}}">

                                    @csrf

                                     <input name="post_id"
                                            type="hidden"
                                            value="{{ $post_id }}"
                                            class="form-control">
                                     <input name="parent_id"
                                            type="hidden"
                                            value="{{ $parent_id = NULL }}"
                                            class="form-control">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <button type="submit" class="btn btn-primary">Новый комментарий</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


                                @php /** @var  \App\Models\Comment $comments */  @endphp
                                <posts>
                                    <div id="comments">
                                        <ol>
                                            @if(isset($comments))
                                                    @include('blog.comments.comment', ['$comments' => $comments])
                                            @else
                                                <p>Здесь пока ничего нет.</p>
                                            @endif

                                            @csrf
                                        </ol>
                                    </div>
                                </posts>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
