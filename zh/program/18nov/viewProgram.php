<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php include('../header/headInfo.php'); ?>
<link href="view.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include('../header/topMenu.php'); ?>
<?php include('../header/headerFormB.php'); ?>
<div class="wide-container" style="overflow:hidden;">
	<input type="hidden" id="programId" value=<?php echo "\"" . $_GET['programId'] . "\"";?>>
	<div class="sidebar">
		<ul class="info">
			<table class="tableInstructor" cellpadding="0" cellspacing="0">
			        <td class="col">
			            <p class="pTable" id="programName">PROGRAM NAME</p>
			            <!--p class="pTable" id="Instructor">Instructor</p-->
			        </td>
			  	</tr></tbody>
			</table>
		</ul>    
		<ul class="nav" id="templateList" style="height:900px; overflow:auto;">

		</ul>
	</div>
	<div class="midcontent" style="overflow:auto; height:1000px;">
		<div class="subcontent"> 
			<video width="498" controls>
				<source src="mov_bbb.mp4" type="video/mp4">
				 
				  Your browsesubcontentr does not support HTML5 video.
			</video>
		</div>

		<div class="subcontent">
			<label class="subtitle"> Description:</label>
			<br>
			<br>
			<div>
					<br><br>
					<pre id="Description"></pre>
					<input type="hidden" class="descriptionId" value="0">
			</div>
		</div>

		<div class="subcontent">
			<label class="subtitle"> Diet:</label>
			<br>
			<br>
			<div>
					<br><br>
					<pre id="Diet"></pre>
					<input type="hidden" class="dietId" value="1">
			</div>
		</div>

		<div class="subcontent">
			<label class="subtitle"> Training:</label>
			<br>
			<br>
			<table id="trainTable">
				        	
				            <!--tr>
				                <td><input type="search" /></td>
				                <td><input type="search" /></td>
				                <td><input type="search" /></td>
				                <td><input type="search" /></td>
				                <td><input type="search" /></td>
				                <td><div class="del">Del</div></td>
				            </tr-->
	        </table>
		</div>

	</div>

	<div class="chat">
		<input type="hidden" id="coachId" value="<?php echo $_GET['coachId'];?>">
		<input type="hidden" id="enrollId" value="<?php echo $_GET['enrollId'];?>">
		<iframe id="frame" src="" style="height:1000px;" frameBorder="0"></iframe>

	</div>
	<script>
		$(window).load(function(){
			if(USERTYPE == 1){
				var str = "../chat/chat.php?fromUser=" + $('#coachId').val() + "&toUser=" + USERID + "&enrollId=" + $('#enrollId').val();
			}else{
				var str = "../chat/chat.php?fromUser=" + USERID + "&toUser=" + $('#coachId').val() + "&enrollId=" + $('#enrollId').val();
			}
			$('#frame').prop('src', str);
		});
	</script>
</div>

<script>
$(document).ready(function(){

	var programId = $('#programId').val();

	$('.hide').click(function(e) {
	    e.preventDefault();
	    $(this).prev().toggleClass('hidden');
	});

	//get program menus
	$.post(
		"http://128.199.174.170/telesport/index.php/commonapi/getProgramInfo/"+programId,
		function(data){
			console.log(data);
			
			$('#programName').html(data.program.name);
			var obj = jQuery.parseJSON(data.program.templates);
			console.log(obj);
			console.log(obj.length);
			for(var i=0; i<obj.length; i++){
				var template = $('<li class="templateMenu"></li>').attr({id : obj[i]});
				$('<a></a>').text(i+1).appendTo(template);
				template.appendTo("#templateList");
			}

		});

	//get one template
	var getTemplate = function(id){
		console.log(id);
		$.post(
		"http://128.199.174.170/telesport/index.php/template",
		{
			type:2,
			templateId: id
		},
		function(data){
			templateId = data.templateId;
			console.log("templateId: "+templateId);
			console.log("data: ");
			console.log(data);
			//console.log("data.component.length: "+data.component.length);
			//console.log("data.component[1].typeId: "+data.component[1].typeId);

			$('#templateName').val(data.name);
			$('#trainTable').empty();
			var firstTr = $('<tr>'+
								'<td>name</td>'+
				                '<td>numOfSet</td>'+
				                '<td>numPerSet</td>'+
				                '<td>finishTime</td>'+
				                '<td>remark</td>'+
				            '</tr>');
			firstTr.appendTo('#trainTable');
			if(typeof data.component != 'undefined'){	           	
				for(var i=0; i<data.component.length; i++){
					//undefined -> traintable
					if(typeof (data.component[i].typeId) == "undefined"){
						var trainTr = $('<tr>'+								
					                '<td><span class="name">'+data.component[i].name+'</span></td>'+
					                '<td><span class="numOfSet">'+ data.component[i].numOfSet +'</span></td>'+
					                '<td><span class="numPerSet">'+ data.component[i].numPerSet +'</span></td>'+
					                '<td><span class="finishTime">'+ data.component[i].finishTime +'</span></td>'+
					                '<td><span  class="remark">'+ data.component[i].remark +'</span></td>'+
					                 '<input type="hidden" class="trainTrId" value="'+data.component[i].componentId+'"/>'+
					            '</tr>');
						trainTr.appendTo('#trainTable');
					}
					//text
					//if(data.component[i].itemType == "TEXT" && typeof data.component[i].itemType != 'undefined' ){
					if(i==0){
						$('#Description').html(data.component[i].content);
						$('.descriptionId').val(data.component[i].componentId);
					}
					if(i==1){
						$('#Diet').html(data.component[i].content);
						$('.dietId').val(data.component[i].componentId);
					}
				}
			}
		});
	} 

	$("#templateList").delegate(".templateMenu","dblclick",function(e){	
		//templateId = $(this).attr('id');
		$('.templateMenu').css("background","rgb(98,98,98)");
		$(this).css("background","rgb(233,70,39)");
		//$(this).addClass("active");
		getTemplate($(this).attr('id'));
	}); 

});

</script>
</body>
</html>
<!-- end .container -->

