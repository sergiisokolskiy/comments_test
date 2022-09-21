@foreach($comments as $item)

    <li id="li-comment-{{$item->id}}" class="comment">
        <div id="comment-{{$item->id}}" class="comment-container">
            <div class="comment-meta commentmetadata">
                <div class="intro">
                    <div class="commentDate">
                        {{ is_object($item->created_at) ? $item->created_at->format('d.m.Y в H:i') : ''}}
                    </div>
                </div>
                <div class="comment-body">
                    <p><a href='{{ route('api.blog.comments.show', ['post'=>$item->post_id,'comment' => $item->id]) }}'>
                            ID: {{$item->id}} </a></p>
                    <span class="border border-2"> {{ $item->content }} </span>
                    <p> Parent_id:{{$item->parent_id}}</p>
                </div>


                <ul class="nav justify-content-lg-start">
                    <li class="nav-item">

                        {{-- CREATE an anwswer to comment --}}
                        <form method="GET" action=" route('blog.comments.create') ">
                            @csrf

                            <input name="parent_id"
                                   type="hidden"
                                   value="{{ $item->id }}"
                                   class="form-control">
                            <input name="post_id"
                                   type="hidden"
                                   value="{{ $post_id }}"
                                   class="form-control">

                            <button type="submit" class="btn btn-link">Ответить</button>

                        </form>
                    </li>

                    {{-- EDIT comment --}}
                    <li class="nav-item">
                        <a class="nav-link active" href=" route('blog.comments.edit', $item->id) ">
                            Редактировать</a>
                    </li>


                    {{--  DELETE comment --}}
                    <li class="nav-item">
                        <form method="POST" action="route('blog.comments.destroy', $item->id) ">
                            @method("DELETE')
                            @csrf
                            <button type="submit" class="btn btn-link">Удалить</button>
                        </form>

                    </li>

                </ul>

            </div>
        </div>

        @if(isset($item->children))
            <ul>
                @include('blog.comments.comment',['comments' => $item->children])
            </ul>
        @endif

    </li>
@endforeach
