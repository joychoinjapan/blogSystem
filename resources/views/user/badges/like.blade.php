
@if($target_user->id != \Illuminate\Support\Facades\Auth::id())
<div>
    @if(\Illuminate\Support\Facades\Auth::user()->hasStar($target_user->id))
        <button class="btn btn-default like-button" like-value=1 like-user="{{$target_user->id}}" type="button">いいねを取り消す</button>
    @else
        <button class="btn btn-default like-button" like-value=0 like-user="{{$target_user->id}}" type="button">いいね</button>
    @endif
</div>
    @endif