/**
 * 
 */
//ѡ����
    $("select").change(function () {
	    selectedid = $("#bumenselected").val();
		$.ajax({
		  type: "POST",
		  url: $("#bumenselectedurl").attr("href"),
		  data: "selectedid="+selectedid,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			appendHTML(json);
		    $(".top-search-inp").val("������Ա����������");
		  }
		});
	});
    
	//����
	$("a[name='forbiddenicon']").live("click", function () { 
		yuangongbianhao = $(this).attr("bianhao");
		zhuangtai = $(this).attr("zhuangtai");
		obj = $(this);

		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "yuangongbianhao="+yuangongbianhao+"&zhuangtai="+zhuangtai,
		  cache: false,
		  success: function(html){
		     
			  if(zhuangtai == 0){
				    obj.removeClass("icon-3 info-tooltip");
				    obj.addClass("icon-4 info-tooltip");
				    obj.attr("zhuangtai","1");
				    obj.parent().prev().html("����");
				  } else {
				    obj.removeClass("icon-4 info-tooltip");
				    obj.addClass("icon-3 info-tooltip");
					obj.attr("zhuangtai","0");
					obj.parent().prev().html("����");
			  }
		  }
		});
	   // $(this).hide(); 
	   return false;
	});
	
	$("a[name='deleteyuangong']").live("click", function () {
		if(confirm("ȷ��Ҫɾ����ѡ����ô��ɾ���󽫲��ָܻ���")){
			yuangongbianhao = $(this).attr("bianhao");
			obj = $(this);
			nowpage = $("#nowpage").html();
		    selectedid = $("#bumenselected").val();
		    searchword=$(".top-search-inp").val();
		    
		    if(searchword != "������Ա����������"){
		    	type= "search";
		    } else if(selectedid != "-1"){
		    	type = "selectbumen";
		    } else {
		    	type= "index";
		    }
		    
			$.ajax({
			  type: "POST",
			  url: $(this).attr("href"),
			  data: "yuangongbianhao="+yuangongbianhao+"&nowpage="+nowpage+"&selectedid="+selectedid+"&searchword="+searchword+"&type="+type,
			  dataType: 'json',
			  cache: false,
			  success: function(json){
				  appendHTML(json);
			  }
			});
		}
	   return false;
	});
	
	$("#searchinfo").live("click", function() {
	    obj = $(this);
	    searchword=$(".top-search-inp").val();
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "searchword="+searchword,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
				  appendHTML(json);
			      $("#bumenselected").val("-1");
			  }
		});
	});
	
	function keyshearch(){
	    $("#searchinfo").click();
	}

	$("#action-lock").live('click', function(){
		var chks = [];
        $("input:checked").each(function(i){
                chks[i] = $(this).val();
        });
        
	    $.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "yuangongcheck="+chks.join(','),
		  cache: false,
		  success: function(html){
		        $("input:checked").each(function(i){
	                $(this).parent().siblings(".zhuangtai").html("����");
	                $(this).parent().siblings(".options-width").children().eq(2).removeClass("icon-3 info-tooltip");
	                $(this).parent().siblings(".options-width").children().eq(2).addClass("icon-4 info-tooltip");
		        });
		  }
		});
	});

	$("#action-open").live('click', function(){
		var chks = [];
        $("input:checked").each(function(i){
                chks[i] = $(this).val();
        });
        
	    $.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "yuangongcheck="+chks.join(','),
		  cache: false,
		  success: function(html){
		        $("input:checked").each(function(i){
	                $(this).parent().siblings(".zhuangtai").html("����");
	                $(this).parent().siblings(".options-width").children().eq(2).removeClass("icon-4 info-tooltip");
	                $(this).parent().siblings(".options-width").children().eq(2).addClass("icon-3 info-tooltip");
		        });
		  }
		});
	});

	$("#action-delete").live('click', function(){
	if(confirm("ȷ��Ҫɾ����ѡԱ��ô��ɾ���󽫲��ָܻ���")){
		var chks = [];
        $("input:checked").each(function(i){
                chks[i] = $(this).val();
        });
        nowpage = $("#nowpage").html();
	    selectedid = $("#bumenselected").val();
	    searchword=$(".top-search-inp").val();
	    
	    if(searchword != "������Ա����������"){
	    	type= "search";
	    } else if(selectedid != "-1"){
	    	type = "selectbumen";
	    } else {
	    	type= "index";
	    }
	    $.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "yuangongcheck="+chks.join(',')+"&nowpage="+nowpage+"&selectedid="+selectedid+"&searchword="+searchword+"&type="+type,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	}
	});
	
    $(".page-right").live('click',function () {
	    selectedid = $("#bumenselected").val();
	    searchword=$(".top-search-inp").val();
	    nowpage = $("#nowpage").html();
	    nextpage = parseInt(nowpage)+1;
	    pagesum = $("#pagesum").html();
	    if(nextpage > pagesum){
	    	nextpage = pagesum;
	    }
        
	    if(searchword != "������Ա����������"){
	    	type= "search";
	    } else if(selectedid != "-1"){
	    	type = "selectbumen";
	    } else {
	    	type= "index";
	    }
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "type="+type+"&nextpage="+nextpage+"&selectedid="+selectedid+"&searchword="+searchword,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	});
    
    $(".page-left").live('click',function () {
	    selectedid = $("#bumenselected").val();
	    searchword=$(".top-search-inp").val();
	    nowpage = $("#nowpage").html();
	    nextpage = parseInt(nowpage)-1;
	    pagesum = $("#pagesum").html();
	    if(nextpage < 1){
	    	nextpage = 1;
	    }
        
	    if(searchword != "������Ա����������"){
	    	type= "search";
	    } else if(selectedid != "-1"){
	    	type = "selectbumen";
	    } else {
	    	type= "index";
	    }
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "type="+type+"&nextpage="+nextpage+"&selectedid="+selectedid+"&searchword="+searchword,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	});
    
    
    $(".page-far-left").live('click',function () {
	    selectedid = $("#bumenselected").val();
	    searchword=$(".top-search-inp").val();
	    nowpage = $("#nowpage").html();
	    nextpage = 1;
	    pagesum = $("#pagesum").html();
        
	    if(searchword != "������Ա����������"){
	    	type= "search";
	    } else if(selectedid != "-1"){
	    	type = "selectbumen";
	    } else {
	    	type= "index";
	    }
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "type="+type+"&nextpage="+nextpage+"&selectedid="+selectedid+"&searchword="+searchword,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	});
    
    $(".page-far-right").live('click',function () {
	    selectedid = $("#bumenselected").val();
	    searchword=$(".top-search-inp").val();
	    nowpage = $("#nowpage").html();
	    pagesum = $("#pagesum").html();
	    nextpage = pagesum;
	    
	    if(searchword != "������Ա����������"){
	    	type= "search";
	    } else if(selectedid != "-1"){
	    	type = "selectbumen";
	    } else {
	    	type= "index";
	    }
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "type="+type+"&nextpage="+nextpage+"&selectedid="+selectedid+"&searchword="+searchword,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	});
    
    function appendHTML(json)
    {
    	$("table table tr:nth-child(n+2)").empty();
		  nowpage = json.nowpage;
		  pagesum = json.pagesum;
		  $(json.info).each(function(i){
				if( i%2 != 0){
				    class1 = "alternate-row";
				} else {
					class1 = "";
				}
				 html = "<tr class=\""+class1+"\">";
				 html = html+ "<td><input  type=\"checkbox\" name=\"yuangongcheck[]\" value=\""+this.yuangongbianhao+"\"/></td>";
				 html = html+"<td>"+this.yuangongbianhao+"</td>";
				 html = html+"<td>"+this.xingming+"</td>";
				 html = html+"<td>"+this.bumenming+"</td>";
				 html = html+"<td>"+this.zhiwei+"</td>";
				if(this.zhuangtai == 0) {
				    zhuangtai = "����";
				    title = "����";
					class2 = "icon-3 info-tooltip";
				} else {
				    zhuangtai = "����";
				    title="����";
					class2 = "icon-4 info-tooltip";
				}
				html = html+"<td class=\"zhuangtai\" >"+zhuangtai+"</td>";
				html = html+"<td class=\"options-width\">";
				html = html+"<a href="+json.edit+"/"+this.yuangongbianhao+" title=\"�༭\" class=\"icon-1 info-tooltip\"></a>";
				html = html+"<a href="+json.delete+" onclick=\"return false\" bianhao=\""+this.yuangongbianhao+"\" name=\"deleteyuangong\" title=\"ɾ��\" class=\"icon-2 info-tooltip\"></a>";
			    html = html+"<a href="+json.jinyong+" onclick=\"return false\" bianhao=\""+this.yuangongbianhao+"\" zhuangtai=\""+this.zhuangtai+"\" title="+title+" name=\"forbiddenicon\" class="+class2+"\"></a>";
			    html = html+"<a href="+json.yuangonginfo+"/"+this.yuangongbianhao+" bianhao=\""+this.yuangongbianhao+"\" name=\"yuangonginfo\" >��ϸ��Ϣ...</a>";
				html = html+"<a href="+json.yuangong+"/baoxiao/"+this.yuangongbianhao+">����·��</a>";
			    html = html+"</td>";
				html = html+"</tr>";
				$("table table:nth-child(1)").append(html);
		  });
	    $("#nowpage").html(nowpage);
	    $("#pagesum").html(pagesum);
	    $('input').checkBox();
    }
	