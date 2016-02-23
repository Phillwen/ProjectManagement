<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-MEDIA外事项目系统</title>
  <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/dist/css/bootstrap.min.css">
  <link rel="stylesheet"  type="text/css" href="<?php  echo base_url()."resources/" ?>/css/pagination.css">
  <link rel="stylesheet" href="<?php  echo base_url()."resources/" ?>/jqwidgets/styles/jqx.base.css" type="text/css" />
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
            <!--     <li ><a href="__APP__/Staff/StaffIndex/index">公告</a></li>

                <li><a href="__APP__/Staff/StaffIndex/index">员工联系</a></li>    -->       </ul>
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
                     <select   class=" form-control" id="select">
                      <OPTION>全部</OPTION>
                    </select>
                  </div>
                  <div class="col-xs-3">
                   <input type="text" class=" form-control" id="searchtext" name="searchtext"/>
                 </div>
                 <div class="col-xs-2">
                   <button type="button" class="btn btn-info" id="searchbutton">搜索</button>
                 </div>
                 <div class="col-xs-2">
                   <button type="button" class="btn btn-info" id="createpdf">项目清单</button>
                 </div>

               </div>
             </div>

             <!-- Table -->
             <table id="roleadd" class="table">
              <thead><tr><th width="80">序号</th><th width="100">项目类别</th><th width="100">项目编号</th><th width="150">项目名称</th><th width="110">合同到期日</th><th width="100">详细资料</th><th width="130">外事备注</th>
                <th width="120">操作</th></tr></thead>
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
<!-- 修改公告窗口 -->
<div class="modal fade"  id="outwrokitemview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width:500;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4  class="modal-title" id="fingerprint_name"></h4>
      </div>
      <div class="modal-body">
        <form role="form" class="form-horizontal" id="outworkform">

          <div class="row">
            <label  class="col-xs-4 control-label">项目编号：</label>
            <div class="col-xs-8">
             <label  class=" control-label" id="id"></label>
             <input type="hidden" class=" form-control" id="itemid" name="id"/>
           </div>
         </div>
         <div class="row">
          <label  class="col-xs-4 control-label">项目类别：</label>
          <div class="col-xs-8">
            <label  class="control-label" id="flag"></label>
            <input type="hidden" class="form-control" id="input_flag" name="flag"/>
          </div>
        </div>
        <div class="row">
          <label  class="col-xs-4 control-label">项目名称：</label>
          <div class="col-xs-8">
           <label  class="control-label" id="name"></label>
           <input type="hidden" class="form-control" id="input_name" name="name"/>
         </div>
       </div>
       <div class="row">
        <label  class="col-xs-4 control-label">合同到期日：</label>
        <div class="col-xs-8">
          <label  class="control-label" id="expiretime"></label>
        </div>
      </div>
      <div class="row">
        <label  class="col-xs-4 control-label">详细资料：</label>
        <div class="col-xs-8">
         <input type="text" class="form-control" id="contents" name="contents"/>
       </div>
     </div>
     <div class="row">
      <label  class="col-xs-4 control-label">项目备注：</label>
      <div class="col-xs-8">
       <input type="text" class=" form-control" id="remark" name="remark"/>
     </div>
   </div>
 </form>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" id="up">更新</button>
  <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="<?php  echo base_url()."resources/" ?>/dist/js/jquery.js"></script>
<script src="<?php  echo base_url()."resources/" ?>/dist/js/bootstrap.min.js"></script>
<script src="<?php  echo base_url()."resources/" ?>/js/jquery.pagination.js"></script>
<script src="<?php  echo base_url()."resources/" ?>/js/handlebars.js"></script>
<script src="<?php  echo base_url()."resources/" ?>/Item/outworkside.js"></script>
<script src="<?php  echo base_url()."resources/" ?>/js/paging.js"></script>
<script src="<?php  echo base_url()."resources/" ?>/Item/ItemFooter.js"></script>
<script id="entry-template" type="text/x-handlebars-template">
  {{#each listrows}}
  <tr>
   <td>{{listid}}<input type="hidden" value={{id}}/></td><td>{{item_flag}}</td><td>{{id}}</td><td>{{name}}</td><td>{{expiretime}}</td><td>{{contents}}</td><td>{{remark}}</td>
   <td style="align:left;">
   <div class="btn-group">
    <button type="button" data="{{id}}" data-name="{{name}}"  class="btn btn-default outworkinfo" data-toggle="modal" data-target="#outwrokitemview" >修改</button>
  
  </div>
</td>
</tr>
{{/each}}
</script>
<script> 
  var APP="<?php echo site_url("outwork"); ?>";
  var __URL__="<?php echo site_url("outwork"); ?>";
  var page=0;
  var url=__URL__+"/outworkitemlist";
  $(document).ready(function(e){

   panging(page,__URL__+"/outworkitemlist","");
   $.getJSON(__URL__+"/itemflaglist",function(data){
    if(data.status==1){
     for(var i=0;i<data.data.length;i++){
       $("#select").append("<option>"+data.data[i].name+"</option>");
     }
   }else{
     alert(data.info);
   }
 })
   $("#list").on("click",".outworkinfo",function(e){
      $("#id").text($(this).attr("data"));
      $("#itemid").val($(this).attr("data"));
      $("#input_flag").val($(this).parent().parent().parent().children().eq(1).html());
      $("#flag").text($(this).parent().parent().parent().children().eq(1).html());
      $("#name").text($(this).parent().parent().parent().children().eq(3).html());
      $("#input_name").val($(this).parent().parent().parent().children().eq(3).html());
      $("#expiretime").text($(this).parent().parent().parent().children().eq(4).html());
      $("#contents").val($(this).parent().parent().parent().children().eq(5).html());
      $("#remark").val($(this).parent().parent().parent().children().eq(6).html());
    })
   $("#up").click(function(){
     $.post(__URL__+"/outworkitemup",$("#outworkform").serialize(),function(data){
      if(data.status==1){
       alert(data.info);
       $("#outwrokitemview").modal("hide");
       var x=$("#select").val();
       if($("#searchtext").val()!=""||$("#select").val()=="全部"){
         panging(page,__URL__+"/outworkitemlist","");
       }else{
         var searchtext="";
         if($("#searchtext").val()!=""){
          searchtext=$("#searchtext").val();
          panging(page,__URL__+"/outworkitemsearch",searchtext);
        }else{
          searchtext=$("#select").val();
          panging(page,__URL__+"/outworkflagselect",searchtext);
        }

      }
    }else{
     alert(data.info);
   }
 },"JSON")
   })
   $("#searchbutton").click(function(){
     var searchtext=$("#searchtext").val();
     url=__URL__+"/outworkitemsearch";
     panging(page,__URL__+"/outworkitemsearch",searchtext);
   })
   $("#select").change(function(){
     var flag=$("#select").val();
     pege=0;
     url=__URL__+"/outworkflagselect";
     panging(page,__URL__+"/outworkflagselect",flag);
   })

   $("#createpdf").click(function(){
    var flag=$("#select").val();
    $.getJSON(__URL__+"/itemlistpdf",{flag:flag},function(data){
      if(data.data=="PDF制作成功")
      {
       var time=new Date().getTime();
       var a = $("<a href='<?php  echo base_url()."resources/" ?>/PDFfile/emedialist.pdf?"+time+"' target='_blank'>view</a>").get(0);

       var e = document.createEvent('MouseEvents');

       e.initEvent( 'click', true, true );

       a.dispatchEvent(e);
     } 
   }) 
  })

 })

</script>
</body>
</html>