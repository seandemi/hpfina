function chkInputContent(name) {
	var inputContent = $.trim($(name).val());//"#addStationId"
	if( inputContent == "" ) {
		return 0;
	} else if ( /^\d+$/.test( inputContent ) ){
		//��������ֻ��Ϊ����
		return 1;
	}  else {
		return -1;
	}
	
}

function chkInputContent1(name) {
	var inpContent = $.trim($(name).val());
	if (inpContent == "") {
		return 0;
	} else if( /^[a-zA-Z\d\u4e00-\u9fa5]+$/.test( inpContent ) ){
		//�������ݿ���Ϊ����,Ӣ����ĸ�������ִ�Сд��������
		return 1;
	}
	else {
		return -1;
	}
}

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

function chkemail(name) {
	var inputContent = $.trim($(name).val());
	if( inputContent == "" ) {
		return 0;
	} else if ( /^(?:[a-z\d]+[_\-\+\.]?)*[a-z\d]+@(?:([a-z\d]+\-?)*[a-z\d]+\.)+([a-z]{2,})+$/i.test( inputContent ) ){
		//��������ֻ��Ϊ����
		return 1;
	}  else {
		return -1;
	}
	//if ( /[a-z\d\u4e00-\u9fa5]/.test( inputContent ) ) {
			//return -6;
		//} else if (fLen( inputContent )<6 || fLen( inputContent )>18 ){
			//�Ϸ�����Ϊ6-18���ַ�
			//return -2;
		//} 
}



function chkInputInfoContent(name) {
	var inpContent = $.trim($(name).val());
	if (inpContent == "") {
		return 0;
	} else if( /^[a-zA-Z\d\u4e00-\u9fa5,\.\?\!;:"'\s]+$/.test( inpContent ) ){
		//�������ݿ���Ϊ����,Ӣ����ĸ�������ִ�Сд��������
		return 1;
	}
	else 
	{
		return -1;
	}
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
	
	
	
	/*** ----------- �û���������¼� ----------- ***/
	$("#username").bind("focus", function() {
		
		$("#username").attr("class","focus");
		$("#username_in").show();
		$("#username_error").hide();
		$("#username_succeed").hide();
		$("#name_error").hide();
		return false;
	});
	
	$("#username").bind("blur", function() {	
		var ret=chkInputContent1("#username");
		$("#username").attr("class","text");
		$("#username_in").hide();
		$("#username_error").hide();
		$("#username_succeed").hide();
		$("#name_error").hide();
		
		if(ret>0) {
			$("#username").attr("class","text");
			if(ifinrule == false){}
			$("#username_in").hide();
			$("#username_error").hide();
			$("#username_succeed").show();
			$("#name_error").hide();
		} else if(ret==0){
			
			//�ı������Ϊ��,��ʾ����
			$("#username").attr("class","text");
			$("#username_in").hide();
			
			$("#name_error").hide();
			$("#username_error").hide();
			$("#username_succeed").hide();

		} else {
			
			//�����ı���ǩ��ʽ
			$("#username").attr("class","error");
			
			//��ʾ������ʾͼ��
			$("#username_error").show();
			$("#username_succeed").hide();
			
			//����������ʾ����
			$("#username_in").hide();
			
			//���ı�������
			$("#name_error").show();
			/* if(ret == -1) {
				
				//��ʾ����Ĵ�������
				$("#sername_error").empty();
				$("#sername_error").append("������Ϣֻ��Ϊ���ġ�Ӣ�ģ������ִ�Сд�����������.");
		    }*/
		}
		return false;
	});

    $("#username").bind("keydown", function(event){
		event = fGetEvent();
		var namelen=getinputamelength("#username");
		
		if (event.keyCode == 13) { 
			if(event.preventDefault) {    
		      
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#username").blur();
		}
		return true;
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
	  
    /*** ----------- �û����������¼� ----------- ***/
    $("#User_id").bind("focus", function() {
		$("#User_id").attr("class","focus");
		$("#Uid_in").show();
		$("#Userid_succeed").hide();
		$("#Userid_error").hide();
		$("#Uid_error").hide();
		
    });


	
	$("#User_id").bind("blur", function() {	
		var ret=chkInputContent("#User_id");
		if(ret>0) {
			$("#User_id").attr("class","text");
			
			$("#Uid_in").hide();
			$("#Userid_succeed").show();
			$("#Userid_error").hide();
			$("#Uid_error").hide();
		} else if(ret==0){
			
			//�ı������Ϊ��,��ʾ����
			$("#User_id").attr("class","text");
			$("#Uid_in").hide();
			$("#Userid_succeed").hide();
			$("#Userid_error").hide();
			$("#Uid_error").hide();

		} else {
			$("#User_id").attr("class","error");
			$("#Uid_in").hide();
			$("#Userid_succeed").hide();
			$("#Userid_error").show();
			$("#Uid_error").show();
		}
		return false;
	});

    $("#User_id").bind("keydown", function(event){
		event = fGetEvent();
		var namelen=getinputamelength("#User_id");
		
		if (event.keyCode == 13) { 
			if(event.preventDefault) {    
		      
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#User_id").blur();
		}
		return true;
		
	});
    /*** ----------- ���ڲ���������¼� ----------- r***/
    $("#User_Breau").bind("focus", function() {
		$("#User_Breau").attr("class","focus");
		
		$("#UB_in").show();
		$("#UserBreau_error").hide();
		$("#UserBreau_succeed").hide();
		$("#UB_error").hide();
		return false;
	});
	
	$("#User_Breau").bind("blur", function() {	
		var ret=chkInputContent1("#User_Breau");
		
		if(ret>0) {
			$("#User_Breau").attr("class","text");			
			$("#UB_in").hide();
			$("#UserBreau_error").hide();
			$("#UserBreau_succeed").show();
			$("#UB_error").hide();
		} else if(ret==0){
			
			//�ı������Ϊ��,��ʾ����
			$("#User_Breau").attr("class","text");
			$("#UB_in").hide();
			$("#UserBreau_error").hide();
			$("#UserBreau_succeed").hide();
			$("#UB_error").hide();

		} else {
			$("#User_Breau").attr("class","error");
			$("#UB_in").hide();
			$("#UserBreau_error").show();
			$("#UserBreau_succeed").hide();
			$("#UB_error").show();
		}
		return false;
	});

    $("#User_Breau").bind("keydown", function(event){
		event = fGetEvent();
		var namelen=getinputamelength("#User_Breau");
		
		if (event.keyCode == 13) { 
			if(event.preventDefault) {    
  
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#User_Breau").blur();
		}
		return true;
	});
    /*** ----------- �û��������������¼� ----------- ***/
    $("#group_id").bind("focus", function() {
		$("#group_id").attr("class","focus");
		$("#group_in").show();
		$("#group_succeed").hide();
		$("#group_error").hide();
		$("#gro_error").hide();
		
    });


	
	$("#group_id").bind("blur", function() {	
		var ret=chkInputContent("#group_id");
		if(ret>0) {
			$("#group_id").attr("class","text");
			
			$("#group_in").hide();
			$("#group_succeed").show();
			$("#group_error").hide();
			$("#gro_error").hide();
		} else if(ret==0){
			
			//�ı������Ϊ��,��ʾ����
			$("#group_id").attr("class","text");
			$("#group_in").hide();
			$("#group_succeed").hide();
			$("#group_error").hide();
			$("#gro_error").hide();

		} else {
			$("#group_id").attr("class","error");
			$("#group_in").hide();
			$("#group_succeed").hide();
			$("#group_error").show();
			$("#gro_error").show();
		}
		return false;
	});

    $("#group_id").bind("keydown", function(event){
		event = fGetEvent();
		var namelen=getinputamelength("#group_id");

		if (event.keyCode == 13) { 
			if(event.preventDefault) { 
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#group_id").blur();
		}
		return true;
		
	});
    
    /*** ----------- �绰����������¼� ----------- ***/
    $("#User_phone").bind("focus", function() {
		$("#User_phone").attr("class","focus");
		$("#UP_in").show();
		$("#Userphone_succeed").hide();
		$("#Userphone_error").hide();
		$("#UP_error").hide();
		
    });


	
	$("#User_phone").bind("blur", function() {	
		var ret=chkInputContent("#User_phone");
		if(ret>0) {
			$("#User_phone").attr("class","text");
			
			$("#UP_in").hide();
			$("#Userphone_succeed").show();
			$("#Userphone_error").hide();
			$("#UP_error").hide();
		} else if(ret==0){
			
			//�ı������Ϊ��,��ʾ����
			$("#User_phone").attr("class","text");
			$("#UP_in").hide();
			$("#Userphone_succeed").hide();
			$("#Userphone_error").hide();
			$("#UP_error").hide();

		} else {
			$("#User_phone").attr("class","error");
			$("#UP_in").hide();
			$("#Userphone_succeed").hide();
			$("#Userphone_error").show();
			$("#UP_error").show();
		}
		return false;
	});

    $("#User_phone").bind("keydown", function(event){
		event = fGetEvent();
		var namelen=getinputamelength("#User_phone");

		if (event.keyCode == 13) { 
			if(event.preventDefault) { 
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#User_phone").blur();
		}
		return true;
		
	});
    
    
    /*** ----------- ����������¼� ----------- ***/
    $("#User_mail").bind("focus", function() {
		$("#User_mail").attr("class","focus");
		$("#mail_in").show();
		$("#mail_succeed").hide();
		$("#mail_error").hide();
		$("#mailerror").hide();
		
    });


	
	$("#User_mail").bind("blur", function() {	
		var ret=chkemail("#User_mail");
		if(ret>0) {
			$("#User_mail").attr("class","text");
			
			$("#mail_in").hide();
			$("#mail_succeed").show();
			$("#mail_error").hide();
			$("#mailerror").hide();
		} else if(ret==0){
			
			//�ı������Ϊ��,��ʾ����
			$("#User_mail").attr("class","text");
			$("#mail_in").hide();
			$("#mail_succeed").hide();
			$("#mail_error").hide();
			$("#mailerror").hide();

		} else {
			$("#User_mail").attr("class","error");
			$("#mail_in").hide();
			$("#mail_succeed").hide();
			$("#mail_error").show();
			$("#mailerror").show();
		}
		return false;
	});

    $("#User_mail").bind("keydown", function(event){
		event = fGetEvent();
		var namelen=getinputamelength("#User_mail");
	
		if (event.keyCode == 13) { 
			if(event.preventDefault) {    
  
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
  
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#User_mail").blur();
		}
		return true;
		
	});
});


function doSubmit() {
	//������Ϣ���ж�
	var usernameOK = chkInputContent1("#username");
	var pwdOK = check("#pwd");
	var pwd2OK = checkpassword("#pwd2");
	var User_idOK = chkInputContent("#User_id");
	var User_BreauOK = chkInputContent1("#User_Breau");
	var User_phoneOK = chkInputContent("#User_phone");
	var User_mailOK = chkemail("#User_mail");
	
	
	if ( (usernameOK == 1) && (pwdOK == 1) && (pwd2OK == 1) && (User_idOK == 1) && (User_BreauOK == 1) && 
			(User_phoneOK >= 0) && (User_mailOK >= 0)) {
		
		document.forms[0].action = "regster_succeed.php";
	} else {
		window.alert("ע����Ϣ����д������");

	}
}

function add_Submit() {
	//������Ϣ���ж�
	var usernameOK = chkInputContent1("#username");
	var pwdOK = check("#pwd");
	var pwd2OK = checkpassword("#pwd2");
	var User_idOK = chkInputContent("#User_id");
	var User_BreauOK = chkInputContent1("#User_Breau");
	var User_phoneOK = chkInputContent("#User_phone");
	var User_mailOK = chkemail("#User_mail");
	var Group_idok = chkInputContent("#group_id");
	
	
	if ( (usernameOK == 1) && (pwdOK == 1) && (pwd2OK == 1) && (User_idOK == 1) && (User_BreauOK == 1) && 
			(User_phoneOK >= 0) && (User_mailOK >= 0)&& (Group_idok == 1)) {
		
		document.forms[0].action = "adduser_succeed.php";
	} else {
		window.alert("ע����Ϣ����д������");

	}
}
