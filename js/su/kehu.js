/**
 * 
 */
/**
 * 
 */
	
	$("a[name='deletekehu']").live("click", function () {
		if(confirm("确认要删除所选部门么？删除后将不能恢复！")){
			kehubianhao = $(this).attr("bianhao");
			obj = $(this);
			nowpage = $("#nowpage").html();
		    searchword=$(".top-search-inp").val();
		    
		    if(searchword != "请输入客户名称或编号"){
		    	type= "search";
		    } else {
		    	type= "index";
		    }
		    
			$.ajax({
			  type: "POST",
			  url: $(this).attr("href"),
			  data: "kehubianhao="+kehubianhao+"&nowpage="+nowpage+"&searchword="+searchword+"&type="+type,
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
			  }
		});
	});
	
	function keyshearch(){
	    $("#searchinfo").click();
	}
	
    $(".page-right").live('click',function () {
	    searchword=$(".top-search-inp").val();
	    nowpage = $("#nowpage").html();
	    nextpage = parseInt(nowpage)+1;
	    pagesum = $("#pagesum").html();
	    if(nextpage > pagesum){
	    	nextpage = pagesum;
	    }
	    if(searchword != "请输入客户名称或编号"){
	    	type= "search";
	    } else {
	    	type= "index";
	    }
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "type="+type+"&nextpage="+nextpage+"&searchword="+searchword,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	});
    
    $(".page-left").live('click',function () {
	    searchword=$(".top-search-inp").val();
	    nowpage = $("#nowpage").html();
	    nextpage = parseInt(nowpage)-1;
	    pagesum = $("#pagesum").html();
	    if(nextpage < 1){
	    	nextpage = 1;
	    }
        
	    if(searchword != "请输入客户名称或编号"){
	    	type= "search";
	    } else {
	    	type= "index";
	    }
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "type="+type+"&nextpage="+nextpage+"&searchword="+searchword,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	});
    
    
    $(".page-far-left").live('click',function () {
	    searchword=$(".top-search-inp").val();
	    nowpage = $("#nowpage").html();
	    nextpage = 1;
	    pagesum = $("#pagesum").html();
        
	    if(searchword != "请输入客户名称或编号"){
	    	type= "search";
	    } else {
	    	type= "index";
	    }
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "type="+type+"&nextpage="+nextpage+"&searchword="+searchword,
		  dataType: 'json',
		  cache: false,
		  success: function(json){
			  appendHTML(json);
		  }
		});
	});
    
    $(".page-far-right").live('click',function () {
	    searchword=$(".top-search-inp").val();
	    nowpage = $("#nowpage").html();
	    pagesum = $("#pagesum").html();
	    nextpage = pagesum;
	    
	    if(searchword != "请输入客户名称或编号"){
	    	type= "search";
	    } else {
	    	type= "index";
	    }
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "type="+type+"&nextpage="+nextpage+"&searchword="+searchword,
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
				html += "<td>"+this.kehubianhao+"</td>";
				html += "<td>"+this.name+"</td>";
				html += "<td>"+this.lianxiren+"</td>";
				html += "<td>"+this.dianhua+"</td>";
				html += "<td>"+this.chuanzhen+"</td>";
				html += "<td class=\"options-width\">";
				html = html+"<a href="+json.edit+"/"+this.kehubianhao+" title=\"编辑\" class=\"icon-1 info-tooltip\"></a>";
				html = html+"<a href="+json.delete+" onclick=\"return false\" bianhao=\""+this.kehubianhao+"\" name=\"deletekehu\" title=\"删除\" class=\"icon-2 info-tooltip\"></a>";
			    html = html+"<a href="+json.kehuinfo+"/"+this.kehubianhao+" bianhao=\""+this.kehubianhao+"\" name=\"kehuinfo\" >详细信息...</a>";
			    html = html+"</td>";
				html = html+"</tr>";
				$("table table:nth-child(1)").append(html);
		  });
	    $("#nowpage").html(nowpage);
	    $("#pagesum").html(pagesum);
	    $('input').checkBox();
    }
	