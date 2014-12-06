<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('../header/headInfo.php'); ?>
<link rel="stylesheet" type="text/css" href="css/user.css">
<link rel="stylesheet" type="text/css" href="../../css/commonCoach.css">
<script type="text/javascript" src="js/commonCoach.js"></script>

</head>

<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenu.php'); ?>

<?php include('../header/headerFormB.php'); ?>


<div class="full">
	<div class="container">
		<input  type="hidden" id="coachId" value= <?php echo "\"" . $_GET['userId'] . "\"";?>>
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
					<li id="truename"></li>
					<br/>
					<li id="language"></li>
					<br/>
					<li id="nationality"></li>
					<br/>
					<li id="occupation"></li>
					<br/>
				</ul>
			</div>
			<div style="clear:both;"></div>
		</div>

		<br/>
		<br/>
		<table id="programTable">
			    <colgroup>  
			    <col width="100"></col>
			    <col width="50"></col>
			    <col width="100"></col> 
			    <col width="100"></col>
			    <col width="100"></col>
			    </colgroup>
			    <tr>
			    	<th>项目名称</th><th>类型</th><th>最大人数</th><th>项目时长(天)</th><th>查看详情</th>
			    </tr>
			</table>
<!-- 		<div style="border: 1px solid #000; height:auto; overflow:hidden; padding:10px 15px 15px 10px; font-size:16px;" id="programListPublished">
		
		</div> -->

	</div>
</div>

<script>

var sportsTimePerDay;
$( document ).ready(function() {

	var coachId = $("#coachId").val();
	console.log( "ready!" );
	console.log(coachId);
	

	//getprogramlist
	

	// view program	published
	// $("#programListPublished").delegate(".programMenu","click",function(e){	
	// 	window.location='../../../version0.2/zh/program/programDetail.php?id='+$(this).attr('id');
	// }); 


});



</script>

<?php include('../header/footer.php'); ?>
</body>

</html>