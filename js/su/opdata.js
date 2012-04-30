/**
 * 
 */
$("#restore").live("click",function(){
	$(".options-width label").html("");
	obj = $(this);
	id = $(this).attr("backupid");
	obj.next().html("正在导入...");
	$.ajax({
	  type: "POST",
	  url: $(this).attr("href"),
	  data: "id="+id,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		  		if(json.result == "0"){
		  			obj.next().html("数据导入成功！");
		  		} else {
		  			obj.next().html("数据导入失败！");
		  		}				
	  }
	});
});
$(".form-backup").live("click", function(){
	$("#backupresult").html("正在备份......");
	obj = $(this);
	$.ajax({
	  type: "POST",
	  url: $(this).attr("href"),
	  data: "",
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		  		if(json.result == "0"){
		  			view = $("#restorev").val();
		  			$("#backupresult").html("备份成功！如查看请点击：<a href='"+view+"'>查看备份数据</a>.");
		  		} else {
		  			$("#backupresult").html("备份失败！:(");
		  		}
	  }
	});
});


$(".page-right").live('click',function () {
    nowpage = $("#nowpage").html();
    nextpage = parseInt(nowpage)+1;
    pagesum = $("#pagesum").html();
    if(nextpage > pagesum){
    	nextpage = pagesum;
    }
	$.ajax({
	  type: "POST",
	  url: $(this).attr("href"),
	  data: "nextpage="+nextpage,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		  appendHTML(json);
	  }
	});
});

$(".page-left").live('click',function () {
    nowpage = $("#nowpage").html();
    nextpage = parseInt(nowpage)-1;
    pagesum = $("#pagesum").html();
    if(nextpage < 1){
    	nextpage = 1;
    }
	$.ajax({
	  type: "POST",
	  url: $(this).attr("href"),
	  data: "nextpage="+nextpage,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		  appendHTML(json);
	  }
	});
});

$(".page-far-left").live('click',function () {
    nowpage = $("#nowpage").html();
    nextpage = 1;
    pagesum = $("#pagesum").html();
	$.ajax({
	  type: "POST",
	  url: $(this).attr("href"),
	  data: "nextpage="+nextpage,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		  appendHTML(json);
	  }
	});
});

$(".page-far-right").live('click',function () {
    nowpage = $("#nowpage").html();
    pagesum = $("#pagesum").html();
    nextpage = pagesum;
	$.ajax({
	  type: "POST",
	  url: $(this).attr("href"),
	  data: "nextpage="+nextpage,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		  appendHTML(json);
	  }
	});
});

$("a[name='deletebackup']").live("click", function(){
	if(confirm("确认要删除数据备份么？删除后将不能恢复！")){
		backupid = $(this).attr("bianhao");
		obj = $(this);
		nowpage = $("#nowpage").html();
		$.ajax({
		  type: "POST",
		  url: obj.attr("href"),
		  data: "bianhao="+backupid+"&nowpage="+nowpage,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	}
   return false;
});

function UNIX2Data(unixtime){
	ntime = unixtime*1000;
	d = new Date(ntime);
	yy = d.getFullYear();
	mm = d.getMonth() + 1;
	dd = d.getDate();
	ho = d.getHours();
	mi = d.getMinutes();
	se = d.getSeconds();
	date = yy+'-'+mm+'-'+dd+' '+ho+':'+mi+':'+se;
	return date;
}
function appendHTML(json){
	$("table table tr:nth-child(n+2)").empty();
	nowpage = json.page.nowpage;
	pagesum = json.page.pagesum;
	$(json.backupfile.file).each(function(i){
		if( i%2 != 0){
		    class1 = "alternate-row";
		} else {
			class1 = "";
		}
		reg = /.sql$/;
		this.time = this.replace(reg,"");
		this.id = this.time;
		html = "<tr class=\""+class1+"\">";
		html = html+"<td>"+UNIX2Data(this.time)+"</td>";
		html = html+"<td>"+this.valueOf()+"</td>";
		html = html+"<td class=\"options-width\">";
		html = html+"<a href="+json.delete+"  onclick=\"return false\" bianhao=\""+this.id+"\" name=\"deletebackup\" title=\"删除\" class=\"icon-2 info-tooltip\"></a>";
		html = html+"<a id=\"restore\" backupid=\""+this.id+"\" href="+json.restore+" onclick=\"return false\"><b>数据导入</b></a>";
		html = html+"<label style=\"color: #FF0000;\"></label>";
	    html = html+"</td>";
		html = html+"</tr>";
		$("table table:nth-child(1)").append(html);
	});
	 $("#nowpage").html(nowpage);
	 $("#pagesum").html(pagesum);
}