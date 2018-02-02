@extends('layout.main')
@section('content')
        <div class="col-sm-8 blog-main">
            <form action="{{asset('/posts')}}/{{$post->id}}" method="POST">
                {{method_field("PUT")}}
                {{csrf_field()}}
                <div class="form-group">
                    <label>标题1</label>
                    <input name="title" type="text" class="form-control" placeholder="ここはタイトルです" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label>内容1</label>
                    <textarea id="content" name="content" class="form-control" style="height:400px;max-height:500px;"  placeholder="ここは内容です">{{$post->content}}</textarea>
                    @include('layout.error')
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </form>
            <br>
        </div><!-- /.blog-main -->

@endsection

