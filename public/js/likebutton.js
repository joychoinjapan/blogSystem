$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var url = location.href;
var index=url.indexOf("user");
var newUrl=url.substr(0,index-1);



$(".like-button").click(function (event) {
    var target=$(event.target);
    var current_like=target.attr('like-value');
    var user_id=target.attr('like-user');
    if(current_like==1){
        $.ajax({
            url:newUrl+"/user/"+user_id+"/unfan",
            method:"POST",
            dataType:"json",
            success:function (data) {
                if(data.error!=0){
                    alert(data.msg);
                    return;
                }
                target.attr("like-value",0);
                target.text("お気に入り登録")
            }

        })
    }else{
        $.ajax({
            contentType:"application/x-www-form-urlencoded",
            url:newUrl+"/user/"+user_id+"/fan",
            method:"POST",
            dataType:"json",
            success:function (data) {
                if(data.error!=0){
                    alert(data.msg);
                    return;
                }
                target.attr("like-value",1);
                target.text("フォローを取り消す")
            }

        })

    }

});