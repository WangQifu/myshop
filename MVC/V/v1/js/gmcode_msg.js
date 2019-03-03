
/*获取验证码-注册*/
var isPhone = 1;
var code_msg = "";
var numc_yz = 0; 
var verify = 0;
function getCode(e){
	checkPhone(); //验证手机号码
	if(isPhone){
		ajaxPost();//提交
		resetCode(); //倒计时
	}else{
		$("#inputUserName").focus();
	}
	
}
//验证手机号码
function checkPhone(){
	var phone = $("#inputUserName").val();
	var pattern = /^1[0-9]{10}$/;
	isPhone = 1;
	if(phone == '') {
		alert('请输入手机号码');
		isPhone = 0;
		return;
	}
	if(!pattern.test(phone)){
		alert('请输入正确的手机号码');
		isPhone = 0;
		return;
	}
}
//倒计时
function resetCode(){
	$('#J_getCode').hide();
	$('#J_second').html('60');
	$('#J_resetCode').show();
	var second = 60;
	var timer = null;
	timer = setInterval(function(){
		second -= 1;
		if(second >0 ){
			$('#J_second').html(second);
		}else{
			clearInterval(timer);
			$('#J_getCode').show();
			$('#J_resetCode').hide();
		}
	},1000);
}
//提交
function ajaxPost()
{
	if(numc_yz < 1)
	{
		ajaxphonecode();
	}else
	{
		yanzhengimg();
		$("#verify_phone").hide();
		alert("发送次数过于频繁!请先输入验证码");
	}
}

function getYanZ(v)
{
	var code_input=$('#code').val();
	if(code_msg == code_input)
	{
		alert("验证通过");
	}
	else
	{
		alert("验证码输入错误");
	}
}

function gaimi()
{
	var code_input=$('#code').val();
	var inputPass=document.getElementById("inputPass").value;
	// 判断手机号码  
	var str = "";
	if ($('#inputUserName').val().length == 0) 
	{ 
		str += '手机号没有输入\n'; 
		$('#inputUserName').focus(); 
		alert(str);
	}
	else {   
		if(isPhoneNo($('#inputUserName').val()) == false) 
		{ 
			str += '手机号码不正确\n';  
			$('#inputUserName').focus(); 
			alert(str);
		} 
		
	} 
	var remWeek = 0;//默认不记住登录状态
	if($("#remWeeks").prop("checked"))
	{
		remWeek = 1;//记住登录状态
	}
	if(inputPass == "")
	{
		alert("请输入密码");
	}
	else if(inputPass)
	{
		var code_input=$('#code').val();
		if((code_msg/7) == code_input)
		{
			//ajx方式提交
			$.post("index.php?control=query_c&action=cxxgmi&type=form", {"username":$("#inputUserName").val(),
				"userpass":$("#inputPass").val(),"tjcode":$("#tjcode").val() }, function(result){
					alert(result);
					self.location.reload();//刷新当前页面
				})
		}
		else
		{
			alert("验证码输入错误");
		}
		
	}
	
}
function yanzhengimg()
{
	$("#verify_yzm").show();
	var verifyCode = new GVerify("v_container");
	document.getElementById("my_button").onclick = function(){
		var res = verifyCode.validate(document.getElementById("code_input").value);
		if(res){
			verify=1;
			$("#verify_phone").show();
			$("#verify_yzm").hide();
			resetCode();
			ajaxphonecode();	
		}else{
			alert("验证码错误");
			$("#verify_yzm").show();
			$("#verify_phone").hide();
		}
	}
}

//验证手机号 
function isPhoneNo(phone) {   
	var pattern = /^1[3456789]\d{9}$/;  
	return pattern.test(phone); 
}

function ajaxphonecode()
{
	var phone=$('#inputUserName').val();
	var templateId="154915";
    $.ajax({
      type: "post",
      url: "./Lib/yanz.php",
      data: {phone:phone,templateId:templateId},//提交到demo.php的数据
      dataType: "json",//回调函数接收数据的数据格式
      success: function(msg){
        //$('#text').empty();   //清空Text里面的所有内容
        var data='';
        if(msg!=''){
          data = eval("("+msg+")");    //将返回的json数据进行解析，并赋给data
        }
        code_msg = data.code;
        cade_msg = data.code;
        numc_yz = numc_yz+1;

      },
      error:function(msg){
        console.log(msg);
      }
    });
}

$(document).ready(function(){
	if(numc_yz > 1)
	{
		$("#verify_phone").hide();
		$("#verify_yzm").show();
	}
	else
	{
		$("#verify_yzm").hide();
		$("#verify_phone").show();
	}
	
});

