/**
 * 
 */
$("#restore").live("click",function(){
	$(".options-width label").html("");
	obj = $(this);
	id = $(this).attr("backupid");
	obj.next().html("���ڵ���...");
	$.ajax({
	  type: "POST",
	  url: $(this).attr("href"),
	  data: "id="+id,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		  		if(json.result == "0"){
		  			obj.next().html("���ݵ���ɹ���");
		  		} else {
		  			obj.next().html("���ݵ���ʧ�ܣ�");
		  		}				
	  }
	});
});
$(".form-backup").live("click", function(){
	$("#backupresult").html("���ڱ���......");
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
		  			$("#backupresult").html("���ݳɹ�����鿴������<a href='"+view+"'>�鿴��������</a>.");
		  		} else {
		  			$("#backupresult").html("����ʧ�ܣ�:(");
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
	if(confirm("ȷ��Ҫɾ�����ݱ���ô��ɾ���󽫲��ָܻ���")){
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
		html = html+"<a href="+json.delete+"  onclick=\"return false\" bianhao=\""+this.id+"\" name=\"deletebackup\" title=\"ɾ��\" class=\"icon-2 info-tooltip\"></a>";
		html = html+"<a id=\"restore\" backupid=\""+this.id+"\" href="+json.restore+" onclick=\"return false\"><b>���ݵ���</b></a>";
		html = html+"<label style=\"color: #FF0000;\"></label>";
	    html = html+"</td>";
		html = html+"</tr>";
		$("table table:nth-child(1)").append(html);
	});
	 $("#nowpage").html(nowpage);
	 $("#pagesum").html(pagesum);
}