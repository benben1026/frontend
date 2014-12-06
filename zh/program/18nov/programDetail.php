<!DOCTYPE html>
<html>
<head>
<?php include('../header/headInfo.php'); ?>
<script type="text/javascript" src="../../js/programDetail.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/programDetail.css">

</head>
<body>
	<?php include_once "../../tracking_code.php"; ?>
	<?php include('../header/headerMenu.php'); ?>
	<div class="full">
		<div id="container" class="container">
			<div class="loading">
				<img id="loading" src="../../images/loading.gif"/>
			</div>
			<input type="hidden" id="programId" value=<?php echo "\"" . $_GET['id'] . "\"";?>>
			<input type="hidden" id="userId" value=<?php echo "\"" . (isset($_GET['userId']) ? $_GET['userId'] : "") . "\"";?>>
			<a href="../nav/program.php"><button class="btn btn-form">返回项目列表</button></a>
			<a href="../nav/coach.php"><button class="btn btn-form">返回教练列表</button></a>
			<table id="main_body">
				<tr class="odd_row">
					<td class="title">项目名称：</td>
				</tr>
				<tr class="even_row">
					<td class="title">项目介绍：</td>
				</tr>
				<tr class="odd_row">
					<td class="title">加入要求：</td>
				</tr>
				<tr class="even_row">
					<td class="title">项目目标：</td>
				</tr>
				<tr class="odd_row">
					<td class="title">项目长度：</td>
				</tr>
				<tr class="even_row">
					<td class="title">已加入人数/最大人数：</td>
				</tr>
				<tr class="odd_row">
					<td class="title">上线日期：</td>
				</tr>
				<tr class="even_row">
					<td class="title">价格：</td>
				</tr>
				<tr id="mainBody-enroll-btn"><td colspan="2"><button class="btn btn-form" onclick="pleaseLogin()">加入该项目</button></td></tr>
			</table>
			<input type="hidden" id="enrollId"/>
			<table id="status">
				<tr class="odd_row">
					<td class="title">状态：</td><td class="status_content"></td>
				</tr>
				<tr class="even_row">
					<td class="title">编号：</td><td class="status_content"></td>
				</tr>
				<tr class="odd_row">
					<td class="title">操作：</td><td class="status_content"></td>
				</tr>
			</table>
		</div>
	</div>
	<?php include('../header/footer.php'); ?>
</body>
</html>