<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Emedia OA 系统</title>
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
}
</style>
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
           
           <!--   <li ><a href="__APP__/Item/ProductionItem">项目管理</a></li>
            <li><a href="__APP__/Item/ProductionItemManage">项目管理-行政</a></li>    
            <li ><a href="__APP__/Customer/CustomerManage">客户管理</a></li>
            <li><a href="__APP__/WorkReport/ProductionReport/index">报告管理</a></li>
            <li><a href="__APP__/Meeting/MeetingManage">会议管理</a></li>    -->      </ul>
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
  <h1>E-MEDIA项目管理系统——制作部</h1>
</div>

</div>
  <div class="row">
    <div class="col-xs-12">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"></div>
  <div class="panel-body">
<div class="row">
     <div class="col-xs-2" style="display:none;">
                   <select style="display:none;"class="form-control" id="select"><option value="1"></option></select>
                   </div>
                    <div class="col-xs-3">
                   <div class="input-group">
  <input type="text" class="name form-control" id="searchtext" name="number"/>
  <span class="input-group-btn">  <button type="button" class="btn btn-info" id="searchbutton">搜索</button></span>
</div> </div>

<div class="col-xs-1">
     <a class="btn btn-info" href="<?php echo site_url("production"); ?>/generalTable">总表</a>
</div>
</div>
  </div>

  <!-- Table -->
  <table  class="table">
  <thead><tr><th width="50">序</th><th width="100">项目编号</th><th width="100">开始日期</th>
  <th width="600">项目名称</th><th width="250" align="right"></th></tr></thead>
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
    <div class="col-xs-8">
     <input type="hidden" id="hidenid" name="id"/>
     <label  class="control-label" id="id2"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">类别：</label>
    <div class="col-xs-8">
     <label  class="control-label" id="class_name"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目名称：</label>
    <div class="col-xs-8">
     <label  class="control-label" id="name"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">客户：</label>
    <div class="col-xs-8">
  <label  class="control-label" id="client"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">联系人：</label>
    <div class="col-xs-8">
    <label  class="control-label" id="contacts"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">开始时间：</label>
    <div class="col-xs-8">
    <label  class="control-label" id="start_time"></label>
    
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">完成时间：</label>
    <div class="col-xs-8">
     <label  class="control-label" id="end_time"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">报价金额：</label>
    <div class="col-xs-8">
     <label  class="control-label" id="quote"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">第三方：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control" id="third_party" name="third_party" />
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">增值：</label>
    <div class="col-xs-8">
     <input type="hidden" class="form-control appreciation" name="appreciation" />
      <label  class="control-label" id="appreciation"></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">成本计算：</label>
    <div class="col-xs-8">
     <input type="text" class="form-control " id="costing_time" name="costing_time" />
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">收款日期：</label>
    <div class="col-xs-8">
     <input type="text" class=" form-control " id="gathering_time" name="gathering_time" />
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
<!-- 查看信息窗口 -->
<div class="modal fade"  id="infoview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog" style="width:750;" >
  
    <div class="modal-content">
     <form  class="form-horizontal" role="form" id="form">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3  class="classname modal-title">制作项目信息</h3>
        <input type="hidden" id="id"/>
      </div>
      <div class="modal-body">
     
      <div class="panel panel-default">
  <!-- Default panel contents -->
  
        <!-- 联系人信息弹出框 -->
 <div class="bs-example bs-example-popover" >
      <div class="popover right" id="contactsview" style="max-width:500px;">
        <div class="arrow"></div>
        <h3 class="popover-title"style="text-align: center;font-weight:bold;" id="title"></h3>
        <div class="popover-content">
        <table width="500" height="300">
        <tr><td>
         <div class="from-gruop">
    <label  class="col-xs-3 control-label">手机：</label>
    <div class="col-xs-7">
    <label  class=" control-label phone"></label>
</div>
</div>
</td></tr> <tr><td>
<div class="from-gruop">
    <label  class="col-xs-3 control-label">电邮：</label>
    <div class="col-xs-9">
    <label  class="control-label email"></label>
</div>
</div></td></tr> <tr><td>
<div class="from-gruop">
    <label  class="col-xs-3 control-label">公司名称：</label>
    <div class="col-xs-9">
    <label  class=" control-label company_name"></label>
</div>
</div></td></tr> <tr><td>
<div class="from-gruop">
    <label  class="col-xs-3 control-label">公司电话：</label>
    <div class="col-xs-9">
    <label  class=" control-label company_phone"></label>
    </div>
</div></td></tr> <tr><td>
<div class="from-gruop">
    <label  class="col-xs-3 control-label">网站：</label>
      <div class="col-xs-9">
    <label  class=" control-label website"></label>
    </div>
</div></td></tr> <tr><td>
<div class="from-gruop">
    <label  class="col-xs-3 control-label">地址：</label>
      <div class="col-xs-9">
    <label  class=" control-label address"></label>
    </div>
</div></td></tr> <tr><td>
<div class="from-gruop">
    <label  class="col-xs-3 control-label">备注：</label>
      <div class="col-xs-9">
    <label  class=" control-label remark" ></label>
    </div>
</div></td></tr></table>
        </div>
      </div>
      </div>
  <table id="roleadd" class="table">
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
    <label  class="col-xs-3 control-label">工作编号：</label>
    <div class="col-xs-8">
    
     <label  class="control-label itemid" ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">类别：</label>
    <div class="col-xs-8">
     <label  class="control-label class_name" ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">项目名称：</label>
    <div class="col-xs-8">
     <label class="control-label name"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">客户：</label>
    <div class="col-xs-8">
    <label class="control-label client"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">联系人：</label>
    <div class="col-xs-8">
    <label class="control-label contacts"  ><a id='a2'  href='#' ></a></label>  
      
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">开始时间：</label>
    <div class="col-xs-8">
      <label class="control-label start_time"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">完成时间：</label>
    <div class="col-xs-8">
      <label class="control-label end_time"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">报价金额：</label>
    <div class="col-xs-8">

      <label class="control-label quote"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">第三方：</label>
    <div class="col-xs-8">
  
      <label class="control-label third_party"  ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">增值：</label>
    <div class="col-xs-8">
    
      <label class="control-label appreciation"  ></label>
</div>
</div>
  </td></tr>
      <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">成本计算：</label>
    <div class="col-xs-8">
     <label class="control-label costing_time" ></label>
</div>
</div>
  </td></tr>
    <tr><td>
  <div class="from-gruop">
    <label  class="col-xs-3 control-label">收款日期：</label>
    <div class="col-xs-8">
      <label class="control-label gathering_time"  ></label>
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
 <script src="<?php  echo base_url()."resources/" ?>/js/handlebars.js"></script>
 <script  src="<?php  echo base_url()."resources/" ?>/js/jqxcore.js"></script>
<script  src="<?php  echo base_url()."resources/" ?>/js/jqxbuttons.js"></script>
<script  src="<?php  echo base_url()."resources/" ?>/js/jqxscrollbar.js"></script>
<script  src="<?php  echo base_url()."resources/" ?>/js/jqxlistbox.js"></script>
<script  src="<?php  echo base_url()."resources/" ?>/js/jqxcombobox.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/js/paging.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/Item/ItemFooter.js"></script>
     <script src="<?php  echo base_url()."resources/" ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script id="entry-template" type="text/x-handlebars-template">
  {{#each listrows}}
<tr>
   <td>{{listid}}</td><td>{{id}}</td><td>{{start_time}}</td><td><a href="#" data="{{id}}" data-name="{{name}}" class="iteminfo">{{name}}</a></td><td align="right">
<div class="btn-group">
  <button type="button" data="{{id}}" data-name="{{name}}"  class="btn btn-default up" data-toggle="modal" data-target="#upview">修改</button>
</div>
</td>
</tr>
    {{/each}}
</script>
<script>
var page=0;
var APP="<?php echo site_url("production"); ?>";
var __URL__="<?php echo site_url("production"); ?>";
var url=__URL__+"/index";
$(document).ready(function(e) {
	var key=location.search;
	if(key!="")
  {
		page=key.substr(5);
  }
	$('#gathering_time').datepicker();
	$("#gathering_time").datepicker("option", "dateFormat", "yy-mm-dd");
	$('#costing_time').datepicker();
	$("#costing_time").datepicker("option", "dateFormat", "yy-mm-dd");
  
 var prefix_id=$("#select").val();
  panging(page,__URL__+"/index",prefix_id);
	$("#productionform").validate({
		rules:{
			quote:{number:true},
			third_party:{number:true},
			appreciation:{number:true}
		},messages:{
			quote:{number:"请输入正确的数字"},
			third_party:{number:"请输入正确的数字"},
			appreciation:{number:"请输入正确的数字"}
		},submitHandler: function(form) {
			 $.post(__URL__+"/upProductionItem",$("#productionform").serialize(),function(data){
				   if(data.status==1){
					   alert(data.info);
					   $("#upview").modal("hide");
						 if($("#searchtext").val()==""){
							 panging(page,__URL__+"/index",prefix_id);
						 }else{
				var searchtext=$("#searchtext").val();
        var  select=$("#select option:selected").val();
        url=__URL__+"/productionItemSearch";
        panging(page,__URL__+"/productionItemSearch",searchtext+"%"+select);
						 }
				   }else{
					 
					   alert("更新失败");
					
				   }
			   },"JSON")
		},
		 invalidHandler: function(form, validator) {  //不通过回调
		       return false;
		          }
		})
		$("#list").on("click",".iteminfo",function(e){
			var id=$(this).attr("data");
			var itemid=$(".itemid").text();
			$("#contactsview").hide();
			
			   $.getJSON(__URL__+"/productionItemInfo",{id:id},function(data){
				   $("#hidenid").val(data.data[1]);
				   $(".itemid").text(data.data[0].id);
		 		   $(".class_name").text(data.data[0].class_name);
		 		   $(".name").text(data.data[0].name);
		 			$(".start_time").text((data.data[0].start_time==null?"":data.data[0].start_time));
		 			$(".end_time").text((data.data[0].end_time==null||data.data[0].end_time=="0000-00-00"?"":data.data[0].end_time));
		 			$(".client").text(data.data[0].client);
		 			$(".contacts a").text(data.data[0].contacts);
		 			$(".quote").text("$"+data.data[0].quote);
		 			$("#title").html(data.data[0].contacts);
		 			$(".third_party").text("$"+data.data[0].third_party);
		 			$(".appreciation").text("$"+data.data[0].appreciation);
		 			$(".gathering_time").text((data.data[0].gathering_time==null||data.data[0].gathering_time=="0000-00-00"?" ":data.data[0].gathering_time));
		 			$(".phone").text((data.data[0].phone==null?"-":data.data[0].phone));
		 			$(".email").text((data.data[0].email==null?"-":data.data[0].email));
		 			$(".company_name").text((data.data[0].company_name==null?"-":data.data[0].company_name));
		 			$(".company_phone").text((data.data[0].company_phone==null?"-":data.data[0].company_phone));
		 			$(".address").text((data.data[0].address==null?"-":data.data[0].address));
		 			$(".website").text((data.data[0].website==null?"-":data.data[0].website));
		 			$(".remark").text((data.data[0].remark==null?"-":data.data[0].remark));
		 			$(".costing_time").text((data.data[0].gathering_time==null||data.data[0].costing_time=="0000-00-00"?" ":data.data[0].costing_time));
		 			//$('.bs-example-popover').popover('show')
			   },"JSON")
		
			$("#infoview").modal('toggle');
		})
		$("#third_party").change(function(){
			var quote=$("#quote").text().replace(/,/g, "").substr(1);
			var third_party=$("#third_party").val();
			$(".appreciation").val(quote-third_party);
			$("#appreciation").text("$"+fmoney(quote-third_party,2));
		})
		$("#a2").click(function(){
		var x=$("#contactsview").css("display");
			if($("#contactsview").is(':visible')){
			$("#contactsview").hide();
			}else{
				$("#contactsview").show();
			}
		})
		 $("#list").on("click",".up",function(e){
			 var id=$(this).attr("data");
			 var flag=$("#hidenid").val(); 
			 var itemid=$("#id2").text();
			 if(itemid==id){
				 
			 }else{
		 	   $.getJSON(__URL__+"/productionItemInfo",{id:id},function(data){
		 		   if(data.status=1){
		 			 $("#hidenid").val(data.data[1]);
		 			$("#id2").text(data.data[0].id);
		 			$("#class_name").text(data.data[0].class_name);
		 			$("#name").text(data.data[0].name);
		 			$("#start_time").text(data.data[0].start_time);
		 			$("#end_time").text((data.data[0].end_time=null||data.data[0].end_time=="0000-00-00"?" ":data.data[0].end_time));
		 			$("#client").text(data.data[0].client);
		 			$("#contacts").text(data.data[0].contacts);
		 			$("#quote").text("$"+data.data[0].quote);
		 			$("#third_party").val(data.data[0].third_party);
		 			$("#appreciation").text("$"+data.data[0].appreciation);
		 			$("#gathering_time").val((data.data[0].gathering_time=="0000-00-00"?" ":data.data[0].gathering_time));
		 			$("#costing_time").val((data.data[0].costing_time=="0000-00-00"?" ":data.data[0].costing_time));
		 			
		 		   }
		 	   },"JSON")
			 }
		 })
		  $("#list").on("click",".delete",function(e){
			  var id=$(this).attr("data");
			  $.getJSON(__URL__+"/productionItemDelete",{id:id},function(data){
				  if(data.status==1){
					  alert(data.info);
					  if($("#searchtext").val()==""){
							 panging(page,__URL__+"/index",prefix_id);
						 }else{
							 var searchtext=$("#searchtext").val();
               var  select=$("#select option:selected").val();
        url=__URL__+"/productionItemSearch";
        panging(page,__URL__+"/productionItemSearch",searchtext+"%"+select);
						 }
				  }else{
					  alert("删除失败");
				  }
			  },"JSON")
		 })
		 
	
		 
		 $("#searchbutton").click(function(){
      page=0;
			 var searchtext=$("#searchtext").val();
  var  select=$("#select option:selected").val();
        url=__URL__+"/productionItemSearch";
        panging(page,__URL__+"/productionItemSearch",searchtext+"%"+select);
		 })
	//千分位加逗号 s为数字，N为小数位
		 function fmoney(s, n)  
	{  
	   n = n > 0 && n <= 20 ? n : 2;  
	   s = parseFloat((s + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";  
	   var l = s.split(".")[0].split("").reverse(),  
	   r = s.split(".")[1];  
	   t = "";  
	   for(i = 0; i < l.length; i ++ )  
	   {  
	      t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "," : "");  
	   }  
	   return t.split("").reverse().join("") + "." + r;  
	} 
})</script>
</body>
</html>