<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Emedia OA 系统</title>
 <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/dist/css/bootstrap.min.css">
<link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/css/pagination.css">
   <link rel="stylesheet" href="<?php  echo base_url()."resources/" ?>/jqwidgets/styles/jqx.base.css" type="text/css" />
 <style>
.error{
	color:red;
}</style>
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
             <!--  <li ><a href="__APP__/Item/ProductionItem">项目管理</a></li>
            <li><a href="__APP__/Item/ProductionItemManage">项目管理-行政</a></li>    
            <li ><a href="__APP__/Customer/CustomerManage">客户管理</a></li>
            <li><a href="__APP__/WorkReport/ProductionReport/index">报告管理</a></li>
            <li><a href="__APP__/Meeting/MeetingManage">会议管理</a></li>       -->      </ul>
            <div id="navlogin" class="navbar-collapse collapse">
          <ul class='nav navbar-nav navbar-right'><li ><p class='navbar-text'>欢迎你，<?php echo $_SESSION["name"];?> - 登录时间：<?php echo $_SESSION["time"];?></p></li><!--  --><li><a href='<?php echo site_url("login"); ?>/logout' >退出</a></li><li></li></ul>
        </div><!--/.navbar-collapse -->
        </div><!-- /.nav-collapse -->
        
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    </div>
    
<div class="main">
<div class="container">
<div class="row">
<div class="page-header">
  <h1>E-MEDIA项目管理系统——制作部</h1>
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
    <div class="col-xs-3">
     <input type="text" class="name form-control" id="searchtext" name="number"/>
</div>
<div class="col-xs-1">
     <button type="button" class="btn btn-info" id="searchbutton">搜索</button>
</div>
<div class="col-xs-1">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addview">新增</button>
</div>

</div>
  </div>

  <!-- Table -->
  <table  class="table">
  <thead><tr><th width="200">序</th><th width="200">工作类型名称</th><th width="200">编号</th>
  <th width="250" >操作</th></tr></thead>
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
<!-- 修改类型名称窗口 -->
<div class="modal fade"  id="upview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
     <form  class="form-horizontal" role="form" id="upform">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3  class="classname modal-title">编辑工作类型</h3>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">   
  <table class="table">
  <tbody id="list">
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">类型名称：</label>
    <div class="col-xs-8">
    <input type="hidden" class=" form-control " id="classid"name="id"/>
     <input type="text" class="form-control " name="name" id="name"/>
</div>
</div>
  </td></tr>
  <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">编号：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control " name="prefix" id="prefix"/>
</div>
</div>
  </td></tr>
  </tbody>
  </table>
  
   </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" id="up">更新</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- 修改类型名称窗口 -->
<div class="modal fade"  id="addview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
     <form  class="form-horizontal" role="form" id="addform">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3  class="classname modal-title">新增工作类型</h3>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">   
  <table class="table">
  <tbody id="list">
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">类型名称：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control " name="name" id="add_name"/>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">编号：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control " name="prefix" id="add_prefix"/>
</div>
</div>
  </td></tr>
  </tbody>
  </table>
   </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" id="add">新增</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <script src="<?php  echo base_url()."resources/" ?>/dist/js/jquery.js"></script>
   <script src="<?php  echo base_url()."resources/" ?>/dist/js/bootstrap.min.js"></script>
     <script src="<?php  echo base_url()."resources/" ?>/js/jquery.validate.js"></script>
   <script src="<?php  echo base_url()."resources/" ?>/js/jquery.pagination.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/js/handlebars.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/js/paging.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/Item/productionmanageside.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/Item/ItemFooter.js"></script>
  <script id="entry-template" type="text/x-handlebars-template">
  {{#each listrows}}
<tr>
   <td>{{listid}}</td><td>{{name}}</td><td>{{prefix}}</td><td >
<div class="btn-group">
  <button type="button" data="{{id}}" data-name="{{name}}" data-prefix="{{prefix}}" class="btn btn-default up" data-toggle="modal" data-target="#upview">修改</button>
<button type="button" data="{{id}}" data-name="{{name}}"  class="btn btn-default delete" >删除</button>
</div>
</td>
</tr>
    {{/each}}
</script>
<script>
var page=0;
var APP="<?php echo site_url("productionmanage"); ?>";
var __URL__="<?php echo site_url("productionmanage"); ?>";
var url=__URL__+"/itemPrefixList";


$(document).ready(function(e) {
	$("#side a").eq(0).removeClass("active");
  $("#side a").eq(2).addClass("active");
	var key=location.search;
	if(key!="")
  {
		page=key.substr(5);
  }
	 panging(page,__URL__+"/itemPrefixList","");
	 $("#up").click(function(){
    if($("#name").val()=="")
            {
            alert("请输入类别名称！");
            }else if($("#prefix").val()==""){
              alert("请输入编号！");
            }else{
            
			 $.post(__URL__+"/productionItemPrefixup",$("#upform").serialize(),function(data){
				   if(data.status==1){
					   alert(data.info);
					   $("#upview").modal("hide");
					   panging(page,__URL__+"/itemPrefixList","");
				   }else{
					   alert(data.info);
				   }
			   },"JSON")
      }
      
      })
	
		
		$("#add").click(function(){
        	if($("#add_name").val()=="")
        		{
        		alert("请输入类别名称！");
        		}else if($("#add_prefix").val()==""){
              alert("请输入编号！");
            }else{
        	$.post(__URL__+"/productionItemPrefixAdd",$("#addform").serialize(),function(data){
        		   if(data.status==1)
        			   {
        			   alert(data.info);
        			   $("#addform")[0].reset();
        			   panging(page,__URL__+"/itemPrefixList","");
        			   }else{			  
        					   alert(data.info);
        			   }
        	},"JSON")
        	}
        })
		 $("#list").on("click",".up",function(e){
       var id=$(this).attr("data");
        $("#classid").val($(this).attr("data"));
          $("#name").val($(this).attr("data-name"));
          $("#prefix").val($(this).attr("data-prefix")); 
      $.getJSON(__URL__+"/productionItemPrefixinfo",{id:id},function(data){
               if(data.status==0){
                   $("#prefix").attr("disabled","disabled");
               }else{
                 $("#prefix").removeAttr("disabled");
               }
      })
		 })
		  $("#list").on("click",".delete",function(e){
			  if(confirm("确认要删除？")){
			 var id=$(this).attr("data")
			var name=$(this).attr("data-name"); 
			$.getJSON(__URL__+"/itemPrefixDelete",{id:id,name:name},function(data){
				if(data.status==1){

					alert(data.info);
             panging(page,__URL__+"/itemPrefixList","");
				}else{
					alert(data.info);
				}
			})}
		 	   
		 })
		 $("#searchbutton").click(function(){
			  var searchtext=$("#searchtext").val();
			  panging(page,__URL__+"/productionitemPrefixSearch",searchtext);
		 })
})</script>
</body>
</html>