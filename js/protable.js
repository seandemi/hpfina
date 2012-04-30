var numb;
var butie;
//改变差旅详细信息
function changetype(){
	var sel=document.getElementById("chalv_type").value;
	if(sel=="长途交通费"){
		 document.getElementById("chailv_info").innerText=""; 
		 document.getElementById("chal_col").innerText="";
		  var addhtml="交通工具&nbsp;&nbsp;&nbsp;起点&nbsp;&nbsp;&nbsp;终点";
		  // addhtml+="<td>"+traffic_type+"<input type='hidden' name='traffic_type[]' value="+traffic_type +" /></td>";
		  var Html="<select id='jiaotonggongju' name='jiaotonggongju' size='1'> ";
		      Html+="<option value='飞机' selected='selected' >飞机</option>";
		      Html+="<option value='高铁' >高铁</option>";
		      Html+="<option value='高铁' >动车</option>";
		      Html+="<option value='其他' >其他</option></select>";
		      Html+="<input  id='chailv_start' style='width:50px;'/>";
		      Html+="&nbsp;<input  id='chailv_end' style='width:50px;'/>";
		 $("#chal_col").append(addhtml);
		 $("#chailv_info").append(Html);
	 	}
	else if(sel=="差旅补贴"){
		 document.getElementById("chailv_info").innerText=""; 
		 document.getElementById("chal_col").innerText="";
		  var addhtml="商旅目的地";
		  var Html="<select id='mudi' name='mudi' size='1'> ";
		      Html+="<option value='1' selected='selected'>国内</option>";
		      Html+="<option value='2' >国外</option>";
		      Html+="<option value='3' >港澳台</option></select>";
		      Html+="<input type='text' id='des_place' style='width:90px;'/>";
		 $("#chal_col").append(addhtml);
		 $("#chailv_info").append(Html);
	 	}
	else {
		 document.getElementById("chailv_info").innerText=""; 
		 document.getElementById("chal_col").innerText="";
		 var addhtml="商旅目的地";
		 var   Html="<input type='text' id='des_place' style='width:90px;'/>";
		 $("#chal_col").append(addhtml);
		 $("#chailv_info").append(Html);
	 	}
}
//清除当前行的值
function cancel(){
var tablenum=window.numb;
	if(tablenum==1){
		var sel=document.getElementById("traffic_type");
		var sel2=document.getElementById("Currency");
		var sel3=document.getElementById("kehuno");
		for(var i=0;i<sel.options.length;i++)
		{
		    if(sel.options[i].value=="交通费")
		        sel.options[i].selected=true;
		}
		for(var i=0;i<sel2.options.length;i++)
		{
		    if(sel2.options[i].value==0)
		        sel2.options[i].selected=true;
		}
		for(var i=0;i<sel3.options.length;i++)
		{
		    if(sel3.options[i].value=="0")
		        sel3.options[i].selected=true;
		}
		$("#receipt").attr("value","");
		$("#parity").attr("value","");
		$("#jine").attr("value","");
		$("#start_time").attr("value","");
		$("#end_time").attr("value","");
		$("#start_place").attr("value","");
		$("#end_place").attr("value","");
		$("#dnumber").attr("value","");
	}
	else if(tablenum==2){
		var sel=document.getElementById("Currency_chai");
		var sel2=document.getElementById("chalv_type");
		var sel3=document.getElementById("kehu_chai");
		for(var i=0;i<sel.options.length;i++)
		{
		    if(sel.options[i].value==0)
		        sel.options[i].selected=true;
		}
		for(var i=0;i<sel2.options.length;i++)
		{
		    if(sel2.options[i].value=="市内交通费")
		        sel2.options[i].selected=true;
		}
		for(var i=0;i<sel3.options.length;i++)
		{
		    if(sel3.options[i].value=="0")
		        sel3.options[i].selected=true;
		}
		var id=changetype();
		$("#receipt_chai").attr("value","");
		$("#parity_chai").attr("value","");
		$("#jine_chai").attr("value","");
		$("#startchai").attr("value","");
		$("#endchai").attr("value","");
		$("#days").attr("value","");
		$("#dnumber_chai").attr("value","");
	}
	else if(tablenum==3){
		var sel2=document.getElementById("Currency_jiaoji");
		var sel3=document.getElementById("kehu_jiaoji");
		for(var i=0;i<sel2.options.length;i++)
		{
		    if(sel2.options[i].value==0)
		        sel2.options[i].selected=true;
		}
		for(var i=0;i<sel3.options.length;i++)
		{
		    if(sel3.options[i].value=="0")
		        sel3.options[i].selected=true;
		}
		$("#receipt_jiaoji").attr("value","");
		$("#parity_jiaoji").attr("value","");
		$("#jine_jiaoji").attr("value","");
		$("#jiaoji_time").attr("value","");
		$("#jiaoji_place").attr("value","");
		$("#company").attr("value","");
		$("#personal").attr("value","");
		$("#dnumber_jiaoji").attr("value","");
	}
	else if(tablenum==4){
		var sel2=document.getElementById("Currency_lipin");
		var sel3=document.getElementById("kehu_lipin");
		for(var i=0;i<sel2.options.length;i++)
		{
		    if(sel2.options[i].value==0)
		        sel2.options[i].selected=true;
		}
		for(var i=0;i<sel3.options.length;i++)
		{
		    if(sel3.options[i].value=="0")
		        sel3.options[i].selected=true;
		}
		$("#receipt_lipin").attr("value","");
		$("#parity_lipin").attr("value","");
		$("#jine_lipin").attr("value","");
		$("#lipin_time").attr("value","");
		$("#lipin_name").attr("value","");
		$("#lipin_company").attr("value","");
		$("#lipin_personal").attr("value","");
		$("#dnumber_lipin").attr("value","");
	}
	else if(tablenum==5){
		var sel2=document.getElementById("Currency_zichan");
		for(var i=0;i<sel2.options.length;i++)
		{
		    if(sel2.options[i].value==0)
		        sel2.options[i].selected=true;
		}
		$("#receipt_zichan").attr("value","");
		$("#parity_zichan").attr("value","");
		$("#jine_zichan").attr("value","");
		$("#zichan_time").attr("value","");
		$("#zichan_name").attr("value","");
		$("#yongtu").attr("value","");
		$("#dnumber_zichan").attr("value","");
	}
	else if(tablenum==6){
		var sel=document.getElementById("kehu_tongyong");
		var sel2=document.getElementById("Currency_tongyong");
//		document.getElementById("shiyongmudi").value = "餐补"; 
   var sel3=document.getElementById("shiyongmudi");
		for(var i=0;i<sel.options.length;i++)
		{
		    if(sel.options[i].value=="0")
		        sel.options[i].selected=true;
		}
		for(var i=0;i<sel2.options.length;i++)
		{
		    if(sel2.options[i].value==0)
		        sel2.options[i].selected=true;
		}
		for(var i=0;i<sel3.options.length;i++)
		{
		    if(sel3.options[i].value=="0")
		        sel3.options[i].selected=true;
		}
		$("#receipt_tongyong").attr("value","");
		$("#parity_tongyong").attr("value","");
		$("#jine_tongyong").attr("value","");
		$("#tongyong_time").attr("value","");
		$("#mingxi").attr("value","");
		$("#dnumber_tongyong").attr("value","");
	}
 }

//将填写的内容加到列表
function addto(){
var tablenum=window.numb;
var zongjine=document.getElementById('zongjine').value;
if(tablenum==1){	
	var traffic_type=document.getElementById('traffic_type').value;
	var receipt=document.getElementById('receipt').value;
	var Currency=document.getElementById('Currency').value;
	var parity=document.getElementById('parity').value;
	var jine=document.getElementById('jine').value;
	var start_time=document.getElementById('start_time').value;
	var end_time=document.getElementById('end_time').value;
	var start_place=document.getElementById('start_place').value;
	var end_place=document.getElementById('end_place').value;
	var kehuno=document.getElementById('kehuno').value;	
	var dnumber=document.getElementById('dnumber').value;
	var tab = document.getElementById("traffic2") ;
	var  rows = tab.rows.length ;
	var start_time2=start_time.replace(" ","/");
	var end_time2=end_time.replace(" ","/");	
 if((kehuno!="")&&(receipt!="")&&(Currency!=0)&&(start_time!="")&&(start_place!="")&&(end_time!="")&&(end_place!="")&&(dnumber!="")){ 
	 if(CheckINT(dnumber)!=1){
		alert("请输入正确的单据数目！");
	}
	else {
	if(confirm( "确定添加到列表? ")){
	  $("#zongjine").attr("value",(Number(zongjine)+Number(jine)).toFixed(2));
	  var addhtml="<tr><td>"+(rows+1)+"</td>";
	    addhtml+="<td>"+traffic_type+"<input type='hidden' name='traffic_type[]' value="+traffic_type +" /></td>";
	    addhtml+="<td>"+receipt+"<input type='hidden' name='receipt[]' value="+receipt +" /></td>";
	    addhtml+="<td>"+Currency+"<input type='hidden' name='Currency[]' value="+Currency +" /></td>";
	    addhtml+="<td>"+parity+"<input type='hidden' name='parity[]' value="+parity+" /></td>";
	    addhtml+="<td>"+jine+"<input type='hidden' name='jine[]' value="+jine+" /></td>";
	    addhtml+="<td>"+start_time+"<input type='hidden' name='start_time[]' value="+start_time2+" /></td>";
	    addhtml+="<td>"+start_place+"<input type='hidden' name='start_place[]' value="+start_place+" /></td>";
	    addhtml+="<td>"+end_time+"<input type='hidden' name='end_time[]' value="+end_time2+" /></td>";
	    addhtml+="<td>"+end_place+"<input type='hidden' name='end_place[]' value="+end_place+" /></td>";
	    addhtml+="<td>"+kehuno+"<input type='hidden' name='kehuno[]' value="+kehuno+" /></td>";
	    addhtml+="<td>"+dnumber+"<input type='hidden' name='dnumber[]' value="+dnumber+" /></td>";
	    addhtml+="<td><input type='button' value='删除' onclick='deleterow(this)' /></td></tr>";
	    $("#traffic2").append(addhtml);
		 }
	 }
	}
	else {
		alert("请将信息填写完整后再添加！");
	}
}
else if(tablenum==2){
	var chalv_type=document.getElementById('chalv_type').value;
	var receipt_chai=document.getElementById('receipt_chai').value;
	var Currency_chai=document.getElementById('Currency_chai').value;
	var parity_chai=document.getElementById('parity_chai').value;
	var jine_chai=document.getElementById('jine_chai').value;
	var startchai=document.getElementById('startchai').value;
	var endchai=document.getElementById('endchai').value;	
	var kehu_chai=document.getElementById('kehu_chai').value;	
	var dnumber_chai=document.getElementById('dnumber_chai').value;
	var days=document.getElementById('days').value;
	var tab = document.getElementById("chai_list") ;
	if(chalv_type=='长途交通费'){		
		var gongju=document.getElementById('jiaotonggongju').value;
		var chailv_start=document.getElementById('chailv_start').value;
		var chailv_end=document.getElementById('chailv_end').value;
		var des_place=gongju+" "+chailv_start+" "+chailv_end;
		var des_place2=gongju+"-"+chailv_start+"-"+chailv_end;
	  }
	 else {
			var des_place=document.getElementById('des_place').value;
			var des_place2=des_place;
		}
	var  rows = tab.rows.length;
	var startchai2=startchai.replace(" ","/");
	var endchai2=endchai.replace(" ","/");
	if((kehu_chai!="")&&(receipt_chai!="")&&(Currency_chai!=0)&&(dnumber_chai!="")&&(days!="")){ 
		 if(CheckINT(dnumber_chai)!=1){
			alert("请输入正确的单据数目！");
		}
	else if(chalv_type=='差旅补贴'){
		   var mudi=document.getElementById('mudi').value;
		 $.ajax({
			  type: "POST",
			  url: $("#butie").attr("href"),
			  data: {mudi:mudi,jine:jine_chai,day:days},
			  cache: false,
			  success: function(html){
			  if(html=='success'){
				 if(confirm( "确定添加到列表? ")){
//					      var des_place=document.getElementById('des_place').value; 
						  $("#zongjine").attr("value",(Number(zongjine)+Number(jine_chai)).toFixed(2));		 
						  var addhtml="<tr><td>"+(rows+1)+"</td>";
						    addhtml+="<td>"+chalv_type+"<input type='hidden' name='chalv_type[]' value="+chalv_type +" /></td>";
						    addhtml+="<td>"+receipt_chai+"<input type='hidden' name='receipt_chai[]' value="+receipt_chai +" /></td>";		    
						    addhtml+="<td>"+Currency_chai+"<input type='hidden' name='Currency_chai[]' value="+Currency_chai +" /></td>";		    
						    addhtml+="<td>"+parity_chai+"<input type='hidden' name='parity_chai[]' value="+parity_chai+" /></td>";
						    addhtml+="<td>"+jine_chai+"<input type='hidden' name='jine_chai[]' value="+jine_chai+" /></td>";
						    addhtml+="<td>"+des_place+"<input type='hidden' name='des_place[]' value="+des_place+" /></td>";		    
						    addhtml+="<td>"+startchai+"<input type='hidden' name='startchai[]' value="+startchai2+" /></td>";
						    addhtml+="<td>"+endchai+"<input type='hidden' name='endchai[]' value="+endchai2+" /></td>";
						    addhtml+="<td>"+days+"<input type='hidden' name='days[]' value="+days+" /></td>";
						    addhtml+="<td>"+kehu_chai+"<input type='hidden' name='kehu_chai[]' value="+kehu_chai+" /></td>";
						    addhtml+="<td>"+dnumber_chai+"<input type='hidden' name='dnumber_chai[]' value="+dnumber_chai+" /></td>";
						    addhtml+="<td><input type='button' value='删除' onclick='deleterow(this)' /></td></tr>";
						    $("#chai_list").append(addhtml);
							}
						 }	
			 
			  else if(html=='failure') {
				  alert("报销金额超过了差旅费报销标准！");
			  }
			  }
			});
	}
	else {		
    if(confirm( "确定添加到列表? ")){
    	    $("#zongjine").attr("value",(Number(zongjine)+Number(jine_chai)).toFixed(2));		 
		    var addhtml="<tr><td>"+(rows+1)+"</td>";
		    addhtml+="<td>"+chalv_type+"<input type='hidden' name='chalv_type[]' value="+chalv_type +" /></td>";
		    addhtml+="<td>"+receipt_chai+"<input type='hidden' name='receipt_chai[]' value="+receipt_chai +" /></td>";		    
		    addhtml+="<td>"+Currency_chai+"<input type='hidden' name='Currency_chai[]' value="+Currency_chai +" /></td>";		    
		    addhtml+="<td>"+parity_chai+"<input type='hidden' name='parity_chai[]' value="+parity_chai+" /></td>";
		    addhtml+="<td>"+jine_chai+"<input type='hidden' name='jine_chai[]' value="+jine_chai+" /></td>";
		    addhtml+="<td>"+des_place+"<input type='hidden' name='des_place[]' value="+des_place2+" /></td>";		    
		    addhtml+="<td>"+startchai+"<input type='hidden' name='startchai[]' value="+startchai2+" /></td>";
		    addhtml+="<td>"+endchai+"<input type='hidden' name='endchai[]' value="+endchai2+" /></td>";
		    addhtml+="<td>"+days+"<input type='hidden' name='days[]' value="+days+" /></td>";
		    addhtml+="<td>"+kehu_chai+"<input type='hidden' name='kehu_chai[]' value="+kehu_chai+" /></td>";
		    addhtml+="<td>"+dnumber_chai+"<input type='hidden' name='dnumber_chai[]' value="+dnumber_chai+" /></td>";
		    addhtml+="<td><input type='button' value='删除' onclick='deleterow(this)' /></td></tr>";
		    $("#chai_list").append(addhtml);
		 //   alert(des_place2);
			 }
		 }
		}
		else {
			alert("请将信息填写完整后再添加！");
		}
	 } 
else if(tablenum==3){	
	var receipt_jiaoji=document.getElementById('receipt_jiaoji').value;
	var Currency_jiaoji=document.getElementById('Currency_jiaoji').value;
	var parity_jiaoji=document.getElementById('parity_jiaoji').value;
	var jine_jiaoji=document.getElementById('jine_jiaoji').value;
	var jiaoji_time=document.getElementById('jiaoji_time').value;
	var jiaoji_place=document.getElementById('jiaoji_place').value;
	var company=document.getElementById('company').value;	
	var personal=document.getElementById('personal').value;	
	var kehu_jiaoji=document.getElementById('kehu_jiaoji').value;	
	var dnumber_jiaoji=document.getElementById('dnumber_jiaoji').value;
	var tab = document.getElementById("jiaoji_list") ;
	var rows = tab.rows.length;	
 if((receipt_jiaoji!="")&&(jine_jiaoji!="")&&(Currency_jiaoji!=0)&&(jiaoji_time!="")&&(jiaoji_place!="")&&(company!="")&&(personal!="")&&(kehu_jiaoji!="")&&(dnumber_jiaoji!="")){ 
	 if(CheckINT(dnumber_jiaoji)!=1){
		alert("请输入正确的单据数目！");
	}
	else {
	if(confirm( "确定添加到列表? ")){
	  $("#zongjine").attr("value",(Number(zongjine)+Number(jine_jiaoji)).toFixed(2));
	  var addhtml="<tr><td>"+(rows+1)+"</td>";
	    addhtml+="<td>"+receipt_jiaoji+"<input type='hidden' name='receipt_jiaoji[]' value="+receipt_jiaoji +" /></td>";
	    addhtml+="<td>"+Currency_jiaoji+"<input type='hidden' name='Currency_jiaoji[]' value="+Currency_jiaoji +" /></td>";
	    addhtml+="<td>"+parity_jiaoji+"<input type='hidden' name='parity_jiaoji[]' value="+parity_jiaoji+" /></td>";
	    addhtml+="<td>"+jine_jiaoji+"<input type='hidden' name='jine_jiaoji[]' value="+jine_jiaoji+" /></td>";
	    addhtml+="<td>"+jiaoji_time+"<input type='hidden' name='jiaoji_time[]' value="+jiaoji_time+" /></td>";
	    addhtml+="<td>"+jiaoji_place+"<input type='hidden' name='jiaoji_place[]' value="+jiaoji_place+" /></td>";
	    addhtml+="<td>"+company+"<input type='hidden' name='company[]' value="+company+" /></td>";
	    addhtml+="<td>"+personal+"<input type='hidden' name='personal[]' value="+personal+" /></td>";
	    addhtml+="<td>"+kehu_jiaoji+"<input type='hidden' name='kehu_jiaoji[]' value="+kehu_jiaoji+" /></td>";
	    addhtml+="<td>"+dnumber_jiaoji+"<input type='hidden' name='dnumber_jiaoji[]' value="+dnumber_jiaoji+" /></td>";
	    addhtml+="<td><input type='button' value='删除' onclick='deleterow(this)' /></td></tr>";
	    $("#jiaoji_list").append(addhtml);
		 }
	 }
	}
	else {
		alert("请将信息填写完整后再添加！");
	}
}
else if(tablenum==4){	
	var receipt_lipin=document.getElementById('receipt_lipin').value;
	var Currency_lipin=document.getElementById('Currency_lipin').value;
	var parity_lipin=document.getElementById('parity_lipin').value;
	var jine_lipin=document.getElementById('jine_lipin').value;
	var lipin_time=document.getElementById('lipin_time').value;
	var lipin_name=document.getElementById('lipin_name').value;
	var lipin_company=document.getElementById('lipin_company').value;	
	var lipin_personal=document.getElementById('lipin_personal').value;	
	var kehu_lipin=document.getElementById('kehu_lipin').value;	
	var dnumber_lipin=document.getElementById('dnumber_lipin').value;
	var tab = document.getElementById("lipin_list") ;
	var rows = tab.rows.length;	
 if((receipt_lipin!="")&&(jine_lipin!="")&&(Currency_lipin!=0)&&(lipin_time!="")&&(lipin_name!="")&&(lipin_company!="")&&(lipin_personal!="")&&(kehu_lipin!="")&&(dnumber_lipin!="")){ 
	 if(CheckINT(dnumber_lipin)!=1){
		alert("请输入正确的单据数目！");
	}
	else {
	if(confirm( "确定添加到列表? ")){
	  $("#zongjine").attr("value",(Number(zongjine)+Number(jine_lipin)).toFixed(2));
	  var addhtml="<tr><td>"+(rows+1)+"</td>";
	    addhtml+="<td>"+receipt_lipin+"<input type='hidden' name='receipt_lipin[]' value="+receipt_lipin +" /></td>";
	    addhtml+="<td>"+Currency_lipin+"<input type='hidden' name='Currency_lipin[]' value="+Currency_lipin +" /></td>";
	    addhtml+="<td>"+parity_lipin+"<input type='hidden' name='parity_lipin[]' value="+parity_lipin+" /></td>";
	    addhtml+="<td>"+jine_lipin+"<input type='hidden' name='jine_lipin[]' value="+jine_lipin+" /></td>";
	    addhtml+="<td>"+lipin_time+"<input type='hidden' name='lipin_time[]' value="+lipin_time+" /></td>";
	    addhtml+="<td>"+lipin_name+"<input type='hidden' name='lipin_name[]' value="+lipin_name+" /></td>";
	    addhtml+="<td>"+lipin_company+"<input type='hidden' name='lipin_company[]' value="+lipin_company+" /></td>";
	    addhtml+="<td>"+lipin_personal+"<input type='hidden' name='lipin_personal[]' value="+lipin_personal+" /></td>";
	    addhtml+="<td>"+kehu_lipin+"<input type='hidden' name='kehu_lipin[]' value="+kehu_lipin+" /></td>";
	    addhtml+="<td>"+dnumber_lipin+"<input type='hidden' name='dnumber_lipin[]' value="+dnumber_lipin+" /></td>";
	    addhtml+="<td><input type='button' value='删除' onclick='deleterow(this)' /></td></tr>";
	    $("#lipin_list").append(addhtml);
		 }
	 }
	}
	else {
		alert("请将信息填写完整后再添加！");
	}
}
else if(tablenum==5){	
	var receipt_zichan=document.getElementById('receipt_zichan').value;
	var Currency_zichan=document.getElementById('Currency_zichan').value;
	var parity_zichan=document.getElementById('parity_zichan').value;
	var jine_zichan=document.getElementById('jine_zichan').value;
	var zichan_time=document.getElementById('zichan_time').value;
	var zichan_name=document.getElementById('zichan_name').value;
	var yongtu=document.getElementById('yongtu').value;
	var dnumber_zichan=document.getElementById('dnumber_zichan').value;
	var tab = document.getElementById("zichan_list");
	var rows = tab.rows.length;	
 if((receipt_zichan!="")&&(jine_zichan!="")&&(Currency_zichan!=0)&&(zichan_time!="")&&(zichan_name!="")&&(yongtu!="")&&(dnumber_zichan!="")){ 
	 if(CheckINT(dnumber_zichan)!=1){
		alert("请输入正确的单据数目！");
	}
	else {
	if(confirm( "确定添加到列表? ")){
	  $("#zongjine").attr("value",(Number(zongjine)+Number(jine_zichan)).toFixed(2));
	  var addhtml="<tr><td>"+(rows+1)+"</td>";
	    addhtml+="<td>"+receipt_zichan+"<input type='hidden' name='receipt_zichan[]' value="+receipt_zichan +" /></td>";
	    addhtml+="<td>"+Currency_zichan+"<input type='hidden' name='Currency_zichan[]' value="+Currency_zichan +" /></td>";
	    addhtml+="<td>"+parity_zichan+"<input type='hidden' name='parity_zichan[]' value="+parity_zichan+" /></td>";
	    addhtml+="<td>"+jine_zichan+"<input type='hidden' name='jine_zichan[]' value="+jine_zichan+" /></td>";
	    addhtml+="<td>"+zichan_time+"<input type='hidden' name='zichan_time[]' value="+zichan_time+" /></td>";
	    addhtml+="<td>"+zichan_name+"<input type='hidden' name='zichan_name[]' value="+zichan_name+" /></td>";
	    addhtml+="<td>"+yongtu+"<input type='hidden' name='yongtu[]' value="+yongtu+" /></td>";
	    addhtml+="<td>"+dnumber_zichan+"<input type='hidden' name='dnumber_zichan[]' value="+dnumber_zichan+" /></td>";
	    addhtml+="<td><input type='button' value='删除' onclick='deleterow(this)' /></td></tr>";
	    $("#zichan_list").append(addhtml);
		 }
	 }
	}
	else {
		alert("请将信息填写完整后再添加！");
	}
}
else if(tablenum==6){	
	var receipt_tongyong=document.getElementById('receipt_tongyong').value;
	var Currency_tongyong=document.getElementById('Currency_tongyong').value;
	var parity_tongyong=document.getElementById('parity_tongyong').value;
	var jine_tongyong=document.getElementById('jine_tongyong').value;
	var tongyong_time=document.getElementById('tongyong_time').value;
	var shiyongmudi=document.getElementById('shiyongmudi').value;
	var mingxi=document.getElementById('mingxi').value;
	var kehu_tongyong=document.getElementById('kehu_tongyong').value;
	var dnumber_tongyong=document.getElementById('dnumber_tongyong').value;
	var tab = document.getElementById("tongyong_list");
	var rows = tab.rows.length;	
 if((receipt_tongyong!="")&&(jine_tongyong!="")&&(Currency_tongyong!=0)&&(tongyong_time!="")&&(kehu_tongyong!="")&&(shiyongmudi!="")&&(dnumber_tongyong!="")){ 
	 if(CheckINT(dnumber_tongyong)!=1){
		alert("请输入正确的单据数目！");
	}
	else {
	if(confirm( "确定添加到列表? ")){
	  $("#zongjine").attr("value",(Number(zongjine)+Number(jine_tongyong)).toFixed(2));
	  var addhtml="<tr><td>"+(rows+1)+"</td>";
	    addhtml+="<td>"+receipt_tongyong+"<input type='hidden' name='receipt_tongyong[]' value="+receipt_tongyong +" /></td>";
	    addhtml+="<td>"+Currency_tongyong+"<input type='hidden' name='Currency_tongyong[]' value="+Currency_tongyong +" /></td>";
	    addhtml+="<td>"+parity_tongyong+"<input type='hidden' name='parity_tongyong[]' value="+parity_tongyong+" /></td>";
	    addhtml+="<td>"+jine_tongyong+"<input type='hidden' name='jine_tongyong[]' value="+jine_tongyong+" /></td>";
	    addhtml+="<td>"+tongyong_time+"<input type='hidden' name='tongyong_time[]' value="+tongyong_time+" /></td>";
	    addhtml+="<td>"+shiyongmudi+"<input type='hidden' name='shiyongmudi[]' value="+shiyongmudi+" /></td>";
	    addhtml+="<td>"+mingxi+"<input type='hidden' name='mingxi[]' value="+mingxi+" /></td>";
	    addhtml+="<td>"+kehu_tongyong+"<input type='hidden' name='kehu_tongyong[]' value="+kehu_tongyong+" /></td>";
	    addhtml+="<td>"+dnumber_tongyong+"<input type='hidden' name='dnumber_tongyong[]' value="+dnumber_tongyong+" /></td>";
	    addhtml+="<td><input type='button' value='删除' onclick='deleterow(this)' /></td></tr>";
	    $("#tongyong_list").append(addhtml);
		 }
	 }
	}
	else {
		alert("请将信息填写完整后再添加！");
	}
}
}
//控制显隐 
 function change_type(obj) {
	  var strsel = obj.options[obj.selectedIndex].value;
	  window.numb=strsel;
		if(strsel==1){			
			$('#jiaotongfei').show();
			$('#table1').show();
		    $('#chailvfei').hide();
			$('#table2').hide();
		    $('#jiaojifei').hide();
			$('#table3').hide();
		    $('#lipinfei').hide();
			$('#table4').hide();
		    $('#zichan').hide();
			$('#table5').hide();
		    $('#tongyong').hide();
			$('#table6').hide();
		}
		else if(strsel==2){    	
			 $('#jiaotongfei').hide();
			 $('#table1').hide();
		     $('#chailvfei').show();
			 $('#table2').show();
			 $('#jiaojifei').hide();
			 $('#table3').hide();
			 $('#lipinfei').hide();
			 $('#table4').hide();
			 $('#zichan').hide();
			 $('#table5').hide();
			 $('#tongyong').hide();
			 $('#table6').hide();
	   }	
		else if(strsel==3){    	
			 $('#jiaotongfei').hide();
			 $('#table1').hide();
		     $('#chailvfei').hide();
			 $('#table2').hide();
			 $('#jiaojifei').show();
			 $('#table3').show();
			 $('#lipinfei').hide();
			 $('#table4').hide();
			 $('#zichan').hide();
			 $('#table5').hide();
			 $('#tongyong').hide();
			 $('#table6').hide();
	   }
		else if(strsel==4){    	
			 $('#jiaotongfei').hide();
			 $('#table1').hide();
		     $('#chailvfei').hide();
			 $('#table2').hide();
			 $('#jiaojifei').hide();
			 $('#table3').hide();
			 $('#lipinfei').show();
			 $('#table4').show();
			 $('#zichan').hide();
		     $('#table5').hide();
			 $('#tongyong').hide();
			 $('#table6').hide();
	   }
		else if(strsel==5){    	
			 $('#jiaotongfei').hide();
			 $('#table1').hide();
		     $('#chailvfei').hide();
			 $('#table2').hide();
			 $('#jiaojifei').hide();
			 $('#table3').hide();
			 $('#lipinfei').hide();
			 $('#table4').hide();
			 $('#zichan').show();
		     $('#table5').show();
			 $('#tongyong').hide();
			 $('#table6').hide();
	   }
		else if(strsel==6){    	
			 $('#jiaotongfei').hide();
			 $('#table1').hide();
		     $('#chailvfei').hide();
			 $('#table2').hide();
			 $('#jiaojifei').hide();
			 $('#table3').hide();
			 $('#lipinfei').hide();
			 $('#table4').hide();
			 $('#zichan').hide();
		     $('#table5').hide();
			 $('#tongyong').show();
			 $('#table6').show();
	   }
 }
 
//删除行并修改序号
 function deleterow(obj){
     var tr=obj.parentNode.parentNode;
     var strsel=window.numb;
     var money;
     var zongjine=document.getElementById('zongjine').value;
     if((strsel==1)||(strsel==2)){
    	 money=tr.cells[5].getElementsByTagName("input")[0].value;
     } 
     if((strsel==3)||(strsel==4)||(strsel==5)||(strsel==6)){
    	 money=tr.cells[4].getElementsByTagName("input")[0].value;
     }
     var tbody=tr.parentNode;
	 if(confirm( "确定删除? ")){
	  $("#zongjine").attr("value",(Number(zongjine)-Number(money)).toFixed(2));
	   tbody.removeChild(tr);
	   for (var i = 0; i < tbody.rows.length; i++){
//    	 $(tbody.rows[i].cells[0]).attr("innerHTML",i+1);
		   tbody.rows[i].cells[0].innerHTML=i+1;
	    }
	 } 
 }
 
//获取汇率
 function get_huilv(obj){
	 var tablenum=window.numb;
	 if(tablenum==1){ 
		var receipt=document.getElementById('receipt').value;
		var Currency=document.getElementById('Currency').value;
		if(receipt==""){
			alert("请先填写收据金额！");
		}
		else if(receipt<=0){
			alert("收据金额应大于0！");
		}
		else if(Currency==0) {
			alert("请选择币种！");
		}
		else {
			var ismoney=checkMoney(receipt);
			if(ismoney==1){			
				 var name = obj.options[obj.selectedIndex].value;
				 $.ajax({
					  type: "POST",
					  url: $("#huilv").attr("href"),
					  data: "huilvname="+name,
					  cache: false,
					  success: function(html){
					    $("#parity").attr("value",html);
					    $("#jine").attr("value",(html*receipt).toFixed(2));
					  }
					});
			}
			else {
				alert("请先填写正确格式的收据金额！");
			}		
		}
	 }
	else if(tablenum==2){ 
			var receipt=document.getElementById('receipt_chai').value;
			var Currency_chai=document.getElementById('Currency_chai').value;
			if(receipt==""){
				alert("请先填写收据金额！");
			}
			else if(receipt<=0){
				alert("收据金额应大于0！");
			}
			else if(Currency_chai==0) {
				alert("请选择币种！");
			}
			else {
				var ismoney=checkMoney(receipt);
				if(ismoney==1){			
					 var name = obj.options[obj.selectedIndex].value;
					 $.ajax({
						  type: "POST",
						  url: $("#huilv").attr("href"),
						  data: "huilvname="+name,
						  cache: false,
						  success: function(html){
						    $("#parity_chai").attr("value",html);
						    $("#jine_chai").attr("value",(html*receipt).toFixed(2));
						  }
						});
				}
				else {
					alert("请先填写正确格式的收据金额！");
				}		
			}
		 }
	else if(tablenum==3){ 
		var receipt=document.getElementById('receipt_jiaoji').value;
		var Currency_jiaoji=document.getElementById('Currency_jiaoji').value;
		if(receipt==""){
			alert("请先填写收据金额！");
		}
		else if(receipt<=0){
			alert("收据金额应大于0！");
		}
		else if(Currency_jiaoji==0) {
			alert("请选择币种！");
		}
		else {
			var ismoney=checkMoney(receipt);
			if(ismoney==1){			
				 var name = obj.options[obj.selectedIndex].value;
				 $.ajax({
					  type: "POST",
					  url: $("#huilv").attr("href"),
					  data: "huilvname="+name,
					  cache: false,
					  success: function(html){
					    $("#parity_jiaoji").attr("value",html);
					    $("#jine_jiaoji").attr("value",(html*receipt).toFixed(2));
					  }
					});
			}
			else {
				alert("请先填写正确格式的收据金额！");
			}		
		}
	 }
	else if(tablenum==4){ 
		var receipt=document.getElementById('receipt_lipin').value;
		var Currency_lipin=document.getElementById('Currency_lipin').value;
		if(receipt==""){
			alert("请先填写收据金额！");
		}
		else if(receipt<=0){
			alert("收据金额应大于0！");
		}
		else if(Currency_lipin==0) {
			alert("请选择币种！");
		}
		else {
			var ismoney=checkMoney(receipt);
			if(ismoney==1){			
				 var name = obj.options[obj.selectedIndex].value;
				 $.ajax({
					  type: "POST",
					  url: $("#huilv").attr("href"),
					  data: "huilvname="+name,
					  cache: false,
					  success: function(html){
					    $("#parity_lipin").attr("value",html);
					    $("#jine_lipin").attr("value",(html*receipt).toFixed(2));
					  }
					});
			}
			else {
				alert("请先填写正确格式的收据金额！");
			}		
		}
	 }
	else if(tablenum==5){ 
		var receipt=document.getElementById('receipt_zichan').value;
		var Currency_zichan=document.getElementById('Currency_zichan').value;
		if(receipt==""){
			alert("请先填写收据金额！");
		}
		else if(receipt<=0){
			alert("收据金额应大于0！");
		}
		else if(Currency_zichan==0) {
			alert("请选择币种！");
		}
		else {
			var ismoney=checkMoney(receipt);
			if(ismoney==1){			
				 var name = obj.options[obj.selectedIndex].value;
				 $.ajax({
					  type: "POST",
					  url: $("#huilv").attr("href"),
					  data: "huilvname="+name,
					  cache: false,
					  success: function(html){
					    $("#parity_zichan").attr("value",html);
					    $("#jine_zichan").attr("value",(html*receipt).toFixed(2));
					  }
					});
			}
			else {
				alert("请先填写正确格式的收据金额！");
			}		
		}
	 }
	else if(tablenum==6){ 
		var receipt=document.getElementById('receipt_tongyong').value;
		var Currency_tongyong=document.getElementById('Currency_tongyong').value;
		if(receipt==""){
			alert("请先填写收据金额！");
		}
		else if(receipt<=0){
			alert("收据金额应大于0！");
		}
		else if(Currency_tongyong==0) {
			alert("请选择币种！");
		}
		else {
			var ismoney=checkMoney(receipt);
			if(ismoney==1){			
				 var name = obj.options[obj.selectedIndex].value;
				 $.ajax({
					  type: "POST",
					  url: $("#huilv").attr("href"),
					  data: "huilvname="+name,
					  cache: false,
					  success: function(html){
					    $("#parity_tongyong").attr("value",html);
					    $("#jine_tongyong").attr("value",(html*receipt).toFixed(2));
					  }
					});
			}
			else {
				alert("请先填写正确格式的收据金额！");
			}		
		}
	 }
 }
 //提交报销单操作
 function present(){
		var zongjine=document.getElementById('zongjine').value;
		var leibie=document.getElementById('leibie').value;
		if((leibie)=="0"){
			alert("请选择报销类别！");
			return false;
		}
		else if(zongjine<=0){			
			alert("请填写报销明细！");
			return false;
		}
		else {if(confirm( "确定提交报销单? ")){
		return true;		
		}	
		else {
			return false;
			}
		}
 }
 //验证是否为金额
 function checkMoney(val){
  var reg = /^(([1-9]*\d{0,})|([0-9]+\.[0-9]{1,2}))$/;
     
  if(reg.test(val)){
    	 return 1;
     }
    	 else {
    		 return 0; 
    	 }    
 } 
 //验证数字
 function CheckINT(input)
 {
 var reg1 =  /^\d+$/;
 if(reg1.test(input)){
	 return 1;
 }
 else {
	 return 0;
 } 
 } 
 //获得天数
 function get_days(){
   var startchai=document.getElementById('startchai').value;
   var endchai=document.getElementById('endchai').value;
   if((startchai!="")&&(endchai!="")){
	   if(startchai>=endchai){
		   alert("请选择正确的起始时间和结束时间！");
	   }
	   else {		   
		   var dt1=new Date(startchai.substr(0,4),startchai.substr(5,2),startchai.substr(8,2),startchai.substr(11,2),startchai.substr(14,2),'00');
		   var dt2=new Date(endchai.substr(0,4),endchai.substr(5,2),endchai.substr(8,2),endchai.substr(11,2),endchai.substr(14,2),'00');   
		  var  m=parseInt((dt2-dt1)/1000/60/60/24);
		  var  n=(dt2-dt1)/1000/60/60/24;
		  var day;
		  if(n==m){
			  day=n;
		  }
		  else if(n-m<=0.5){	
			  day=m+0.5;
		  }
		  else {
			  day=m+1;
			  }
		  $("#days").attr("value",day);
	   }
   }
   else {
	   alert("起始时间和结束时间都不能为空！");
	   
   } 
 }
 
 function get_butie(value1,value2,value3){	 
	 $.ajax({
		  type: "POST",
		  url: $("#butie").attr("href"),
		  data: {mudi:value1,jine:value2,day:value3},
		  cache: false,
		  success: function(html){
		  if(html=='success'){window.butie=1;}
		  else if(html=='failure')  {window.butie=-1;}
		  }
		});
 }