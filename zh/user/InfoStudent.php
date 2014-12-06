<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="../../css/form.css" type="text/css" rel="stylesheet">
<?php include('../header/headInfo.php'); ?>
<link rel="stylesheet" type="text/css" href="css/user.css">

</head>

<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenu.php'); ?>

<?php include('../header/headerFormB.php'); ?>



    <div class="container" style="overflow:hidden; border:1px solid #000; margin-top:50px; margin-bottom:50px; padding:10px 10px 10px 10px; border-radius:5px;">
		<div class="signup-body inline" style="width:500px; height:300px;">

			<div class="signup-form">
			  <ul>
			  	<li>年龄</li>
			    <li>身高</li>
			    <li>体重</li>
			    <li>日均运动时间</li>
			    <li>是否吸烟</li>
			    <li>是否酗酒</li>
			    <li>健身目的</li>                    
			  </ul>
			</div>
			  
			<div class="signup-form">
			  <ul>
			  	<li><input class="reg w6" id="age" type="text" value=""> </li>
			    <li><input class="reg w6" id="height" type="text" value=""  > 厘米</li>
                <li><input class="reg w6" id="weight" type="text" value=""  > 公斤</li>
                <li><select class="reg w" id="sportsTimePerDay"></select></li>
                <li><input  type="radio" value="yes"  name="ifSmoke" id="smoke-yes" checked="checked"> 是
                    <input  type="radio" value="no" name="ifSmoke" id="smoke-no" > 否</li>
                <li><input  type="radio" value="yes"  name="ifDrink" id="drink-yes" checked="checked"> 是
                    <input  type="radio" value="no" name="ifDrink" id="drink-no" > 否</li>
                <li><select name="aim" id="aim" class="reg w5"></select></li> 
			  </ul>
			</div> 

			<div class="signup-form" style="width:120px;">
			  <ul class="signup-err">
			    <li id="email-err"></li>
			    <li id="verifycode-err"></li>
			    <li id="username-err"></li>
			    <li id="password-err"></li>
			    <li id="validation-err"></li>
			    <li id="gender-err"></li>
			    <li id="age-err"></li>
			  </ul>
			</div>
		</div>

		<div class="signup-body" style="background:transparent; height:300px;">        
	            <div class="signup-form" style="margin-top:10px;">
	              <ul>
	                <li>如果有心脏方面疾病，请注明：</li>
	                <li><textarea  class="description" rows="1" id="illness"  value="" placeholder="病症名称及持续时间等"></textarea></li>
	                <li>如果长期服用药物，请注明： </li>
	                <li><textarea class="description" rows="1" id="medicine"  value="" placeholder="药品名称及服用原因等"></textarea></li>
	                <li>如果进行过手术，请注明： </li>
	                <li><textarea class="description" rows="1"  id="operation"  value="" placeholder="手术类型和手术原因等"></textarea></li>
	              </ul>
	            </div>
    	</div>


		<button class="btn btn-form" style="margin-left:50px; width:50px;" id="modify">修改</button>
		<button class="btn btn-form" id="submit">提交</button>
		<button class="btn btn-form" id="back">返回</button>
    </div>

<?php include('../header/footer.php'); ?>


<script type="text/javascript">

$("input").attr("readonly", "readonly");
$("select").attr("disabled", "disabled");
$("textarea").attr("readonly", "readonly");
$("input[type='radio']").attr("disabled", "disabled");

  $.get(
    "../../../telesport/index.php/formconstant",
    function(data){
      $.each(data.sportsPerDay,function(index,value) {
        $('#sportsTimePerDay').append($('<option>', {
          value: index,
          text: value.sc,
          id:"st"+index
        }));
      });

// get the options for aim        
      $.each(data.aim,function(index,value) {
        $('#aim').append($('<option>', {
          value: index,
          text: value.sc,
          id:"aim"+index
        }));
      });
	$.get(
		"../../../telesport/index.php/traineeapi/getUserInfo",
		function(data){
			console.log(data);
			$("#height").val(data.userInfo.height);
			$("#weight").val(data.userInfo.weight);
			$("#age").val(data.userInfo.age);
			if(data.userInfo.ifSmoke==0){
				$("#smoke-no").checked="checked";
			}
			else{
				$("#smoke-yes").checked="checked";
			}
			if(data.userInfo.ifDrink==0){
				$("#drink-no").checked="checked";
			}
			else{
				$("#drink-yes").checked="checked";
			}

			$("#illness").val(data.userInfo.illnessDescription);
			$("#medicine").val(data.userInfo.medicineDescription);
			$("#operation").val(data.userInfo.operationDescription);
			sportsTimePerDay = data.userInfo.sportsTimePerDay;

			$("#st"+sportsTimePerDay).attr("selected", "selected");

			$("#aim"+data.userInfo.aim).attr("selected", "selected");

	/*		$.get(
			"http://128.199.174.170/telesport/index.php/formconstant",
			function(data){
			$("#sportsTimePerDay").html(data.sportsPerDay[sportsTimePerDay].sc);
			});*/
		});
// get the options for bodyStatus
    });



	$("#modify").click(function(){
		$("input").prop("readonly", false);
		$("textarea").prop("readonly", false);
		$("select").prop("disabled", false);
		$("input[type='radio']").prop("disabled", false);
	});

	$("#back").click(function(){
		window.history.back();
	});

	$("#submit").click(function(){

      var check;
      var sportsTimePerDay = $("#sportsTimePerDay").val();
      var height = $("#height").val();
      var weight = $("#weight").val();
      var ifSmoke;
      check = document.getElementsByName("ifSmoke");
      if(check[0].checked == true){ifSmoke = 1;}
      else{ifSmoke = 0;}

      var ifDrink;
      check = document.getElementsByName("ifDrink");
      if(check[0].checked == true){ ifDrink = 1;}
      else{ifDrink = 0;}            

      var age=$("#age").val();
      
      var operationDescription =  $("#operation").val();
      var medicineDescription = $("#medicine").val();
      var illnessDescription = $("#illness").val();
      
/*      var bodyStatus="";
      check = document.getElementsByName("bodyStatus");
      for (var i=0; i<check.length; i++)
      {
        if(check[i].checked == true)
        {
          bodyStatus += check[i].value + ";";
          console.log(bodyStatus);
        }
      }*/

      var aim = $("#aim").val();

	  $.post(
	      "../../../telesport/index.php/traineeapi/editUserInfo",
	      {
	      	age: age,
	        height: height,
	        weight: weight,
	        ifSmoke: ifSmoke,
	        ifDrink: ifDrink,
	        illnessDescription: illnessDescription,
	        medicineDescription: medicineDescription,
	        operationDescription: operationDescription,
	        aim: aim,
	        //bodyStatus: bodyStatus,
	        sportsTimePerDay: sportsTimePerDay
	      },
	      function(data){
	        console.log(data);
	       	if(data.status==true){
	       		alert("修改成功！返回主页");
	       		window.history.back();
	       	}
	       	else{
	       		alert("修改失败！");
	       	}
	      });
	});
  </script>
</body>

</html>
