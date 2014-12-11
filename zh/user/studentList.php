<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php include('../header/headInfo.php'); ?>
<link rel="stylesheet" type="text/css" href="css/user.css">


</head>

<body>
<?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenu.php'); ?>

<?php include('../header/headerFormB.php'); ?>


<div class="full">
	<div class="container">
		<li id="student">shifu</li>
	</div>
</div>

<?php include('../header/footer.php'); ?>

<script type="text/javascript">
	$("#student").click(function(){
		window.location.href="commonStudent.php?name=shifu";
	});
</script>

</body>


</html>