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
	<div class="container center">
		<div style="height:100px;"></div>
	<div class="shadow login">
		<ul>
	    	<li>找回密码</li>
	        <br/>
	        <li><input class="reg w2" id="email" type="text" value="" placeholder="邮箱" ></li>
	        <br/>
	        <li><input class="reg w2" id="verifycode" type="text" value="" placeholder="验证码"></li>
	        <li id="verifycode"></li>
	        <br/>
	        <li><button class="btn btn-form btn-login" id="send-pw">发送密码</button></li>
	    </ul> 
	</div>
	</div>
		
	<?php include('../header/footer.php'); ?>
  </body>
<script type="text/javascript">
  function getRandom(){
      return Math.floor(Math.random()*100+1);
  }

  var verifycode = ""+getRandom() +getRandom()+getRandom();
  $("li#verifycode").html("验证码: "+verifycode);


	
	$(document).ready(function(){
		$("#send-pw").click(function(){
			var email = $("#email").val();
			if(verifycode!=$("input#verifycode").val()){
				alert("验证码错误！");
				console.log(verifycode);
				console.log($("#verifycode").val());
			}
			else{
				$.get(
					"../../../telesport/index.php/register/resetPasswordRequest",
					{email: email},
					function(data){
						if(data.status){
							alert("发送成功，请查收邮件");
							window.history.back();
						}
						else{
							alert("发送失败，邮箱地址错误");
						}
					});
			}
		});
	});
</script>

</html>
