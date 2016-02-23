//ajax分页  
function panging(pageIndex,url,searchtext)
{ 
	$.getJSON(url,{currentpage:pageIndex,searchtext:searchtext},function (data) {
		if(data.data==null||data.data.count==0){
			$("#list").html("<tr><td colspan='2'>暂无数据！</td></tr>");
			$("#Pagination").html("");
		}
		else if(data.status==0){alert(data.info);}
		else{
			var source = $("#entry-template").html();
			var template = Handlebars.compile(source);
			var listid=(pageIndex)*10;
			Handlebars.registerHelper('status', function () {
				return new Handlebars.SafeString(""+(this.status==1?'启用':'未启用用')+"");});
			Handlebars.registerHelper('flag', function () {
				return new Handlebars.SafeString(""+(this.flag==1?'已审核':'未审核')+"");});
			Handlebars.registerHelper('endtime', function () {
				return new Handlebars.SafeString(""+(this.endtime=="0000-00-00"?'-':this.endtime)+"");});
			Handlebars.registerHelper('end_time', function () {
				return new Handlebars.SafeString(""+(this.end_time=="0000-00-00"?' ':this.end_time)+"");});
			Handlebars.registerHelper('gathering_time', function () {
				return new Handlebars.SafeString(""+(this.gathering_time=="0000-00-00"?' ':this.gathering_time)+"");});
			Handlebars.registerHelper('listid', function () {
				return new Handlebars.SafeString(""+(++listid)+"");});
			Handlebars.registerHelper('date', function () {
				var time=new Date().getTime();
				return new Handlebars.SafeString(""+time+"");});
			Handlebars.registerHelper("if",function(v1,options){
				if(v1==0){
					return options.fn(this);
				}else{
					return options.inverse(this);
				}
			});
			
			var html = template(data.data);
			$("#list").html(html);
			page=pageIndex;
			if($("#Pagination").val()==""){
				$("#Pagination").pagination(data.data.count, {
					prev_text: " 上一页",
					next_text: "下一页 ",
					num_edge_entries: 2,
					num_display_entries: 6,
					current_page:pageIndex,
					items_per_page:10,
					callback:panginglist
				});
			} 
		}
	})
}
function panginglist(page){
	if(typeof(Model) != "undefined" && Model=="Permission")
	{
		var user_id=$("#user_select").val();
		if($("[name=options1]:checked").val()==0)
		{
			panging(page,url,user_id+"%"+0);
		}else{

			panging(page,url,user_id+"%"+1);
		}
	}else{
		if(($("#select").length > 0)&&$("#select").val()!=""&&$("#searchtext").val()!=""){
			var searchtext=$("#searchtext").val();
			var  select=$("#select option:selected").val();
			panging(page,url,searchtext+"%"+select);
		}else if($("#searchtext").val()!="")
		{
			var searchtext=$("#searchtext").val();
			panging(page,url,searchtext);
		}else if(($("#flaglist").length > 0)&&$("#flaglist").val()!=""){
			var searchtext=$("#flaglist").val();
			panging(page,url,searchtext);
		}else if(($("#select").length > 0)&&$("#select").val()!=""){
			var searchtext=$("#select").val();
			panging(page,url,searchtext);
			
		}else{
			panging(page,url);
		}
	}
}