<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('../header/headInfo.php'); ?>
<link rel="stylesheet" type="text/css" href="css/user.css">
<link rel="stylesheet" type="text/css" href="coach.css">
<script type="text/javascript" src="js/coach.js"></script>

</head>

<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenu.php'); ?>

<?php include('../header/headerFormB.php'); ?>


<div class="full">
	<div class="container">
		<!-- <input type="hidden" id="userId" value= <?php echo "\"" . $_GET['userId'] . "\"";?> -->
		<br/>
		<div>
			<div style="float:left;">
				<img src="../../images/default.png" height="200px;">
			</div>
			<div style="float:left; margin-left:60px; margin-right:60px;">
				<ul>
					<li id="username"></li>
					<br/>
					<li id="gender"></li>
					<br/>
					<li id="age"></li>
					<br/>
					<li id="truename"></li>
					<br/>
					<li id="nationality"></li>
				</ul>
			</div>
			<div><a href="InfoCoach.php"><button class="btn btn-form" id="selfInfo">个人信息</button></a></div>
			<br/>
			<div><a href="changePassword.php"><button class="btn btn-form" id="changePassword">修改密码</button></a></div>
			<br/>
			<div><a href="../program/createProgram.php"><button class="btn btn-form" id="changePassword">创建项目</button></a></div>
			<div style="clear:both;"></div>
		</div>

		<br/>
		<h3>已上线项目</h3>
		<br/>
		<table id="programTablePublished" class="Tableprogram">
			    <colgroup>  
			    <col width="100"></col>
			    <col width="150"></col>
			    <col width="100"></col> 
			    <col width="100"></col>
			    <col width="100"></col>
			    <col width="100"></col>
			    </colgroup>
			    <tr>
			    	<th>项目名称</th><th>学员人数/最大人数</th><th>上线日期</th><th>待批准申请</th><th>管理</th><th>关闭</th>
			    </tr>
		</table>


		<br><br>
		<h3>未上线项目</h3>
		<br/>
		<table id="programTableUnPublished" class="Tableprogram">
			    <colgroup>  
			    <col width="100"></col>
			    <col width="150"></col>
			    <col width="100"></col>
			    <col width="100"></col>
			    </colgroup>
			    <tr>
			    	<th>项目名称</th><th>上次修改日期</th><th>编辑</th><th>公开</th>
			    </tr>
		</table>
	</div>
</div>


<?php include('../header/footer.php'); ?>
</body>

</html>