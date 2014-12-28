<div class='top-menu'>

	<div class='wide-container'>
		<ul>
			<li class="ftleft" style="color:#fff"><a href="	" id="homepagelink">主页</a></li>
			<li class="ftright" id="english"><a href=""> English </a></li>
			<li id="top-message" style="display:none;" class="ftright"><a href="">消息</a></li>
			<li id="logout" style="display:none;" class="ftright"><a href="" id="logoutlink">退出</a></li>
			<li id="selfpage" style="display:none;" class="ftright"><a href="" id="selfpagelink">个人主页</a></li>
			<li id="top-user" class="ftright"><a href="" id="loginlink">登入</a></li>
		<ul>
	</div>

<script type="text/javascript">
  	var UserType;
  	var backendAddr = "../../../telesport";
  	var frontendAddr = "../..";
  	var USERID;
  	var USERTYPE;

	$("#logoutlink").attr("href", frontendAddr+"/zh/nav/index.php");
	$("#loginlink").attr("href", frontendAddr+"/zh/user/login.php");
	$("#homepagelink").attr("href", frontendAddr+"/zh/nav/index.php");
	$.get(

		backendAddr+"/index.php/login/getUserType",
		function(data){
			console.log("hello");
			if(data.status==true)
			{
				USERTYPE = data.type;
				USERID = data.id;
				$("li#top-user").html(data.name);
				$("li#top-message").show();
				$("li#logout").show();
				$("li#selfpage").show();
				if(data.type==2)
				{
					$("#selfpagelink").attr("href", frontendAddr+"/zh/user/student.php");
				}
				else{
					if(data.type==1){
						$("#selfpagelink").attr("href", frontendAddr+"/zh/user/coach.php");
					}
				}

			}

			console.log(data);
		});

	$("#logout").click(function(){
		$.post(backendAddr+"/index.php/login/logout");				
	});
//  function not available:		
	$("#english").click(function(){
		alert("暂无英文版本");
	});


  </script>
</div>


