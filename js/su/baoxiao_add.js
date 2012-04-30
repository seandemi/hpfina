/**
 * 
 */

var sp1check = false; //第一个审批人必须要有
var sp2check = true;
var sp3check = true;
var sp4check = true;
var sp5check = true;
var sp6check = true;
var checknum = false;

//控制只能输入数字和小数点
function checkNum(e)
{
	var keynum
	var keychar
	var numcheck

	if(window.event) // IE
	  {
	  keynum = e.keyCode
	  }
	else if(e.which) // Netscape/Firefox/Opera
	  {
	  keynum = e.which
	  }
	keychar = String.fromCharCode(keynum)
	numcheck = /[\d\.]/
	return numcheck.test(keychar)
}


$("#shaxian").blur(function(){
    reg = /^((([1-9]*\.)|(0\.))[0-9]{1,2}$)|^([1-9]\d*)$/;
    value = parseFloat($(this).val());
    valuexx = parseFloat($("#xiaxian").val());
    if(reg.test(value)){
    	$('#error-left2').hide();
    	$('#error-inner2').hide();
        if( valuexx > value ){
        	$('#error-left2').show();
        	$('#error-inner2').show();
        	$('#error-inner2').html("金额上限不能小于金额下限！");
        	checknum = false;
        } else{
        	checknum = true;
        }
    } else {
    	$('#error-left2').show();
    	$('#error-inner2').show();
    	$('#error-inner2').html("请输入正确的金额格式！");
    	checknum = false;
    }
});

if($("#spb1").val() != '0'){
	sp1check = true;
}

$("#spb1").change(function () {
    $('#error-left3').hide();
	$('#error-inner3').hide();
	sp1check = false;
    zhiwei = $("#spb1").val();
	$.ajax({
	  type: "POST",
	  url: $("#zhiweixuanzhe").attr("href"),
	  data: "zhiwei="+zhiwei,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		    $("#sp1").children().remove();
			$(json.yuangong).each(function(i){
				html = "<option value="+this.yuangongbianhao+">"+this.xingming+"</option>";
				$("#sp1").append(html);
			});
			if($("#sp1").val() == null){
				$('#error-left3').show();
		    	$('#error-inner3').show();
		    	$('#error-inner3').html("必须选择第一审批人！");
		    	sp1check = false;
			} else {
				sp1check = true;
			}
	  }
	});
});

$("#spb2").change(function () {
	sp2check = false;
	sp1value = $("#sp1").val();
	if(sp1value == null){
    	$('#error-left3').show();
    	$('#error-inner3').show();
    	$('#error-inner3').html("请先选择本级审批人！");
    	sp2check = false;
	}
	$('#error-left4').hide();
	$('#error-inner4').hide();
	
    zhiwei = $("#spb2").val();
	$.ajax({
	  type: "POST",
	  url: $("#zhiweixuanzhe").attr("href"),
	  data: "zhiwei="+zhiwei,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		    $("#sp2").children().remove();
			$(json.yuangong).each(function(i){
				html = "<option value="+this.yuangongbianhao+">"+this.xingming+"</option>";
				$("#sp2").append(html);
			});
			if($("#sp2").val() == null && $("#sp3").val() != null ){
				$('#error-left4').show();
		    	$('#error-inner4').show();
		    	$('#error-inner4').html("此审批人不得为空！");
		    	sp2check = false;
			} else {
				sp2check = true;
			}
	  }
	});
});

$("#spb3").change(function () {
	sp3check = false;
	sp2value = $("#sp2").val();
	if(sp2value == null){
    	$('#error-left4').show();
    	$('#error-inner4').show();
    	$('#error-inner4').html("请先选择本级审批人！");
    	sp3check = false;
	}
	$('#error-left5').hide();
	$('#error-inner5').hide();
	
    zhiwei = $("#spb3").val();
	$.ajax({
	  type: "POST",
	  url: $("#zhiweixuanzhe").attr("href"),
	  data: "zhiwei="+zhiwei,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		    $("#sp3").children().remove();
			$(json.yuangong).each(function(i){
				html = "<option value="+this.yuangongbianhao+">"+this.xingming+"</option>";
				$("#sp3").append(html);
			});
			if(($("#sp3").val() == null) && ($("#sp4").val() != null) ){
				$('#error-left5').show();
		    	$('#error-inner5').show();
		    	$('#error-inner5').html("此审批人不得为空！");
		    	sp3check = false;
			} else {
				sp3check = true;
			}
	  }
	});
});

$("#spb4").change(function () {
	sp4check = false;
	sp3value = $("#sp3").val();
	if(sp3value == null){
    	$('#error-left5').show();
    	$('#error-inner5').show();
    	$('#error-inner5').html("请先选择本级审批人！");
    	sp4check = false;
	}
	$('#error-left6').hide();
	$('#error-inner6').hide();
	
    zhiwei = $("#spb4").val();
	$.ajax({
	  type: "POST",
	  url: $("#zhiweixuanzhe").attr("href"),
	  data: "zhiwei="+zhiwei,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		    $("#sp4").children().remove();
			$(json.yuangong).each(function(i){
				html = "<option value="+this.yuangongbianhao+">"+this.xingming+"</option>";
				$("#sp4").append(html);
			});
			if($("#sp4").val() == null && $("#sp5").val() != null ){
				$('#error-left6').show();
		    	$('#error-inner6').show();
		    	$('#error-inner6').html("此审批人不得为空！");
		    	sp4check = false;
			} else {
				sp4check = true;
			}
	  }
	});
});

$("#spb5").change(function () {
	sp5check = false;
	sp4value = $("#sp4").val();
	if(sp4value == null){
    	$('#error-left6').show();
    	$('#error-inner6').show();
    	$('#error-inner6').html("请先选择本级审批人！");
    	sp5check = false;
	}
	
	$('#error-left7').hide();
	$('#error-inner7').hide();
	
    zhiwei = $("#spb5").val();
	$.ajax({
	  type: "POST",
	  url: $("#zhiweixuanzhe").attr("href"),
	  data: "zhiwei="+zhiwei,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		    $("#sp5").children().remove();
			$(json.yuangong).each(function(i){
				html = "<option value="+this.yuangongbianhao+">"+this.xingming+"</option>";
				$("#sp5").append(html);
			});
			if($("#sp5").val() == null && $("#sp6").val() != null ){
				$('#error-left7').show();
		    	$('#error-inner7').show();
		    	$('#error-inner7').html("此审批人不得为空！");
		    	sp5check = false;
			} else {
				sp5check = true;
			}
	  }
	});
});

$("#spb6").change(function () {
	sp6check = false;
	sp5value = $("#sp5").val();
	if(sp5value == null){
    	$('#error-left7').show();
    	$('#error-inner7').show();
    	$('#error-inner7').html("请先选择本级审批人！");
    	sp6check = false;
	}
	
    zhiwei = $("#spb6").val();
	$.ajax({
	  type: "POST",
	  url: $("#zhiweixuanzhe").attr("href"),
	  data: "zhiwei="+zhiwei,
	  dataType: 'json',
	  cache: false,
	  success: function(json){
		    $("#sp6").children().remove();
			$(json.yuangong).each(function(i){
				html = "<option value="+this.yuangongbianhao+">"+this.xingming+"</option>";
				$("#sp6").append(html);
			});
			sp6check = true;
	  }
	});
});

function checkConfirm(){
	if(checknum && sp1check && sp2check && sp3check && sp4check && sp5check && sp6check){
		return true;
	} else {
		return false;
	}
}