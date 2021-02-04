
$(".login-user input").blur(function(){
    userJudge();
    console.log(111);
})


$(".search-box-button .search-button").click(function(){
    // $ajax
    console.log(111);
})

function userJudge(){
    var user = $(".login-user>input").val();
    var reg = /^(\D)\w{5,11}$/;
    if(user=""){

    }else {
        if(reg.test(user)){

        }else{
            $(".tips-user").html("用户名有误").css("color","red");
        }
    }
}