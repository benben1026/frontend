<!DOCTYPE html>
<html>
<head>

<?php include('../header/headInfo.php'); ?>
<script type="text/javascript" src="../../js/program.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/program.css">

</head>

<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/headerMenu.php'); ?>


<div class="full">
	<br/><br/><br/>
	<div class="container coach-page">
		<div>
			<div id="categary">
				<p class="title">项目</p>
			</div>
			<div class="loading">
				<img id="loading" src="../../images/loading.gif"/>
			</div>

		  	<table id="programTable" class="tableInstructor">
			    <colgroup>  
			    <col width="100"></col>
			    <col width="100"></col>  
			    <col width="50"></col>
			    <!-- <col width="130"></col> -->
			    <col width="200"></col> 
			    <col width="130"></col>
			    <col width="100"></col>
			    </colgroup>
			    <tr>
			    	<th>项目名称</th><th>教练</th><th>类型</th><!-- <th>加入要求</th> --><th>简介</th><th>当前人数/最大人数</th><th>项目时长(天)</th>
			    </tr>
			</table>

		    
			<!--
			<div id="categary">
				<p class="title">健身</p>
			</div>

		  	<table class="tableInstructor">
			    <colgroup>  
			    <col width="110"></col> 
			    <col width="110"></col>
			    <col width="110"></col>
			    <col width="110"></col> 
			    <col width="150"></col>
			    <col width="150"></col>
			    <col width="150"></col>
			    </colgroup>
		        
			</table>
			-->
	  	</div>
	  	<br/><br/>
	</div>
</div>
<br/><br/>
<?php include('../header/footer.php'); ?>
</body>
</html>
