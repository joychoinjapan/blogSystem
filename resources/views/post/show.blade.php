@extends('layout.main')
@section('content')
<div class="col-sm-8 blog-main">
            <div class="blog-post">
                <div style="display:inline-flex">
                    <h2 class="blog-post-title">{{$post->title}}</h2>
                    @can('update',$post)
                    <a style="margin: auto"  href="{{asset('/posts')}}/{{$post->id}}/edit">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                    @endcan
                    @can('delete',$post)
                    <a style="margin: auto"  href="{{asset('/posts')}}/{{$post->id}}/delete">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                    @endcan
                </div>
                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} <a href="#">{{$post->user->name}}</a></p>
                 {!!$post->content!!}
                <div>
                    @if($post->zan(\Illuminate\Support\Facades\Auth::id())->exists())
                    <a href="{{asset('/posts')}}/{{$post->id}}/unzan" type="button" class="btn btn-default btn-lg">いいねを取り消す</a>
                    @else
                    <a href="{{asset('/posts')}}/{{$post->id}}/zan" type="button" class="btn btn-primary btn-lg">いいね</a>
                    @endif
                </div>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">コメント</div>

                <!-- List group -->
                <ul class="list-group">
                    @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <h5>{{$comment->created_at}} by {{$comment->user->name}}</h5>
                        <div>
                            {{$comment->content}}
                        </div>
                    </li>
                     @endforeach
                </ul>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">コメントを書く</div>

                <!-- List group -->
                <ul class="list-group">
                    <form action="{{asset('/posts')}}/{{$post->id}}/comment" method="post">
                        {{csrf_field()}}
                        <li class="list-group-item">
                            <textarea name="content" class="form-control" rows="10"></textarea>
                            @include('layout.error')
                            <button class="btn btn-default" type="submit">送信</button>
                        </li>
                    </form>

                </ul>
            </div>

        </div><!-- /.blog-main -->
@endsection