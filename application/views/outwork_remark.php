<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-MEDIA外事项目系统</title>
 <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/dist/css/bootstrap.min.css">
<link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/css/pagination.css">

</head>
<body style="padding-top: 50px; ">
<div class="container">
<div class="frame">
<div class="top">
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">E-EMDIA OA系统</a>
         </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
           <!--  <li ><a href="__APP__/Notice/NoticeShow/index">公告</a></li>
            
            <li><a href="__APP__/Staff/StaffIndex/index">员工联系</a></li> -->
          </ul>
            <div id="navlogin" class="navbar-collapse collapse">
          <ul class='nav navbar-nav navbar-right'><li ><p class='navbar-text'>欢迎你，<?php echo $_SESSION["name"];?> - 登录时间：<?php echo $_SESSION["time"];?></p></li><!-- <li><a href='__APP__/AlterPassword/index' >修改密码</a></li> --><li><a href='<?php echo site_url("login"); ?>/logout' >退出</a></li><li></li></ul>
        </div><!--/.navbar-collapse -->
        </div><!-- /.nav-collapse -->
        
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    </div>
    
<div class="main">
<div class="container">
<div class="row">
<div class="page-header">
  <h1>E-MEDIA外事项目管理系统</h1>
</div>

</div>
  <div class="row">
   <div  id="side" class="col-xs-2 list-group">
  
</div>
    <div class="col-xs-10">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"></div>
  <div class="panel-body">
       <div class="row">
       <div class="col-xs-2">
     <select   class=" form-control" id="flaglist">
      <OPTION>全部</OPTION>
     </select>
</div>
   <div class="col-xs-3">
     <input type="text" class=" form-control" id="searchtext" name="searchtext"/>
</div>
<div class="col-xs-2">
     <button type="button" class="btn btn-info" id="searchbutton">搜索</button>
</div>


</div>
  </div>

  <!-- Table -->
  <table id="roleadd" class="table">
  <thead><tr><th width="80">序号</th><th width="150">项目类别</th><th width="150">项目编号</th><th width="150">项目名称</th><th width="100">外事备注</th><th width="200">更新时间</th>
</tr></thead>
  <tbody id="list">
  </tbody>
  </table>
   <div id="Pagination"></div>
</div>
    </div>
    </div>
  </div>
</div>
<div class="footer" align="right">
      </div>
</div>
</div>
  <script src="<?php  echo base_url()."resources/" ?>/dist/js/jquery.js"></script>
   <script src="<?php  echo base_url()."resources/" ?>/dist/js/bootstrap.min.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/js/handlebars.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/js/jquery.pagination.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/js/paging.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/Item/ItemFooter.js"></script>
  <script src="<?php  echo base_url()."resources/" ?>/Item/outworkside.js"></script>
   <script id="entry-template" type="text/x-handlebars-template">
    {{#each listrows}}
<tr>
   <td>{{listid}}<input type="hidden" value={{id}}/></td><td>{{item_flag}}</td><td>{{item_id}}</td><td>{{name}}</td><td>{{remark}}</td><td>{{time}}</td>

</tr>
    {{/each}}
</script>
<script> 
var APP="<?php echo site_url("outwork"); ?>";
var __URL__="<?php echo site_url("outwork"); ?>";
var page=0;
var url=__URL__+"/remarklist";
$(document).ready(function(e){
	  $("#side a").eq(0).removeClass("active");
	    $("#side a").eq(1).addClass("active");
	  panging(page,__URL__+"/remarklist","");
	  $.getJSON(__URL__+"/itemflaglist",function(data){
		  if(data.status==1){
			  for(var i=0;i<data.data.length;i++){
			  $("#flaglist").append("<option>"+data.data[i].name+"</option>");
			  }
		  }else{
			  alert(data.info);
		  }
	  })
	  
	   $("#searchbutton").click(function(){
		   var searchtext=$("#searchtext").val();
			  url=__URL__+"/remarksearch";
			  panging(page,__URL__+"/remarksearch",searchtext);
	   })
	   $("#flaglist").change(function(){
		   var flag=$("#flaglist").val();
		   pege=0;
		   url=__URL__+"/remarkflagselect";
		   panging(page,__URL__+"/remarkflagselect",flag);
	   })
	
})
 
</script>
</body>
</html>