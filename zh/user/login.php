<!DOCTYPE html>
<html>
	<head>
	
	<?php include('../header/headInfo.php'); ?>
	<link href="../../css/form.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/login.js"></script>

  </head>

  <body onLoad="init()">  
   <?php include_once "../../tracking_code.php"; ?>
  	<?php include('../header/topMenu.php'); ?>
	<?php include('../header/headerFormA.php'); ?>
	<div class="container center">
		<div style="height:50px;"></div>
	<div class="shadow login" style="height:300px;">
		<ul>
	    	<li>登录</li>
	        <br/>
	        <li><input class="reg w2" id="email" type="text" value="" placeholder="邮箱" ></li>
	        <br/>
	        <li><input class="reg w2" id="password" type="password" value="" placeholder="密码"></li>
		    <li class="left"><input id="checkbox-remember" type="checkbox" > &nbsp; 保持登录   
	        <li><button class="btn btn-form btn-login" id="login" >登录</button></li>
	        <li><a href="retrievePassword.php">忘记密码？</a> &nbsp;&nbsp; <a href="../nav/index.php"> 返回首页</a></li>
	        <li style="text-align:center;"><a href="signupStudent.php">学员注册</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="signupCoach.php">教练注册</a></li>
	    </ul> 
	</div>
	</div>
		
	<?php include('../header/footer.php'); ?>
  </body>


</html>
