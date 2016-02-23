$(document).ready(function(e) {
    $("#login").click(function(){
		  $.get(URL+"/navlogin",$("#loginform").serialize(),function(data){
		        if(data!="")
				{
					$("#navlogin").html(" <ul class='nav navbar-nav navbar-right'><li ><p class='navbar-text'>欢迎登录</p></li><li><a href='#'>About</a></li><li><a href='"+URL+"/logout' >退出</a></li><li></li></ul>");
					}
		        })
		})
		$("#logout").click(function(){
		$.get(URL+"/logout",$("#loginform").serialize(),function(data){})
		})
}); 