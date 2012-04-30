 /*查看报销单相关操作*/
function deal(){
	var time=document.getElementById("time").value;
	var zongjine=document.getElementById("zongjine").value;
	var danju=document.getElementById("danju").value;
	var leibie=document.getElementById("leibie").value;
	if((time=="")&&(zongjine=="")&&(danju=="")&&(leibie==0))
	{
		alert("查询项不能为空！");
	}
	else {
		$.ajax({
		  type: "POST",
		  url: $("#processdeal").attr("href"),
		  data: {time:time,zongjine:zongjine,danju:danju,leibie:leibie,page:1},
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			appendHTML(json);
//		    $(".top-search-inp").val("请输入员工姓名或编号");
		  }
		});
	}	
}

function changepage(obj){
var value=obj.value;
var time=document.getElementById("gettime").value;
var type=document.getElementById("gettype").value;
var zongjine=document.getElementById("getzongjine").value;
var nowpage=document.getElementById("nowpage").value;
var pagesum=document.getElementById("pagesum").value;
var page;
if((value=="首页")&&(nowpage!=1)){
	page=1;
}
else if ((value=="上页")&&(nowpage!=1)){
	page=Number(nowpage)-1;
}
else if ((value=="下页")&&(nowpage!=pagesum)){
	page=Number(nowpage)+1;
}
else if ((value=="末页")&&(nowpage!=pagesum)){
	page=pagesum;
}
if((page>0)&&(page<=pagesum)){
	$.ajax({
			  type: "POST",
			  url: $("#processdeal").attr("href"),
			  data: {time:time,zongjine:zongjine,danju:0,leibie:type,page:page},
			  dataType: 'json',
			  cache: false,
			  success: function(json){
				appendHTML(json);
			  }
			});
	//	alert(time);
		
 }
else{
	return false;
	}
}

function appendHTML(json)
{
	$("#main").empty();
	  nowpage = json.nowpage;
	  pagesum = json.pagesum;
	  $(json.info).each(function(i){
			html = "<tr>";
			html = html+ "<td>"+this.baoxiaobianhao+"</td>";
		    html = html+"<td>"+this.tijiaoshijian+"</td>";
			html = html+"<td>"+this.zongjine+"</td>";
			for(var i=0; i<this.yishenpi;i++){
				this.zhuangtai+="<img src="+this.right+">";
			}
			for(var i=0; i<this.weishenpi;i++){
				this.zhuangtai+="<img src="+this.no+">";
			}
			html = html+"<td>"+this.zhuangtai+"</td>";	
			html = html+"<td><a href="+this.show+">查看"+"</a></td>";
			html = html+"</tr>";
			$("#main").append(html);			
	  });
		$("#gettime").attr("value",json.time);
		$("#gettype").attr("value",json.type);
		$("#getzongjine").attr("value",json.zongjine);
		$("#nowpage").attr("value",json.nowpage);
		$("#pagesum").attr("value",json.pagesum); 
		$("#headtittle").empty();
		html2="<font>有<strong>"+json.pagesum+"</strong>页&nbsp;共<strong>"+json.rowsum+"</strong>条数据满足条件&nbsp;第<strong>"+json.nowpage+"</strong>页</font>"
		$("#headtittle").append(html2);
}
