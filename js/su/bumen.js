/**
 * 
 */
	$("a[name='forbiddenicon']").live("click", function () { 
		bumenbianhao = $(this).attr("bianhao");
		zhuangtai = $(this).attr("zhuangtai");
		obj = $(this);
		$.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "bumenbianhao="+bumenbianhao+"&zhuangtai="+zhuangtai,
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
	});

	$("a[name='deletebumen']").live("click", function () {
		if(confirm("ȷ��Ҫɾ����ѡ����ô��ɾ���󽫲��ָܻ���")){
			bumenbianhao = $(this).attr("bianhao");
			obj = $(this);
	
			$.ajax({
			  type: "POST",
			  url: $(this).attr("href"),
			  data: "bumenbianhao="+bumenbianhao,
			  cache: false,
			  success: function(html){
				  obj.parent().parent().remove();
			  }
			});
		}
	   return false;
	});

	$("#action-lock").live('click', function(){
		var chks = [];
        $("input:checked").each(function(i){
                chks[i] = $(this).val();
        });
        //alert(chks);
	    $.ajax({
		  type: "POST",
		  url: $(this).attr("href"),
		  data: "bumencheck="+chks.join(','),
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
		  data: "bumencheck="+chks.join(','),
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
		if(confirm("ȷ��Ҫɾ����ѡ����ô��ɾ���󽫲��ָܻ���")){
			var chks = [];
	        $("input:checked").each(function(i){
	                chks[i] = $(this).val();
	        });
	        
		    $.ajax({
			  type: "POST",
			  url: $(this).attr("href"),
			  data: "bumencheck="+chks.join(','),
			  cache: false,
			  success: function(html){
			        $("input:checked").each(function(i){
			        	$(this).parent().parent().remove();
			        });
			  }
			});
		}
	});