<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('../header/headInfo.php'); ?>
<link rel="stylesheet" type="text/css" href="css/user.css">



<style type="text/css">
td{padding:5px 10px 5px 10px; font-size: 16px; }
td.left{width:200px;}
td.right{width: 500px;text-align: left;}

</style>

</head>

<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenu.php'); ?>

<?php include('../header/headerFormB.php'); ?>




<div class="full">
	<div class="container">
		<input  type="hidden" id="studentId" value= <?php echo "\"" . $_GET['userId'] . "\"";?>>
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
					<li id="height"></li>
					<br/>
					<li id="weight"></li>
				</ul>
			</div>
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

		<div class="signup-body inline" style="width:960px; height:200px;border:1px solid black">


			<table>
				<tr>
					<td class="left">日均运动时间 :</span></td>
					<td class="right" id="sportsTime"></td>
				</tr>
				<tr>
					<td class="left">生活习惯 :</span></td>
					<td class="right" id="habit"></td>
				</tr>
				<tr>
					<td class="left">健身目的 :</span></td>
					<td class="right" id="aim"></td>
				</tr>
				<tr>
					<td class="left">心脏疾病 :</span></td>
					<td class="right" id="illness"></td>
				</tr>
				<tr>
					<td class="left">手术历史 :</span></td>
					<td class="right" id="operation"></td>
				</tr>
				<tr>
					<td class="left">服用药物 :</span></td>
					<td class="right" id="medicine"></td>
				</tr>

			</table>

		</div>
		<br/>
		<div>训练项目</div>
		<br/>
		<div style="border: 1px solid #000; height:auto; overflow:hidden; padding:10px 15px 15px 10px; font-size:16px;">
		暂无
		</div>
		<br/>
	</div>
</div>

<?php include('../header/footer.php'); ?>

<script type="text/javascript">
$("input").attr("readonly", "readonly");
$("select").attr("disabled", "disabled");
$("textarea").attr("readonly", "readonly");
$("input[type='radio']").attr("disabled", "disabled");

var studentId = $("#studentId").val();



  $.get(
  	"../../../telesport/index.php/commonapi/getTraineeInfo/"+studentId,
  	function(data){
  		console.log(data);
  		$("#username").html("昵称 : "+data.username);
  		$("#truename").html("姓名 : "+data.firstName +  " " + data.lastName);
  		if(data.gender==1){
  			$("#gender").html("性别 : 男");}
  		else{
  			$("#gender").html("性别 : 女");}	
  		$("#height").html("身高 : "+data.height);
  		$("#weight").html("体重 : "+data.weight);
  		$("#age").html("年龄 : " +data.age);
  		$("#illness").html(data.illnessDescription);
  		$("#medicine").html(data.medicineDescription);
  		$("#operation").html(data.operationDescription);
  		//$("#username").html("昵称 : "+data.username);	
  		var st = data.sportsTimePerDay;
  		var aim = data.aim;
  		var drink, smoke;
  		if(data.ifDrink==1)
  			drink="吸烟";
  		else{
  			drink="不吸烟";
  		}
  		if(data.smoke==1){
  			smoke = "饮酒";
  		}
  		else{
  			smoke = "不饮酒";
  		}

  		$("#habit").html(smoke+"/"+drink);
	  $.get(
	    "../../../telesport/index.php/formconstant",
	    function(data){
	    	console.log(data);
	    	$("#sportsTime").html(data.sportsPerDay[st].sc);
	    	$("#aim").html(data.aim[aim].sc);
	    	$("")
	      });
	  });

</script>



</body>

</html>