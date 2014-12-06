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



    <div class="container" style="overflow:hidden; border:1px solid #000; margin-top:50px; margin-bottom:50px; border-radius:5px; padding:10px 0px 20px 0px ">
		<div class="signup-body inline" style="width:900px; height:900px;">

			<div class="signup-form">
			  <ul>
			  	<li>电话号码</li>
			  	<li>职业</li>                   
			  	<li>国籍</li>
			  	<li>语言</li>
			  	<li>家庭地址</li>
			  	<li></li>
			  	<li>自我介绍</li>
			  	<li></li>
			  	<li>专业领域</li>    
			  	<li>身份证号码</li>
			  	<li>身份证照片</li>
			  	<li style="height:180px;"></li>
			  	<li>资格证明</li>
			  	<li>资格证书照片</li>
			  	<li style="height:180px;"></li>          
			  </ul>
			</div>
			  
			<div class="signup-form">
			  <ul>
			  	<li><input class="reg w2" id="phone" type="text" value="" maxlength="11" ></li>
			  	<li><input class="reg w2" id="occupation" type="text" value="" ></li>
			  	<li><input class="reg w2" id="nationality" type="text" value="" ></li>
			  	<li><input class="reg w5" id="firstLanguage" type="text" value="" >
			  	    <input class="reg w5" id="secondLanguage" type="text" value=""></li>
			  	<li><input class="reg w2" id="address1" type="text" value="" ></li>
			  	<li><input class="reg w2" id="addrees2" type="text" value="" ></li>
			  	<li><textarea class="reg w2" id="selfIntro" type="text" style="height:60px;"></textarea></li>
			  	<li></li>
			  	<li><input class="reg w2" id="expertise" type="text" value="" ></li>
			  	<li><input class="reg w2" id="passport_number" type="text" value="" ></li>
			  	<li id="passport" style="height:220px;"></li> 
			  	<li><input class="reg w2" id="certType" type="text" value="" ></li>
			  	<li id="certificate" style="height:220px;"></li>    
			  </ul>
			</div> 

<!-- 			<div class="signup-form" style="width:120px;">
			  <ul class="signup-err">
			    <li id="email-err"></li>
			    <li id="verifycode-err"></li>
			    <li id="username-err"></li>
			    <li id="password-err"></li>
			    <li id="validation-err"></li>
			    <li id="gender-err"></li>
			    <li id="age-err"></li>
			  </ul>
			</div> -->
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
	"../../../telesport/index.php/trainerapi/getTrainerInfo",
	function(data){
		console.log(data);
		$("#phone").val(data.result.phone);
		$("#occupation").val(data.result.occupation);
		var addr = data.result.address1.split(";");
		$("#address1").val(addr[0]);
		$("#address2").val(addr[1]);
		$("#firstLanguage").val(data.result.firstLanguage);
		$("#secondLanguage").val(data.result.secondLanguage);
		$("#nationality").val(data.result.nationality);
		$("#selfIntro").val(data.result.selfIntro);
		$("#passport_number").val(data.result.passport_number);
		$("#certType").val(data.result.certType);
		$("#passport").html("<img src="+data.result.passport +" height='200px'>");
		$("#certificate").html("<img src="+data.result.certificate +" height='200px'>");
		$("#expertise").val(data.result.expertise);

/*		$.get(
		"http://128.199.174.170/telesport/index.php/formconstant",
		function(data){
		$("#sportsTimePerDay").html(data.sportsPerDay[sportsTimePerDay].sc);
		});*/
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

	var firstLanguage = $("#firstLanguage").val();
	var secondLanguage = $("#secondLanguage").val();
	var occupation = $("#occupation").val();
	var expertise = $("#expertise").val();
	var address = $("#address1").val() + ";" + $("#addrees2").val();
	var nationality = $("#nationality").val();

	var phone = $("#phone").val();
	var selfIntro = $("#selfIntro").val();    
	var certType = $("#certType").val();
	var passport_number = $("#passport_number").val();  


  		if(firstLanguage!="" && secondLanguage!="" && occupation!= "" && 
  		expertise != "" && address!="" && nationality != "" && 
  		phone != "" && selfIntro!="" && certType!="" && passport_number!= ""){
		$.post(
			"../../../telesport/index.php/trainerapi/editUserInfo",
			{
				firstLanguage: firstLanguage,
				secondLanguage: secondLanguage,
				phone: phone,
				address:address,
				expertise:expertise,
				occupation:occupation,
				selfIntro: selfIntro,
				nationality:nationality,
				certType:certType,
				passport_number: passport_number,

			},
			function(data){
				console.log(data);
				if(data.status==true){
					alert("修改成功！返回个人主页");
					location.href="../user/coach.php";
				}
				else{
					alert("修改失败！");
				}
			});
		}
		else{
			alert("请填写所有空格");
		}

	});
  </script>
</body>

</html>
