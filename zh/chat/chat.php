<!DOCTYPE html>
<html>
	<head>
		<title>chat</title>
		<meta charset="UTF-8">
		<script type="text/javascript" src="../../js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.placeholder.1.3.min.js"></script>
		<script type="text/javascript" src="../../js/chat.js"></script>
		<link rel="stylesheet" type="text/css" href="../../css/chat.css"/>
	</head>
	<body>
		<?php include_once "../../tracking_code.php"; ?>
<!-- 		<input type="hidden" id="fromUser" value=<?php echo "\"" . $_GET['fromUser'] . "\""; ?> />  -->
		<input type="hidden" id="toUser" value=<?php echo "\"" . $_GET['toUser'] . "\""; ?> /> 
		<input type="hidden" id="enrollId" value=<?php echo "\"" . $_GET['enrollId'] . "\""; ?> /> 
		<div class="container">
			<div class="sub_container">
				<div class="chat_content">
					<ul id="chat_ul" class="chat_content_ul"></ul>
				</div>
				<div class="user_typing">
					<textarea class="user_input" placeholder="请在此输入..."></textarea>
					<button class="user_btn" onclick="send()">发送</button>
				</div>
			</div>
		</div>
	</body>
</html>