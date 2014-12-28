
<?php include('../header/topMenu.php'); ?>

<script type="text/javascript">
$(document).ready(function(){
//  function not available:		

	$("#search").focus(function(){
		alert("暂不支持搜索功能");
	});

	$("div#search").click(function(){
		alert("暂不支持搜索功能");
	});
});
</script>

<div style="width:100%; overflow:hidden; min-width:960px;">

	<div class="container header">
		<div class="header-logo">
			<a href="../nav/index.php"><img src="../../images/logo_vertical_small.png" class="header-logo"></a>
		</div>

		<div>
			<div class="header-menu">
				<ul>
					<li><a href="../nav/aboutus.php">关于我们</a></li>
					<li><a href="../nav/support.php">常见问题</a></li>
					<li><a href="../nav/coach.php">教练</a></li>
					<li><a href="../nav/program.php">项目</a></li>
					<li><a href="../nav/index.php">主页</a></li>
				</ul>
			</div>
			
			<div class="header-search" style="position:relative;">
				<ul>
					<li><input class="search" id="search"></input></li>
				</ul>
				<div id="search" style="position:absolute; right:0px; top:21px;  background: url(../../images/search.jpg); ">
					<button class="btn"  style="width:40px;height:40px;background:transparent;"></button>
				</div>
			</div>
		</div>

		<div class="header-right">
			<img src="../../images/header_right.png">
		</div>
		<div class="header-left">
			<img src="../../images/header_left.png" style="width:700px;">
		</div>
	</div>
</div>