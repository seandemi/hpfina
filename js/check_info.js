//��֤�����˺�
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

function chkInput(name) {
	var inpContent = $.trim($(name).val());
	if (inpContent == "") {
		return 0;
	} else if(inpContent.length<=100 ){
		//�������ݿ���Ϊ����,Ӣ����ĸ�������ִ�Сд��������
		return 1;
	}
	else {
		return -1;
	}
}

//��֤�̶��绰����
function check_phone(name){
	var reg3 = /^(\d{3,4})-(\d{7,8})/;
	var inpContent = $.trim($(name).val());
	if (inpContent == "") {
		return 0;
	} else if(reg3.test( inpContent ) ){
		//�������ݿ���Ϊ����,Ӣ����ĸ�������ִ�Сд��������
		return 1;
	}
	else {
		return -1;
	}
}
//��֤���֤����
function verify(name){ 
	var inpContent = $.trim($(name).val());
	if (inpContent == "") {
		return 0;
	} else if((inpContent.length!=18)&&(inpContent.length!=15) ){
		//�������ݿ���Ϊ����,Ӣ����ĸ�������ִ�Сд��������
		return -1;
	}
	else {
		return 1; 
}
}


//��֤�ֻ�����
function checkid(name) {
	var inputContent = $.trim($(name).val());
	var reg3=/^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/;
	if( inputContent == "" ) {
		return 0;
	} 
	
	else  if ( !reg3.test( inputContent ) ){

		return -1;
	} 
	
	else {
		return 1;
	}
}


//��֤����
function check_name(name){
	var reg3 = /^[\u4e00-\u9fa5]+$/gi;
	var inpContent = $.trim($(name).val());
	if (inpContent == "") {
		return 0;
	} else if(reg3.test( inpContent ) ){
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
//��֤�����Ƿ�Ϸ�
function isDate(oStartDate){
	  var a=/^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})/;
	if (!a.test(oStartDate)){
	  return -1;
	 } else{
	   return 1;
	 }
	}

function getinputamelength(name) {
	var inputNa = $.trim($(name).val());
	return inputNa.length;
}


$(document).ready(function() {
	
	var ifinrule=false;
	$("#time_in").bind("mouseover", function(){
		ifinrule=true;
	});
	$("#time_in").bind("mouseout", function(){
		ifinrule=false;
	});
	

    /*** ----------- �̶��绰������¼� ----------- ***/
    $("#User_phone").bind("focus", function() {
		$("#User_phone").attr("class","focus");
		$("#UP_in").show();
		$("#Userphone_succeed").hide();
		$("#Userphone_error").hide();
		$("#UP_error").hide();
		
    });


	
	$("#User_phone").bind("blur", function() {	
		var ret=check_phone("#User_phone");
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
    
    
    /*** -----------�ֻ�����������¼� ----------- ***/
    $("#phone").bind("focus", function() {
		$("#phone").attr("class","focus");
		$("#telephone_in").show();
		$("#phone_succeed").hide();
		$("#phone_error").hide();
		$("#telephone_error").hide();
		
    });	
	$("#phone").bind("blur", function() {	
		var ret=checkid("#phone");
		if(ret>0) {
			$("#phone").attr("class","text");
			
			$("#telephone_in").hide();
			$("#phone_succeed").show();
			$("#phone_error").hide();
			$("#telephone_error").hide();
		} else if(ret==0){
			
			//�ı������Ϊ��,��ʾ����
			$("#phone").attr("class","text");
			$("#telephone_in").hide();
			$("#phone_succeed").hide();
			$("#phone_error").hide();
			$("#telephone_error").hide();

		} else {
			$("#phone").attr("class","error");
			$("#telephone_in").hide();
			$("#phone_succeed").hide();
			$("#phone_error").show();
			$("#telephone_error").show();
		}
		return false;
	});

    $("#phone").bind("keydown", function(event){
		event = fGetEvent();
		var namelen=getinputamelength("#phone");

		if (event.keyCode == 13) { 
			if(event.preventDefault) { 
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#phone").blur();
		}
		return true;
		
	});
    
    /*** -----------���֤������¼� ----------- ***/
    $("#identity_card").bind("focus", function() {
		$("#identity_card").attr("class","focus");
		$("#card_in").show();
		$("#identity_succeed").hide();
		$("#identity_error").hide();
		$("#card_error").hide();		
    });	
    
	$("#identity_card").bind("blur", function() {	
		var ret=verify("#identity_card");
		if(ret>0) {
			$("#identity_card").attr("class","text");
			
			$("#card_in").hide();
			$("#identity_succeed").show();
			$("#identity_error").hide();
			$("#card_error").hide();
		} else if(ret==0){			
			//�ı������Ϊ��,��ʾ����
			$("#identity_card").attr("class","text");
			$("#card_in").hide();
			$("#identity_succeed").hide();
			$("#identity_error").hide();
			$("#card_error").hide();

		} else {
			$("#identity_card").attr("class","error");
			$("#card_in").hide();
			$("#identity_succeed").hide();
			$("#identity_error").show();
			$("#card_error").show();
		}
		return false;
	});

    $("#identity_card").bind("keydown", function(event){
		event = fGetEvent();
		var namelen=getinputamelength("#identity_card");

		if (event.keyCode == 13) { 
			if(event.preventDefault) { 
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#identity_card").blur();
		}
		return true;
		
	});
    
    
    /*** -----------����������¼� ----------- ***/
    $("#name").bind("focus", function() {
		$("#name").attr("class","focus");
		$("#name_in").show();
		$("#huming_succeed").hide();
		$("#huming_error").hide();
		$("#name_error").hide();		
    });	
    
	$("#name").bind("blur", function() {	
		var ret=check_name("#name");
		if(ret>0) {
			$("#name").attr("class","text");
			
			$("#name_in").hide();
			$("#huming_succeed").show();
			$("#huming_error").hide();
			$("#name_error").hide();
		} else if(ret==0){			
			//�ı������Ϊ��,��ʾ����
			$("#name").attr("class","text");
			$("#name_in").hide();
			$("#huming_succeed").hide();
			$("#huming_error").hide();
			$("#name_error").hide();

		} else {
			$("#name").attr("class","error");
			$("#name_in").hide();
			$("#huming_succeed").hide();
			$("#huming_error").show();
			$("#name_error").show();
		}
		return false;
	});

	   /*** ----------�����˺�������¼� ----------- ***/
    $("#account").bind("focus", function() {
		$("#account").attr("class","focus");
		$("#account_in").show();
		$("#account_succeed").hide();
		$("#account_error").hide();
		$("#numberiP_error").hide();		
    });	
    
	$("#account").bind("blur", function() {	
		var ret=chkInputContent("#account");
		if(ret>0) {
			$("#account").attr("class","text");
			
			$("#account_in").hide();
			$("#account_succeed").show();
			$("#account_error").hide();
			$("#numberiP_error").hide();
		} else if(ret==0){			
			//�ı������Ϊ��,��ʾ����
			$("#account").attr("class","text");
			$("#account_in").hide();
			$("#account_succeed").hide();
			$("#account_error").hide();
			$("#numberiP_error").hide();

		} else {
			$("#account").attr("class","error");
			$("#account_in").hide();
			$("#account_succeed").hide();
			$("#account_error").show();
			$("#numberiP_error").show();
		}
		return false;
	});

    $("#account").bind("keydown", function(event){
		event = fGetEvent();
		var accountlen=getinputamelength("#account");

		if (event.keyCode == 13) { 
			if(event.preventDefault) { 
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#account").blur();
		}
		return true;
		
	});
    
    /*** ----------��������������¼� ----------- ***/
    $("#bank").bind("focus", function() {
		$("#bank").attr("class","focus");
		$("#bank_in").show();
		$("#bank_succeed").hide();
		$("#bank_error").hide();
		$("#berror").hide();		
    });	
    
	$("#bank").bind("blur", function() {	
		var ret=chkInput("#bank");
		if(ret>0) {
			$("#bank").attr("class","text");
			
			$("#bank_in").hide();
			$("#bank_succeed").show();
			$("#bank_error").hide();
			$("#berror").hide();
		} else if(ret==0){			
			//�ı������Ϊ��,��ʾ����
			$("#bank").attr("class","text");
			$("#bank_in").hide();
			$("#bank_succeed").hide();
			$("#bank_error").hide();
			$("#berror").hide();

		} else {
			$("#bank").attr("class","error");
			$("#bank_in").hide();
			$("#bank_succeed").hide();
			$("#bank_error").show();
			$("#berror").show();
		}
		return false;
	});

    $("#bank").bind("keydown", function(event){
		event = fGetEvent();
		var banklen=getinputamelength("#bank");

		if (event.keyCode == 13) { 
			if(event.preventDefault) { 
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#bank").blur();
		}
		return true;
		
	});
    
    /*** ----------��ַ������¼� ----------- ***/
    $("#address").bind("focus", function() {
		$("#address").attr("class","focus");
		$("#addres_in").show();
		$("#addrese_succeed").hide();
		$("#addres_error").hide();
		$("#addreserror").hide();		
    });	
    
	$("#address").bind("blur", function() {	
		var ret=chkInput("#address");
		if(ret>0) {
			$("#address").attr("class","text");
			
			$("#addres_in").hide();
			$("#addrese_succeed").show();
			$("#addres_error").hide();
			$("#addreserror").hide();
		} else if(ret==0){			
			//�ı������Ϊ��,��ʾ����
			$("#address").attr("class","text");
			$("#addres_in").hide();
			$("#addrese_succeed").hide();
			$("#addres_error").hide();
			$("#addreserror").hide();

		} else {
			$("#address").attr("class","error");
			$("#addres_in").hide();
			$("#addrese_succeed").hide();
			$("#addres_error").show();
			$("#addreserror").show();
		}
		return false;
	});

    $("#address").bind("keydown", function(event){
		event = fGetEvent();
		var addresslen=getinputamelength("#address");

		if (event.keyCode == 13) { 
			if(event.preventDefault) { 
				event.preventDefault();    
				event.stopPropagation();    
		     } else {    
		        // IE    
		    	 event.cancelBubble=true;    
		    	 event.returnValue = false;    
		     }  
			$("#address").blur();
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
		var addresslen=getinputamelength("#User_mail");
	
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
	var submit=0;
	
	var Phone = check_phone("#User_phone");
	if (Phone<0){submit+=Phone;}

	var identity_card = verify("#identity_card");
	if (identity_card<0){submit+=identity_card;}
	
	var telephone =checkid("#phone");
	if (telephone<0){submit+=telephone;}
	
	var name = check_name("#name");
	if (name<0){submit+=name;}
	
	var account = chkInputContent("#account");
	if (account<0){submit+=account;}
	
	var User_mail = chkemail("#User_mail");
	if (User_mail<0){submit+=User_mail;}
	

	
	if ( submit<0) {
		
		return false;
	} else {
		return true;
	}
}
