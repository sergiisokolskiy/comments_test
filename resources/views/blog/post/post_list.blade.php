@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th><h3>Заголовок</h3></th>
                                <th>Дата публикации:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $item)
                            <tr>
                                <td> <a href="{{route('api.blog.posts.show', $item->id )}}">
                                        <h3>{{$item->title}}</h3>
                                     </a>
                                </td>
                                <td>
                                    <i>{{$item->created_at}}</i>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
