<!DOCTYPE html>
<html>
	<head>
	
	<?php include('../header/headInfo.php'); ?>
	<link href="../../css/form.css" rel="stylesheet" type="text/css">

  </head>

  
  <body>  
   <?php include_once "../../tracking_code.php"; ?>
  	<?php include('../header/topMenu.php'); ?>
	<?php include('../header/headerFormA.php'); ?>

	<input  type="hidden" id="token" value= <?php echo "\"" . $_GET['token'] . "\"";?>>

	<div class="container center">
		<div style="height:50px;"></div>
	<div class="shadow login" style="height:300px;">
		<ul>
	    	<li>修改密码</li>
	        <br/>
	        <li><input class="reg w2" id="email" type="text" value="" placeholder="邮箱" ></li>
	        <br/>
	        <li><input class="reg w2" id="new-pw" type="password" value="" placeholder="新密码" ></li>
	   		<br/>
	   		<li><input class="reg w2" id="new-pw-confirm" type="password" value="" placeholder="再次输入" ></li>
	        <br/>
	        <li><button class="btn btn-form btn-login" id="change-pw">提交</button></li>
	    </ul> 
	</div>
	</div>
		
	<?php include('../header/footer.php'); ?>
  </body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#pre-pw").change(function(){
			var pre_pw = $("#pre-pw").val();
			//jquery post to confirm previous pw
		});

		$("input#new-pw").change(function(){
		  var pwtmp = $("input#new-pw").val();
		  var pwlen = pwtmp.length;
		  console.log(pwlen);
		  if(pwlen<6 || pwlen>18){
		    alert("长度：6-18");
		  }
		});
		$("input#new-pw-confirm").change(function(){
		  if($("#new-pw").val()!=$("input#new-pw-confirm").val())
		  {
		    alert("不一致");
		  }
		});
	});

	$("#change-pw").click(function(){
		$.post("../../../telesport/index.php/register/resetPassword",
		{
			email: $("#email").val(),
			password: $("#new-pw").val(),
			passConf: $("#new-pw-confirm").val(),
			token: $("#token").val()
		},
		function(data){
			if(data.status){
				alert("修改成功！返回主页");
				window.location.href="../nav/index.php";
			}
			else{
				alert(data.err+"修改失败！请再次尝试发送修改密码邮件");
				window.location.href="../user/retrievePassword.php";
			}
		});
	});
	
</script>

</html>
