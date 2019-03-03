function login()
{
	var remWeek = 0;//默认不记住登录状态
	if($("#remWeek").prop("checked"))
	{
		remWeek = 1;//记住登录状态
	}
	//ajx方式提交
	$.post("index.php?control=member&action=login_action", {"username":$("#inputUserName").val(),
		"userpass":$("#inputPass").val(),"rem":remWeek }, function(result){
			if(result=="1")
			{
				//alert("登陆成功");
				self.location.reload();//刷新当前页面
			}
			else
			{
				alert(result);
				//self.location.reload();
			}
		})
}