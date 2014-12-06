<!DOCTYPE html>
<html>

<head>
    <?php include('../header/headInfo.php'); ?>
</head>

<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/headerMenu.php'); ?>

<div class="full">
	<br/><br/><br/>
    <div class="container support">
    	<div class="question">
    		<p>问题:</p>
    	</div>
    	<div class="block shadow">
    		<p>回答:</p>
    	</div>
<br/><br/>

    	<div class="question">
    		<p>问题:</p>
    	</div>
    	<div class="block shadow">
    		<p>回答:</p>
    	</div>
<br/><br/>
    	<div class="question">
    		<p>请写下您需要得到的帮助:</p>
    	</div>
    	<div class="block" style="position:relative;">
    		<p>我的疑问:</p>
            <textarea rows="4"  style="font-size:20px;width:925px; margin: 5px 15px 5px 15px;" id="question"></textarea>
            <button class="btn btn-form" style="position:absolute; right:15px;" id="submit">提交</button>
    	</div>    	
    </div>
</div>
<br/><br/>
<?php include('../header/footer.php'); ?>

<script type="text/javascript">
    var userId;

    $(document).ready(function(){
        console.log(question);
        $.get(
            backendAddr+"/index.php/login/getUserType",
            function(data){
                if(data.status){
                    userId=data.id;
                    console.log("id:"+userId);
                }
                else{
                    userId=0;
                }
            });
        $("#submit").click(function(){
            var question = $("#question").val();
            $.post(
                "../../../telesport/index.php/commonapi/postQuestion",
                {
                    userId: userId,
                    content: question,
                },
                function(data){
                    if(data.status){
                        alert("发送成功!返回主页");
                        window.location.href="../nav/index.php";
                    }
                    else{
                        alert("发送失败");
                    }
                });
        });
    });
</script>

</body>

</html>

