<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>E-MEDIA外事项目管理系统</title>
 <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/dist/css/bootstrap.min.css">
<link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/css/pagination.css">
   <link rel="stylesheet" href="<?php  echo base_url()."resources/" ?>/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/css/jquery-ui-1.10.3.custom.min.css">
 <style>
.error{
	color:red;
}
 #contactsview{
	 left:730px;
      width:600px;
 	height:380px;
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
             </ul>
            <div id="navlogin" class="navbar-collapse collapse">
          <ul class='nav navbar-nav navbar-right'><li ><p class='navbar-text'>欢迎你，<?php echo $_SESSION["name"];?> - 登录时间：<?php echo $_SESSION["time"];?></p></li><!-- <li><a href='#' >修改密码</a></li> --><li><a href='<?php echo site_url("login"); ?>/logout' >退出</a></li><li></li></ul>
        </div><!--/.navbar-collapse -->
        </div><!-- /.nav-collapse -->
        
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    </div>
<div class="main">
<div class="container">
<div class="row">
<div class="page-header">
  <h1>E-MEDIA项目管理系统——外事</h1>
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
     <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#addview">新增</button>
</div>

</div>
  </div>

  <!-- Table -->
  <table  class="table">
  <thead><tr><th width="50">序</th><th width="100">项目编号</th><th width="200">合同到期日</th><th width="500">项目名称</th>
  <th width="350" align="right"></th></tr></thead>
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
  <div class="modal-dialog" style="width:650px;" >
    <div class="modal-content">
     <form  class="form-horizontal" role="form" id="productionform">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3  class="classname modal-title">编辑项目</h3>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
  <!-- Default panel contents -->
  <!-- <div class="panel-heading">编辑项目</div> -->
   
  <table id="roleadd" class="table">
  <tbody id="list">
  <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目编号：</label>
    <div class="col-xs-8">
     <input type="hidden" id="hidenid" name="id"/>
     <label  class="control-label" id="itemid"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">类别：</label>
    <div class="col-xs-8">
     <select class="form-control " name="item_flag" id="item_flag"></select>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目名称：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control " name="name" id="name"/>
</div>
</div>
  </td></tr>
  <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">合同到期日：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control " name="expiretime" id="expiretime"/>
</div>
</div>
  </td></tr>
      <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">行政备注：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control" id="adminremark" name="adminremark" />
</div>
</div>
  </td></tr>
  <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目状态：</label>
    <div class="col-xs-8">
<label class="radio-inline">
  <input type="radio" id="status" name="status" value="1" checked> 进行中
</label>
<label class="radio-inline">
  <input type="radio" id="status2" name="status" value="0"> 结束
</label>
</div>
</div>
  </td></tr>
  </tbody>
  </table>
   </div>
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-default" id="up">更新</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- 新增窗口 -->
<div class="modal fade"  id="addview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:650px;" >
    <div class="modal-content">
     <form  class="form-horizontal" role="form" id="addproductionform">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3  class="classname modal-title">新增项目</h3>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
   
  <table id="roleadd" class="table">
  <tbody id="list">
  <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目编号：</label>
    <div class="col-xs-8">
     <input type="hidden" class=" form-control " id="id" name="id"/>
     <label  class="control-label"id="number"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">类别：</label>
    <div class="col-xs-8">
     <select class="form-control " name="item_flag" id="add_item_flag"></select>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目名称：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control " name="name" id="add_name"/>
</div>
</div>
  </td></tr>

  <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">合同到期日：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control " name="expiretime" id="add_expiretime"/>
</div>
</div>
  </td></tr>

  </tbody>
  </table>
   </div>
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-default" id="add">新增</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- 查看信息窗口 -->
<div class="modal fade"  id="infoview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog" style="width:750;" >
  
    <div class="modal-content">
     <form  class="form-horizontal" role="form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3  class="classname modal-title">制作项目信息</h3>
        <input type="hidden" id="id"/>
      </div>
      <div class="modal-body">
     
      <div class="panel panel-default">
  <!-- Default panel contents -->
  <table class="table">
  <tbody id="list">
  <!--  //批量新增功能
  <tr><td>
   <div class="from-gruop">
   <div class="col-xs-1">
   <input type="text" class=" form-control input-sm" name="count" id="count"/></div>
   <button type="button" class="btn btn-default btn-sm" id="addrow">添加一栏</button>
  </div>
  </td></tr>
  -->
  <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目编号：</label>
    <div class="col-xs-9">
    
     <label  class="control-label itemid" ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">类别：</label>
    <div class="col-xs-9">
     <label  class="control-label item_flag" ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目名称：</label>
    <div class="col-xs-9">
     <label class="control-label name"  ></label>
</div>
</div>
  </td></tr>
    
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">合同到期日：</label>
    <div class="col-xs-9">
      <label class="control-label expiretime"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">详细资料：</label>
    <div class="col-xs-9">
      <label class="control-label contents"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">外事备注：</label>
    <div class="col-xs-9">
  
      <label class="control-label remark"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">行政备注：</label>
    <div class="col-xs-9">
    
      <label class="control-label adminremark"  ></label>
</div>
</div>
  </td></tr>
   <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目状态：</label>
    <div class="col-xs-9">
      <label class="control-label status"  ></label>
</div>
</div>
  </td></tr>
  </tbody>
  </table>
  
   </div>
      </div>
      <div class="modal-footer">
    
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
       <script src="<?php  echo base_url()."resources/" ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/js/handlebars.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/js/paging.js"></script>
  <script  src="<?php  echo base_url()."resources/" ?>/js/jqxcore.js"></script>
<script  src="<?php  echo base_url()."resources/" ?>/js/jqxbuttons.js"></script>
<script  src="<?php  echo base_url()."resources/" ?>/js/jqxscrollbar.js"></script>
<script  src="<?php  echo base_url()."resources/" ?>/js/jqxlistbox.js"></script>
<script  src="<?php  echo base_url()."resources/" ?>/js/jqxcombobox.js"></script>
<script src="<?php  echo base_url()."resources/" ?>/Item/ItemFooter.js"></script>
<script src="<?php  echo base_url()."resources/" ?>/Item/outworkmanageside.js"></script>
  <script id="entry-template" type="text/x-handlebars-template">
  {{#each listrows}}
<tr>
   <td>{{listid}}</td><td>{{id}}</td><td>{{expiretime}}</td><td><a href="#" data="{{id}}" data-name="{{name}}" class="iteminfo">{{name}}</a></td><td align="right">
<div class="btn-group">
  <button type="button" data="{{id}}" data-name="{{name}}"  class="btn btn-default up" data-toggle="modal" data-target="#upview">修改</button>
</div>
</td>
</tr>
    {{/each}}
</script>
<script>
var page=0;
var APP="<?php echo site_url("outworkmanage"); ?>";
var __URL__="<?php echo site_url("outworkmanage"); ?>";
var url=__URL__+"/index";

$(document).ready(function(e) {
	var key=location.search;
	if(key!="")
  {
		page=key.substr(5);
  }
	panging(page,__URL__+"/index","");
	$('#starttime').datepicker();
 	$("#starttime").datepicker("option", "dateFormat", "yy-mm-dd");
 	$('#expiretime').datepicker();
	$("#expiretime").datepicker("option", "dateFormat", "yy-mm-dd");
	$('#add_starttime').datepicker();
 	$("#add_starttime").datepicker("option", "dateFormat", "yy-mm-dd");
 	$('#add_expiretime').datepicker();
	$("#add_expiretime").datepicker("option", "dateFormat", "yy-mm-dd");
	$("#list").on("click",".iteminfo",function(e){
		var id=$(this).attr("data");
		var itemid=$(".itemid").text();
		$("#contactsview").hide();
		   $.getJSON(__URL__+"/outworkItemInfo",{id:id},function(data){
			   $("#hidenid").val(data.data[1]);
			   $(".itemid").text(data.data[0].id);
	 		   $(".item_flag").text(data.data[0].item_flag);
	 		   $(".name").text(data.data[0].name);
	 			$(".expiretime").text((data.data[0].expiretime=="0000-00-00"?" ":data.data[0].expiretime));
	 			$(".contacts").text(data.data[0].contacts);
	 			$(".remark").text((data.data[0].remark==null?"-":data.data[0].remark));
	 			$(".adminremark").text((data.data[0].adminremark=="0000-00-00"?" ":data.data[0].adminremark));
        $(".status").text((data.data[0].status=="1"?" 进行中":"已结束"));
	 			//$('.bs-example-popover').popover('show')
		   })
	
		$("#infoview").modal('toggle');
	})
	$.getJSON(__URL__+"/itemClassInfo",function(data){
		   if(data.status==1){
			   $("#number").text(data.data[2]);
   			$("#id").val(data.data[1]);
			 for(var i=0;i<data.data[0].length;i++){
				 $("#item_flag").append("<option>"+data.data[0][i].name+"</option>");
				 $("#add_item_flag").append("<option>"+data.data[0][i].name+"</option>");
			 }
		   }
	})
	$("#addproductionform").validate({
		rules:{
			name:{required:true},
			expiretime:{date:true}
		},messages:{
			name:{required:"请输入项目名称"}	,
			expiretime:{date:"请输入正确的时间"}
		},submitHandler: function(form) {
			 $.post(__URL__+"/outworkItemAdd",$("#addproductionform").serialize(),function(data){
				   if(data.status==1){
					   alert(data.info);
        			   $("#addproductionform")[0].reset();
        			   $("#add_client_name").text("");
        			   $.getJSON(__URL__+"/itemClassInfo",function(data){
        				   if(data.status==1){
        					   $("#number").text(data.data[2]);
        		   			$("#id").val(data.data[1]);
        				   }
        			})
					   if($("#searchtext").val()==""){
							 panging(page,__URL__+"/index","");
						 }else{
							 var searchtext=$("#searchtext").val();
							 panging(page,__URL__+"/index",searchtext);
						 }
				   }else{
					   alert("新增失败");
				   }
			   },"JSON")
		},
		 invalidHandler: function(form, validator) {  //不通过回调
		       return false;
		          }
		})
		$("#productionform").validate({
		rules:{
			 name:{required:true},
      expiretime:{date:true}
		},messages:{
			name:{required:"请输入项目名称"}  ,
      expiretime:{date:"请输入正确的时间"}
		},submitHandler: function(form) {
			 $.post(__URL__+"/outworkItemup",$("#productionform").serialize(),function(data){
				   if(data.status==1){
					   alert(data.info);
					   $("#upview").modal("hide");
					   panging(page,__URL__+"/index","");
				   }else{
					   alert("更新失败");
				   }
			   },"JSON")
		},
		 invalidHandler: function(form, validator) {  //不通过回调
		       return false;
		          }
		})
		 $("#list").on("click",".up",function(e){
			 var id=$(this).attr("data");
		 	   $.getJSON(__URL__+"/itemInfo",{id:id},function(data){
		 		   if(data.status=1){
		 			$(".contacts").val(data.data[0].contacts);
		 			  $("#hidenid").val(data.data[1]); 
		 			 $("#itemid").text(data.data[0].id);
		 			 $("#item_flag").val(data.data[0].item_flag);
		 			 $("#name").val(data.data[0].name);
		 			$("#adminremark").val(data.data[0].adminremark);
		 			$("#expiretime").val((data.data[0].expiretime=="0000-00-00"?" ":data.data[0].expiretime));
          if(data.data[0].status==0){
          $("#status2").attr("checked");
           }
		 		   }
		 	   })
		 })
		 $("#searchbutton").click(function(){
			  var searchtext=$("#searchtext").val();
			  panging(page,__URL__+"/outworkItemSearch",searchtext);
		 })
		
})</script>
</body>
</html>