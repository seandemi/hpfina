
function check(name) {
	var inputContent = $.trim($(name).val());
	if( inputContent == "" ) {
		return 0;
	} 
	else  if ( !(/^\w+$/).test( inputContent ) ){
		//��������ֻ��Ϊ���֡���ĸ���»��� 
		return -1;
	} 
	
	else {
		return 1;
	}

}

function checkpassword (name){
	var inputContent = $.trim($(name).val());
	with(document.all){
		if ( inputContent == "" ) {
			return 0;
		} 
	else if (pwd.value==pwd2.value){return 1;}
	else {
		return -1;
	}}		
   }

function getinputamelength(name) {
	var inputNa = $.trim($(name).val());
	return inputNa.length;
}


$(document).ready(function() {
	
	var ifinrule=false;
	$("#username_in").bind("mouseover", function(){
		ifinrule=true;
	});
	$("#username_in").bind("mouseout", function(){
		ifinrule=false;
	});
	
	
	
    
    /*** ----------- ����������¼� ----------- ***/
    $("#pwd").bind("focus", function() {
		$("#pwd").attr("class","focus");
		$("#pdwin").show();
		$("#pwdsucceed").hide();
		$("#pwd_error").hide();
		$("#passworderror").hide();
		
    });


	
	$("#pwd").bind("blur", function() {	
		var ret=check("#pwd");
		
		if(ret>0) {
			$("#pwd").attr("class","text");
			
			$("#pdwin").hide();
			$("#pwdsucceed").show();
			$("#pwd_error").hide();
			$("#passworderror").hide();
		} else if(ret==0){
			
			//�ı������Ϊ��,��ʾ����
			$("#pwd").attr("class","text");
			$("#pdwin").hide();
			$("#pwdsucceed").hide();
			$("#pwd_error").hide();
			$("#passworderror").hide();

		} else {
			$("#pwd").attr("class","error");
			$("#pdwin").hide();
			$("#pwdsucceed").hide();
			$("#pwd_error").show();
			$("#passworderror").show();
		}
		return false;
	});
	  $("#pdw").bind("keydown", function(event){
			event = fGetEvent();
			var namelen=getinputamelength("#pdw");
		
			if (event.keyCode == 13) { 
				if(event.preventDefault) {    
			       
					event.preventDefault();    
					event.stopPropagation();    
			     } else {    
			        // IE    
			    	 event.cancelBubble=true;    
			    	 event.returnValue = false;    
			     }  
				$("#pdw").blur();
			}
			return true;
		});
  
	  /*** ----------- ��������������¼� ----------- ***/
	    $("#pwd2").bind("focus", function() {
			$("#pwd2").attr("class","focus");
			$("#pdw2_in").show();
			$("#pwd2_succeed").hide();
			$("#pwd2_error").hide();
			$("#password2_error").hide();
			
	    });


		
		$("#pwd2").bind("blur", function() {	
			var ret=checkpassword("#pwd2");
           if(ret==0){
				
				//�ı������Ϊ��,��ʾ����
				$("#pwd2").attr("class","text");
				$("#pdw2_in").hide();
				$("#pwd2_succeed").hide();
				$("#pwd2_error").hide();
				$("#password2_error").hide();

			} 
			 else if(ret>0) {
					$("#pwd2").attr("class","text");
					
					$("#pdw2_in").hide();
					$("#pwd2_succeed").show();
					$("#pwd2_error").hide();
					$("#password2_error").hide();
				} else {
				$("#pwd2").attr("class","error");
				$("#pdw2_in").hide();
				$("#pwd2_succeed").hide();
				$("#pwd2_error").show();
				$("#password2_error").show();
			}
			return false;
		});
		  $("#pwd2").bind("keydown", function(event){
				event = fGetEvent();
				var namelen=getinputamelength("#pwd2");
				
				if (event.keyCode == 13) { 
					if(event.preventDefault) {    
				        // Firefox    
						event.preventDefault();    
						event.stopPropagation();    
				     } else {    
				        // IE    
				    	 event.cancelBubble=true;    
				    	 event.returnValue = false;    
				     }  
					$("#pwd2").blur();
				}
				return true;
			});
});

function doSubmit() {
	//������Ϣ���ж�
	var pwdOK = check("#pwd");
	var pwd2OK = checkpassword("#pwd2");
	//var code = document.getElementById("code").value;
	var pwd = document.getElementById("pwd").value; 
	var pwd2 = document.getElementById("pwd2").value; 	
	
	if ( (pwdOK == 1) && (pwd2OK == 1)) {
	//	document.forms[0].action = "change_pwd";
		return true;

	} else {		
		window.alert("�뽫������Ϣ��д������");
		return false;
	}
}
