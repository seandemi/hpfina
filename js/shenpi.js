/*�鿴����ִ�еı�����*/
function deal(){
	var time=document.getElementById("time").value;
	var zongjine=document.getElementById("zongjine").value;
	var danju=document.getElementById("danju").value;
	var leibie=document.getElementById("leibie").value;
	if((time=="")&&(zongjine=="")&&(danju=="")&&(leibie==0))
	{
		alert("��ѯ���Ϊ�գ�");
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
if((value=="��ҳ")&&(nowpage!=1)){
	page=1;
}
else if ((value=="��ҳ")&&(nowpage!=1)){
	page=Number(nowpage)-1;
}
else if ((value=="��ҳ")&&(nowpage!=pagesum)){
	page=Number(nowpage)+1;
}
else if ((value=="ĩҳ")&&(nowpage!=pagesum)){
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
			html = html+"<td><a href="+this.show+">����"+"</a></td>";
			html = html+"</tr>";
			$("#main").append(html);			
	  });
		$("#gettime").attr("value",json.time);
		$("#gettype").attr("value",json.type);
		$("#getzongjine").attr("value",json.zongjine);
		$("#nowpage").attr("value",json.nowpage);
		$("#pagesum").attr("value",json.pagesum); 
		$("#headtittle").empty();
		html2="<font>��<strong>"+json.pagesum+"</strong>ҳ&nbsp;��<strong>"+json.rowsum+"</strong>��������������&nbsp;��<strong>"+json.nowpage+"</strong>ҳ</font>"
		$("#headtittle").append(html2);
}
/*�����صı�����*/
function my_rejected(){
	var time=document.getElementById("time").value;
	var zongjine=document.getElementById("zongjine").value;
	var danju=document.getElementById("danju").value;
	var leibie=document.getElementById("leibie").value;
	if((time=="")&&(zongjine=="")&&(danju=="")&&(leibie==0))
	{
		alert("��ѯ���Ϊ�գ�");
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
if((value=="��ҳ")&&(nowpage!=1)){
	page=1;
}
else if ((value=="��ҳ")&&(nowpage!=1)){
	page=Number(nowpage)-1;
}
else if ((value=="��ҳ")&&(nowpage!=pagesum)){
	page=Number(nowpage)+1;
}
else if ((value=="ĩҳ")&&(nowpage!=pagesum)){
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
			html = html+"<td><a href="+this.show+">����"+"</a></td>";
			html = html+"</tr>";
			$("#main").append(html)		
	  });
		$("#gettime").attr("value",json.time);
		$("#gettype").attr("value",json.type);
		$("#getzongjine").attr("value",json.zongjine);
		$("#nowpage").attr("value",json.nowpage);
		$("#pagesum").attr("value",json.pagesum); 
		$("#headtittle").empty();
		html2="<font>��<strong>"+json.pagesum+"</strong>ҳ&nbsp;��<strong>"+json.rowsum+"</strong>��������������&nbsp;��<strong>"+json.nowpage+"</strong>ҳ</font>"
		$("#headtittle").append(html2);
}
/*����������*/
function baoxiaoshenpi(obj)
{
	var yijian=document.getElementById("shenpiyijian").value;
	if(obj.innerHTML=="ͬ��"){		
	$.ajax({
		  type: "POST",
		  url: $("#agree").attr("href"),
		  data: "yijian="+yijian,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
		if(json.result=="success"){
			var hr=$("#mainpage").attr("href");
			var Html="�����������ɹ�!��һ������Ϊ"+json.xingming+"("+json.zhiwei+" "+json.yuangongbianhao+")";		
			alert(Html);
			window.location.href=hr;
		}
		else if(json.result=="finished"){
			var hr=$("#mainpage").attr("href");
			var Html="��������������������̣���֪ͨ"+json.xingming+"("+json.zhiwei+")ȥ���";		
			alert(Html);
			window.location.href=hr;
		}
		else {
			alert("����ʧ�ܣ�");
		}
		  }
		});	
	}
	else if(obj.innerHTML=="����"){		
		$.ajax({
			  type: "POST",
			  url: $("#reject").attr("href"),
			  data: "yijian="+yijian,
			  dataType: 'json',
			  cache: false,
			  success: function(json){
			if(json.result=="success"){
				var hr=$("#mainpage").attr("href");
				var Html="�����ɹ�!�Ѿ����ʼ�֪ͨ�������ύ��"+json.xingming+"("+json.zhiwei+" "+json.yuangongbianhao+")";		
				alert(Html);
				window.location.href=hr;
			}
			else {
				alert("����ʧ�ܣ�");
			}
			  }
			});	
		}
}
