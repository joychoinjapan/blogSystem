@extends('layout.main')
@section('content')
        <div class="col-sm-8 blog-main">
            <form action="{{asset('/posts')}}" method="POST">
                {{--あるいは{{csrf_field()}}--}}
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>タイトル</label>
                    <input name="title" type="text" class="form-control" placeholder="ここにタイトルを入力してください">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="ここに本文を入力してください"></textarea>
                </div>
               @include('layout.error')
                <button type="submit" class="btn btn-default">投稿</button>
            </form>
            <br>

        </div><!-- /.blog-main -->
@endsection

