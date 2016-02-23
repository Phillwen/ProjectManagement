<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Emedia OA 系统</title>
 <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/dist/css/bootstrap.min.css">
 <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/css/jquery-ui-1.10.3.custom.min.css">
 <style>
body{padding-top: 50px;}
.td1{
	width:40px;
}
.td2{
	width:87px;
}
.td3{
	width:70px;
}
.td4{
	width:120px;
}
.td5{
	width:120px;
}
.td6{
	width:150px;
}
.td7{
	width:100px;
}
.td8{
	width:100px;
}
.td9{
	width:100px;
}
.td10{
	width:90px;
}
.td11{
	width:90px;
}
.td12{
	width:90px;
}
</style>
 <style type="text/css" media="print">
.td1{
	width:30px;
}
.td2{
	width:60px;
}
.td3{
	width:50px;
}
.td4{
	width:90px;
}
.td5{
	width:90px;
}
.td6{
	width:280px;
}
.td7{
	width:70px;
}
.td8{
	width:70px;
}
.td9{
	width:70px;
}
.td10{
	width:60px;
}
.td11{
	width:60px;
}
.td12{
	width:60px;
}
    .print{
	display:none;
    }
    .tableformat{
	width:1000px;
    padding-left:0px;
    font-size:0.9em;
    	
    }
    .container{
	    margin:0 0 0 3;
    	padding:0;
    }
    .row{
		width:1000px;
    padding-left:0px;
    font-size:0.9em;
    }
    .panel{
	border:0;
    	 margin:0;
    	padding:0;
    	
    }
    .panel-default{
	  margin:0;
    	padding:0;
    	
    }
    body{
	padding-top: 0px;
    	
    }
    .table{
	 border:1px solid #000;
    }
  .table-bordered{
	 border:1px solid #000;
  }
  #list{
	 border:1px solid #000;
  }
.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
padding: 2;
line-height: 1.428571429;
vertical-align: top;
border-top: 1px solid #000;
}
</style>
</head>
<body >
<div class="container">
<div class="frame">
<div class="top">
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container containerformat">
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
            <!-- <li ><a href="__APP__/Item/ProductionItem">项目管理</a></li>
            <li><a href="__APP__/Item/ProductionItemManage">项目管理-行政</a></li>    
            <li ><a href="__APP__/Customer/CustomerManage">客户管理</a></li>
            <li><a href="__APP__/WorkReport/ProductionReport/index">报告管理</a></li>
            <li><a href="__APP__/Meeting/MeetingManage">会议管理</a></li>  -->
          </ul>
            <div id="navlogin" class="navbar-collapse collapse">
          <ul class='nav navbar-nav navbar-right'><li ><p class='navbar-text'>欢迎你，<?php echo $_SESSION['name'];?> - 登录时间：<?php echo $_SESSION['time'];?></p></li><li><a href='#' >修改密码</a></li><li><a href='__APP__/Permit/PermitLogin/logout' >退出</a></li><li></li></ul>
        </div><!--/.navbar-collapse -->
        </div><!-- /.nav-collapse -->
        
      </div><!-- /.container -->
    </div><!-- /.navbar -->
    </div>
    
<div class="main">
<div class="container">
<div class="row">
<div class="page-header print">
  <h1>E-MEDIA项目管理系统——制作部</h1>
</div>

</div>
  <div class="row ">
    <div class="col-xs-12 ">
<div class="panel panel-default ">
  <!-- Default panel contents -->
  <div class="panel-heading print" ></div>
  <div class="panel-body">
     <div class="row print">
   <div class="col-xs-4">
     <div class="input-group ">
     <input type="text" class=" form-control " id="search_time1" name="search_time1"/>
<span class="input-group-btn">
 至
     </span>
     <input type="text" class=" form-control " id="search_time2" name="search_time2"/>
</div>
</div>
   <div class="col-xs-2">  
     <select  class=" form-control " id="searchtext1" name="searchtext1">
     <option>全部</option>
     <option>程序</option>
     <option>非程序</option>
     </select>
   
</div>
 <div class="col-xs-2">  
       <select  class=" form-control " id="searchtext2" name="searchtext2">
        <option>全部</option>
         <option>已完成</option>
     <option>进行中</option></select>
</div>
 <div class="col-xs-1">  
     <button type="button" class="btn btn-info " id="searchbutton">搜索</button>
</div>
  
<div class="col-xs-1">
     <button type="button" class="btn btn-primary " id="preview" >打印</button>
</div>
 <div class="col-xs-1">  
     <a href="<?php echo site_url("production"); ?>/index" class="btn btn-primary ">返回项目</a>
</div>
</div>
<div class="row print">&nbsp;</div>
<div class="row"> <table class=" tableformat" ><tr><td width="600" align="right"><b>制作部生意总表</b></td><td width="550" align="right"></td></tr></table></div>
  </div>
  <!-- Table -->
  <table class="table table-bordered tableformat" >
  <thead><tr><th class="td1">序</th><th class="td2">项目编号</th><th class="td3">类别</th><th class="td4">客户</th><th class="td5">联系人</th><th class="td6">项目名称</th><th class="td7">开始日期</th><th class="td8">完成日期</th><th class="td9">收款日期</th><th class="td10" >报价金额</th><th class="td11">第三方</th><th class="td12">增值</th>
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
 <script src="<?php  echo base_url()."resources/" ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
 <script src="<?php  echo base_url()."resources/" ?>/Item/ItemFooter.js"></script>
   <script id="entry-template" type="text/x-handlebars-template">
    {{#each data}}
<tr>
   <td>{{listid}}<input type="hidden" value={{id}}/></td><td>{{id}}</td><td>{{class_name}}</td><td>{{client}}</td><td>{{contacts}}</td><td>{{name}}</td><td>{{start_time}}</td><td>{{end_time}}</td><td>{{gathering_time}}</td><td style="text-align:right;">{{quote}}</td><td style="text-align:right;">{{third_party}}</td><td style="text-align:right;">{{appreciation}}</td>
</tr>
    {{/each}}
<tr><td colspan="9" align="right">总额：</td><td style="text-align:right;">{{quote}}</td><td style="text-align:right;">{{appreciation}}</td><td style="text-align:right;">{{third_party}}</td></tr>
</script>
<script>
var APP="<?php echo site_url("production"); ?>";
var __URL__="<?php echo site_url("production"); ?>";
var url=__URL__+"/index";
$(document).ready(function(e){
	$('#search_time1').datepicker();
	$("#search_time1").datepicker("option", "dateFormat", "yy-mm-dd");
	$('#search_time2').datepicker();
	$("#search_time2").datepicker("option", "dateFormat", "yy-mm-dd");
	$("#search_time1").val("2014-03-01");
	$("#search_time2").val("2015-03-01");
	$("#search_time1").change(function(){
		var time1=$("#search_time1").val();
		var time2=$("#search_time2").val();
		if(time1>time2){
			$("#search_time1").val("");
		}
	})
	$("#search_time2").change(function(){
		var time1=$("#search_time1").val();
		var time2=$("#search_time2").val();
		if(time1>time2){
			$("#search_time2").val("");
		}
	})
	$.getJSON(__URL__+"/generalTable",function(data){
		var source = $("#entry-template").html();
        var template = Handlebars.compile(source);
        var listid=0;
        Handlebars.registerHelper('listid', function () {
            return new Handlebars.SafeString(""+(++listid)+"");});
        Handlebars.registerHelper('end_time', function () {
            return new Handlebars.SafeString(""+(this.end_time=="0000-00-00"?' ':this.end_time)+"");});
        Handlebars.registerHelper('gathering_time', function () {
            return new Handlebars.SafeString(""+(this.gathering_time=="0000-00-00"?' ':this.gathering_time)+"");});
        var html = template(data.data);
        $("#list").html(html);
	})
	 $("#searchbutton").click(function(){
			  var searchtext1=$("#searchtext1").val();
			 var searchtext2=$("#searchtext2").val();
			  var search_time1=$("#search_time1").val();
			  var search_time2=$("#search_time2").val();
				$.getJSON(__URL__+"/tableSearch",{searchtext1:searchtext1,search_time1:search_time1,search_time2:search_time2,searchtext2:searchtext2},function(data){
					if(data.status==1){
						if(data.data.data==null){
							 $("#list").html("<tr><td colspan='12' align='center'>暂无数据</td></tr>");
						}else{
					var source = $("#entry-template").html();
			        var template = Handlebars.compile(source);
			        var listid=0;
			        Handlebars.registerHelper('listid', function () {
			            return new Handlebars.SafeString(""+(++listid)+"");});
			        var html = template(data.data);
			        $("#list").html(html);
						}
					}else{
						 $("#list").html("<tr><td colspan='12' align='center'>暂无数据</td></tr>");
					}
				})
		 })
		 $("#preview").click(function(){
			 window.print();
			
		 })
		
})
</script>
</body>
</html>