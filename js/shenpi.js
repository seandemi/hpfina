/*查看正在执行的报销单*/
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
		  url: $("#shenpi").attr("href"),
		  data: {time:time,zongjine:zongjine,danju:danju,leibie:leibie,page:1},
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			appendHTML(json);
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
			  url: $("#shenpi").attr("href"),
			  data: {time:time,zongjine:zongjine,danju:0,leibie:type,page:page},
			  dataType: 'json',
			  cache: false,
			  success: function(json){
				appendHTML(json);
			  }
			});		
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
			html = html+ "<td>"+this.xingming+"</td>";
		    html = html+"<td>"+this.tijiaoshijian+"</td>";
			html = html+"<td>"+this.zongjine+"</td>";
			html = html+"<td>"+this.baoxiaoleixing+"</td>";	
			html = html+"<td><a href="+this.show+">审批"+"</a></td>";
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
/*被驳回的报销单*/
function my_rejected(){
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
		  url: $("#my_rejected").attr("href"),
		  data: {time:time,zongjine:zongjine,danju:danju,leibie:leibie,page:1},
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			append(json);
		  }
		});
	}	
}

function changepage_rejected(obj){
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
			  url: $("#my_rejected").attr("href"),
			  data: {time:time,zongjine:zongjine,danju:0,leibie:type,page:page},
			  dataType: 'json',
			  cache: false,
			  success: function(json){
				appendHTML(json);
			  }
			});		
 }
else{
	return false;
	}
}

function append(json)
{
	$("#main").empty();
	  nowpage = json.nowpage;
	  pagesum = json.pagesum;
	  $(json.info).each(function(i){
			html = "<tr>";
			html = html+ "<td>"+this.baoxiaobianhao+"</td>";
		    html = html+"<td>"+this.tijiaoshijian+"</td>";
			html = html+"<td>"+this.zongjine+"</td>";
			html = html+"<td>"+this.xingming+"</td>";	
			html = html+"<td><a href="+this.show+">审批"+"</a></td>";
			html = html+"</tr>";
			$("#main").append(html)		
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
/*审批报销单*/
function baoxiaoshenpi(obj)
{
	var yijian=document.getElementById("shenpiyijian").value;
	if(obj.innerHTML=="同意"){		
	$.ajax({
		  type: "POST",
		  url: $("#agree").attr("href"),
		  data: "yijian="+yijian,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
		if(json.result=="success"){
			var hr=$("#mainpage").attr("href");
			var Html="报销单审批成功!下一审批人为"+json.xingming+"("+json.zhiwei+" "+json.yuangongbianhao+")";		
			alert(Html);
			window.location.href=hr;
		}
		else if(json.result=="finished"){
			var hr=$("#mainpage").attr("href");
			var Html="报销单经完成了审批流程，已通知"+json.xingming+"("+json.zhiwei+")去领款";		
			alert(Html);
			window.location.href=hr;
		}
		else {
			alert("操作失败！");
		}
		  }
		});	
	}
	else if(obj.innerHTML=="驳回"){		
		$.ajax({
			  type: "POST",
			  url: $("#reject").attr("href"),
			  data: "yijian="+yijian,
			  dataType: 'json',
			  cache: false,
			  success: function(json){
			if(json.result=="success"){
				var hr=$("#mainpage").attr("href");
				var Html="操作成功!已经发邮件通知报销单提交人"+json.xingming+"("+json.zhiwei+" "+json.yuangongbianhao+")";		
				alert(Html);
				window.location.href=hr;
			}
			else {
				alert("操作失败！");
			}
			  }
			});	
		}
}
