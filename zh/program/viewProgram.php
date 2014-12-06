<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php include('../header/headInfo.php'); ?>
<script type="text/javascript" src="../../js/chat.js"></script>
<link href="view.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../../css/chat.css"/>
</head>
<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenuWide.php'); ?>
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
			  	</tr>
			  	<tr><td id="finish" style="text-align:center;"></td></tr>
			</table>
		</ul>    
		<ul class="nav" id="templateList" style="height:900px; overflow:auto;">

		</ul>
	</div>
	<div class="midcontent" style="overflow:auto; height:1000px;">
<!-- 		<div class="subcontent"> 
			<video width="498" controls>
				<source src="mov_bbb.mp4" type="video/mp4">
				 
				  Your browsesubcontentr does not support HTML5 video.
			</video>
		</div> -->


		<div class="subcontent"> 
			<label class="subtitle"> Image:</label>
			<br><br>
			<div id="Image">
			</div>
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

            
        <div class="chat_container">
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
	<div class="chat">
		<input type="hidden" id="enrollId" value="<?php echo $_GET['enrollId'];?>">
		<input type="hidden" id="coachId" value="<?php echo isset($_GET['coachId']) ? $_GET['coachId'] : "";?>">
		<input type="hidden" id="traineeId" value="<?php echo isset($_GET['traineeId']) ? $_GET['traineeId'] : "";?>">
<!--		<iframe id="frame" src="" style="height:1000px;" frameBorder="0"></iframe>-->

	</div>
	<script>
//		$(window).load(function(){
//			if(USERTYPE == 1){
//				var str = "../chat/chat.php?toUser=" + $('#traineeId').val() + "&enrollId=" + $('#enrollId').val();
//			}else{
//				var str = "../chat/chat.php?toUser=" + $('#coachId').val() + "&enrollId=" + $('#enrollId').val();
//			}
//			$('#frame').prop('src', str);
//		});
	</script>
</div>

<script>
$(window).load(function(){

	var programId = $('#programId').val();

	$('.hide').click(function(e) {
	    e.preventDefault();
	    $(this).prev().toggleClass('hidden');
	});

	var wHeight = $(window).height()-225;
	$('.sidebar').css("height", wHeight);

	$('#templateList').css("height", wHeight);
	var Height = wHeight+100;
	$(".midcontent").css("height", Height);
	//get program menus
	$.post(
		"../../../telesport/index.php/commonapi/getProgramInfo/"+programId,
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

			$($('.templateMenu')[0]).click();
		});

	//get one template
	var getTemplate = function(id){
		console.log(id);
		$.post(
		"../../../telesport/index.php/template",
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
			$('#Image').empty();
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
					
					if(data.component[i].itemType == "IMAGE"){
						console.log("image");
						var image = $('<div>'+
									'<br><br>'+
									'<div class="fileinputs">'+
										'<input type="hidden" class="File" name="'+data.component[i].content+'">'+
									  	'<img src="http://128.199.174.170/telesport/upload/'+ data.component[i].content +'" width="400">'+
									  	'<input type="hidden" class="fileId" value="'+data.component[i].componentId+'">'+
									'</div>'+
								'</div>');
						image.appendTo('#Image');
					}

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

	$("#templateList").delegate(".templateMenu","click",function(e){	
		//templateId = $(this).attr('id');
		$('.templateMenu').css("background","rgb(98,98,98)");
		$(this).css("background","rgb(233,70,39)");
		//$(this).addClass("active");
		getTemplate($(this).attr('id'));
	}); 

	if(parseInt(USERTYPE) == 2){
		$('#finish').append($('<button class="btn btn-form" onclick="finishProgram()">该项目学习完成</button>'));
	}
});

function finishProgram(){
	if(!confirm('你确定该项目已经学习完成了？')){
		return;
	}
	$.ajax({
		url: '../../../telesport/index.php/traineeapi/finishProgram/' + $('#enrollId').val(),
		type: 'GET',
		dataType: 'json',
		success: function(data){
			alert('感谢你选择该项目。');
			window.location = '../user/student.php';
		},
		error: function(){
			console.log('fail to finish this program');
		}
	});
}

</script>
</body>
</html>
<!-- end .container -->

