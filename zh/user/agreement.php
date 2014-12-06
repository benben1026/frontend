<!DOCTYPE html>
<html>
	<head>
	
	<?php include('../header/headInfo.php'); ?>
	<link href="../../css/form.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.2.4/mootools-yui-compressed.js"></script>
	<script type="text/javascript">
	    //This event is called when the DOM is fully loaded
	    window.addEvent("domready",function(){
	        //Creating a new AJAX request that will request 'test.csv' from the current directory
	        var csvRequest = new Request({
	            url:"agreement.txt",
	            onSuccess:function(response){
	                //The response text is available in the 'response' variable
	                //Set the value of the textarea with the id 'csvResponse' to the response
	                $("#text").html(response);
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
		<div style="height:50px;"></div>
	<div class="shadow login" style="width:960px;overflow:visible; min-height:450px; height:auto;" >
		<p id="text"></p>
	</div>
	</div>
		
	<?php include('../header/footer.php'); ?>
  </body>


</html>