<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('../header/headInfo.php'); ?>
<link rel="stylesheet" type="text/css" href="css/coachManage.css">
<script type="text/javascript" src="js/coachManage.js"></script>

</head>
<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenu.php'); ?>
<?php include('../header/headerFormB.php'); ?>
<input id="programId" type="hidden" value="<?php echo $_GET['programId'];?>"> 
<br/>
<br/>
	<div class="container">
		<h3>等待批准加入</h3>
		<table class="waitForApprove dataTable">
			<tr>
				<th>学员姓名</th><th>性别</th><th>申请日期</th><th>操作</th>
			</tr>
			<tr class="data"><td colspan="4">暂无学员</td></tr>
		</table>
		<h3>等待列表</h3>
		<table class="waitingList dataTable">
			<tr>
				<th>学员姓名</th><th>性别</th><th>申请通过日期</th><th>操作</th>
			</tr>
			<tr class="data"><td colspan="4">暂无学员</td></tr>
		</table>
		<h3>等待付款</h3>
		<table class="waitForPayment dataTable">
			<tr>
				<th>学员姓名</th><th>性别</th><th>申请通过日期</th><th>操作</th>
			</tr>
			<tr class="data"><td colspan="4">暂无学员</td></tr>
		</table>
		<h3>等待学员确认开始学习</h3>
		<table class="waitToStart dataTable">
			<tr>
				<th>学员姓名</th><th>性别</th><th>确认付款日期</th><th>操作</th>
			</tr>
			<tr class="data"><td colspan="4">暂无学员</td></tr>
		</table>
		<h3>正在学习中学员列表</h3>
		<table class="ongoing dataTable">
			<tr>
				<th>学员姓名</th><th>性别</th><th>学习开始日期</th><th>操作</th>
			</tr>
			<tr class="data"><td colspan="4">暂无学员</td></tr>
		</table>
		<div>已完成该项目学员人数：<span id="finishedNum"></span></div>
	</div>

</body>
</html>