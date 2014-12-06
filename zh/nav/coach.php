<!DOCTYPE html>
<html>
<head>
<?php include('../header/headInfo.php'); ?>
<script type="text/javascript" src="../../js/coach.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/coach.css">

</head>

<body>
 <?php include_once "../../tracking_code.php"; ?>
	<?php include('../header/headerMenu.php'); ?>
	<div class="full">
		<br/><br/><br/>
		<div class="container coach-page">
			<div>
				<div id="categary">
					<p class="title">教练</p>
				</div>
				<div class="loading">
					<img id="loading" src="../../images/loading.gif"/>
				</div>
			  	<table id="coachTable" class="tableInstructor" style="display:none;">
				    <colgroup>  
				    <col width="110"></col> 
				    <col width="110"></col>
				    <col width="110"></col>
				    <col width="110"></col> 
				    <col width="150"></col>
				    </colgroup>
				    <tr>
				    	<th></th><th>姓名</th><th>领域</th><th>最新项目</th><th>评分</th>
				    </tr>
				</table>

			    

		  	</div>
		  	<br/><br/>
		</div>
	</div>

	<br/><br/>
	<?php include('../header/footer.php'); ?>
</body>
</html>