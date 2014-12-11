<!DOCTYPE html>
<html>
	<head>
	
	<?php include('../header/headInfo.php'); ?>
	<link href="../../css/form.css" rel="stylesheet" type="text/css">

<style type="text/css">
pre　{
　white-space:　pre-wrap;　　　　/*　css-3　*/
　white-space:　-moz-pre-wrap;　/*　Mozilla,　since　1999　*/
　white-space:　-pre-wrap;　　　/*　Opera　4-6　*/
　white-space:　-o-pre-wrap;　　/*　Opera　7　*/
　word-wrap:　break-word;　　　　/*　Internet　Explorer　5.5+　*/
}
</style>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.4/mootools-yui-compressed.js"></script>
	<script type="text/javascript">
	    //This event is called when the DOM is fully loaded
	    window.addEvent("domready",function(){
	        //Creating a new AJAX request that will request 'test.csv' from the current directory
	        var csvRequest = new Request({
	            url:"agreementCoach.txt",
	            onSuccess:function(response){
	                //The response text is available in the 'response' variable
	                //Set the value of the textarea with the id 'csvResponse' to the response
	                $("#text").html("<pre>"+response+"</pre>");
	                console.log("hh"+response);
	            }
	        }).send(); //Don't forget to send our request!
	    });
	</script>
  </head>

  <body>  
   <?php include_once "../../tracking_code.php"; ?>
  	<?php include('../header/topMenu.php'); ?>
	<?php include('../header/headerFormA.php'); ?>
	<div class="container center">
		<div class="shadow login" style="width:960px;overflow:hidden; min-height:450px; height:auto; margin-top:50px; margin-bottom:50px;" >
			<div style="width:100%; text-align:center"><strong>教练用户协议</strong></div>
			<div id="text" style="word-wrap:break-word;white-space:normal; text-align:left;"></div>
		</div>
	</div>
		
	<?php include('../header/footer.php'); ?>
  </body>



</html>