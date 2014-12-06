	var keeplogin;


	function init()
	{
		if(document.getElementById("checkbox-remember").checked == true)
		{
			keeplogin = 1;
		}
		else
		{
			keeplogin = 0;
		}
	}
	
$(document).ready(function(){
	$("button#login").click(function(){
		if($("input#email").val()!="" && $("input#password").val()!="")
	  	{
			$.post(
				"../../../telesport/index.php/login",
				{
					email:$("input#email").val(),
					password:$("input#password").val(),
					rememberMe:keeplogin
				},
				function(data){
					
					if(data.LOGIN == true)
					{
						console.log(data);
						window.location.href = "../nav/index.php";
					}
					else
					{
						alert("登录失败，请再次尝试");
					}
    			});
    	}

	});

	$("#checkbox-remember").click(function()
	{
		if(document.getElementById("checkbox-remember").checked == true)
		{
			keeplogin = 1;
		}
		else
		{
			keeplogin = 0;
		}
	});
});