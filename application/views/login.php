<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>项目管理系统</title>
<link rel="stylesheet"  type="text/css" href="<?php  echo base_url();?>resources/dist/css/bootstrap.min.css">
<link rel="stylesheet"  type="text/css" href="<?php  echo base_url();?>resources/css/main.css">
</head>
<body style="padding-top: 50px; ">
<div class="container">
      <form class="form-signin" role="form" id="LoginForm" method="post">
        <h2 class="form-signin-heading">项目管理登录</h2>
        <input type="text" class="form-control" name="username" id="username" placeholder="用户名" required autofocus>
        <input type="password" class="form-control" name="password" id="password" placeholder="密码" required>
<!--       <input type="text" name="verify" class="form-control" id="verify" placeholder="验证码" required>  
         <img id="verify" alt="验证码" onClick="show()" src="__URL__/verify"><a href="javascript:show()">看不清楚</a> -->
        <button class="btn btn-lg btn-primary btn-block" id="login_btn" type="button">登录</button>
      </form>
    </div> <!-- /container -->
       <!-- 跳转选择窗口 -->
<div class="modal fade"  id="upview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3  class="classname modal-title">你拥有以下系统权限，选择进入</h3>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">   
  <table class="table">
  <tbody id="list">
  </tbody>
  </table>
  
   </div>
      </div>
      <div class="modal-footer">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="<?php  echo base_url();?>resources//dist/js/jquery.js"></script>
 <script src="<?php  echo base_url();?>resources//dist/js/bootstrap.min.js"></script>
 <script type="text/javascript">
 var __URL__="<?php echo site_url("login"); ?>"; 
   $("body").keydown(function() {
             if (event.keyCode=="13") {
                 $('#login_btn').click();
             }
    });
 $(document).ready(function(e) {
 $("#login_btn").click(function(){
       $.post(__URL__+"/checkLogin",$("#LoginForm").serialize(),function(data){
              if(data.status==0)
              {
                alert(data.info);
              }else
              {
                if(data.data instanceof Array)
                {
                    for(var i=0;i<data.data.length;i++){
                      $("#list").append('<tr><td><a class="btn btn-lg btn-primary btn-block" href="'+data.data[i]["like"]+'">'+data.data[i]["name"]+'</a></td></tr>');
                    }
                    $("#upview").modal("show");
                }else{
                window.location.href=data.data;
                }
              }
       },"json")
       })
})
 </script>
</body>
</html>
