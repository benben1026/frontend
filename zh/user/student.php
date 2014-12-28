<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('../header/headInfo.php'); ?>
<link rel="stylesheet" type="text/css" href="css/user.css">
<link rel="stylesheet" type="text/css" href="student.css">

<script type="text/javascript" src="js/student.js"></script>

<script type="text/javascript">

var sportsTimePerDay;

$.get(
	"../../../telesport/index.php/traineeapi/getUserInfo",
	function(data){
		$("#username").html("用户名 : "+data.userInfo.username);
		console.log(data);
		$("#height").html("身高 : "+data.userInfo.height+"cm");
		$("#weight").html("体重 : "+data.userInfo.weight+"kg");
		$("#age").html("年龄 : "+data.userInfo.age);
		if(data.userInfo.gender==1){
			$("#gender").html("性别 : 男");}
		else{
			$("#gender").html("性别 : 女");}
/*		if(data.userInfo.ifSmoke==1){
			$("#smoke").html("吸烟");
		}
		else{
			$("#smoke").html("不吸烟");
		}
		if(data.userInfo.ifDrink==1){
			$("#drink").html("饮酒");
		}
		else{
			$("#drink").html("不饮酒");
		}
		$("#illness").html("伤病历史:"+data.userInfo.illnessDescription);
		$("#medicine").html("药物使用:"+data.userInfo.medicineDescription);
		$("#operation").html("手术:"+data.userInfo.operationDescription);
		sportsTimePerDay = data.userInfo.sportsTimePerDay;
		$("#aim").html("目标:"+data.userInfo.aim);
		$.get(
		"http://128.199.174.170/telesport/index.php/formconstant",
		function(data){
		$("#sportsTimePerDay").html(data.sportsPerDay[sportsTimePerDay].sc);
		});*/
	});


</script>

<style type="text/css">
.edit{
	position:absolute; 
	top:0px; 
	right:0px;
	border: 1px solid black;
	cursor: pointer;
}

.upload-pesonal-image{
	position: absolute;
	top: -200px;
	left: -200px;
	height: 400px;
	width: 400px;
	background: #fff;
	display: none;
}
</style>

</head>

<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenu.php'); ?>

<?php include('../header/headerFormB.php'); ?>

<div class="mask">
</div>

<div class="fixed-center">
	<div class="upload-pesonal-image">
		<div style="postion:absolute; height:50px; width:100%; text-align:center; background:#eee;">
			修改头像
		</div>
	</div>
</div>

<div class="full">
	<div class="container">
	<!-- <input type="hidden" id="userId" value=<?php echo "\"" . $_GET['userId'] . "\"";?>> -->
		<br/>
		<div>
			<div style="float:left; position:relative;">
				<div>
					<img src="../../images/default.png" height="200px;">
				</div>
				<div class="edit">
					<img src="../../images/edit.png" height="30px;" title="编辑个人头像">
				</div>
			</div>
			<div style="float:left; margin-left:60px; margin-right:60px;">
				<ul>
					<li id="username"></li>
					<br/>
					<li id="gender"></li>
					<br/>
					<li id="age"></li>
					<br/>
					<li id="height"></li>
					<br/>
					<li id="weight"></li>
				</ul>
			</div>
			<div><a href="InfoStudent.php"><button class="btn btn-form" id="selfInfo">个人信息</button></a></div>
			<br/>
			<div><a href="changePassword.php"><button class="btn btn-form" id="changePassword">修改密码</button></a></div>
			<div style="clear:both;"></div>
		</div>

		<br/>
<!-- 		<div style="border: 1px solid #000; height:auto; overflow:hidden; padding:10px 15px 15px 10px; font-size:16px;">
			
			<div>
				<ul>

					<li id="smoke"></li>
					<li id="drink"></li>
					<li id="aim"></li>
					<li id="medicine"></li>
					<li id="operation"></li>
					<li id="illness"></li>
					<li id="sportsTimePerDay"></li>
				</ul>
			</div>
		</div> -->
		<br/>
		<div>训练项目</div>
		<br/>
		<!--div style="border: 1px solid #000; height:auto; overflow:hidden; padding:10px 15px 15px 10px; font-size:16px;" -->
		
		<table id="programTable" class="Tableprogram">
			    <colgroup>  
			    <col width="100"></col>
			    <col width="300"></col>
			    <col width="200"></col> 
			    <col width="200"></col>
			    </colgroup>
			    <tr >
			    	<th>项目名称</th><th>状态</th><th>加入时间</th><th>查看详情</th>
			    </tr>
		</table>

		
	</div>
</div>

<script>
// $(document).ready(function(){

// 	var userId = $('#userId').val();

// 	//getprogramlist
// 	$.post(
// 		"../../../telesport/index.php/traineeapi/getProgramList/"+userId,
// 		function(data){
// 			console.log(data.programList.length);
// 			//var obj = jQuery.parseJSON(data.programList);
// 			for(var i=0; i<data.programList.length; i++){
// 				var program = $('<tr class="programMenu"></tr>').attr({id : data.programList[i]});
// 				$('<td></td>').text( data.programList[i]).appendTo(program);
// 				program.appendTo("#programTable");
// 			}
// 		});

// 	// view program	
// 	$("#programTable").delegate(".programMenu","click",function(e){	
// 		//templateId = $(this).attr('id');
		
// 		window.location='../../../version0.2/zh/program/viewProgram.php?programId='+$(this).attr('id');
// 	}); 

// });


$(document).ready(function(){
	$(".edit").click(function(){
		$(".mask").show();
		$(".upload-pesonal-image").show();
	});
	$(".mask").click(function(){
		$(".mask").hide();
		$(".upload-pesonal-image").hide();
	});
});

</script>

<?php include('../header/footer.php'); ?>
</body>

</html>