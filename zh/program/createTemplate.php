<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include('../header/headInfo.php'); ?>
<link href="twoCol.css" rel="stylesheet" type="text/css">
</head>
<body>
 <?php include_once "../../tracking_code.php"; ?>
<?php include('../header/topMenu.php'); ?>
<?php include('../header/headerFormB.php'); ?>

<div class="wide-container" style="background-image:none;">
	<input type="hidden" id="programId" value=<?php echo "\"" . $_GET['programId'] . "\"";?>>	
	<div class="sidebar">
		<ul class="info">
			<table class="tableInstructor" cellpadding="0" cellspacing="0">
			    <colgroup>  
			    <col width="100"> 
			    <col width="100">
			    </colgroup>
			        <td class="col">
			            <p class="pTable">program name</p>
			        </td>
			  	</tr></tbody>
			</table>
		</ul>    
		<ul class="nav" id="templateList" style="height:900px; overflow:auto;">
			<li><a class="new_tmp">NEW TEMPLATE</a></li>
		</ul>
	</div>

	<div class="midcontent" style="overflow:auto; height:1000px; /*box-shadow: 0px 0px 1px 1px inset;*/">	

		<form action="upload_file.php" method="post" enctype="multipart/form-data">

			<div class="curriculum">
				<label for="file" class="subtitle">Program Session</label>
				<br><br>
				'<table class="tableForcurriculum" id="basicTable"></table>
			</div>

			<div class="templatename">
				<img src="../../images/arrowdown.png" class="toggle_triangle"/>
				<label for="file" class="subtitle">Template Name<br><br></label>
				
				<textarea rows="1" cols="30" style="border-color:rgb(233,70,39);font-size: 20px" id="templateName"></textarea><br>
				<br><br>
			</div>


			<div class="file">
				<img src="../../images/arrowdown.png" class="toggle_triangle"/>
				<label for="file" class="subtitle"> Picture/Video: <img id="addFile" src="../../images/add.png" width="20" height="20"></label>
				<div id="Image">
					<div>
						<br><br>
						<div class="fileinputs">
							Select a file to upload:
						  	<input type="file" class="File">
						  	<input type="hidden" class="fileId" value="0">
						  	<img id="deleteFile" src="../../images/delete.png" width="20" height="20">
						</div>
						<!--textarea rows="10" cols="50" style="border-color:rgb(233,70,39)"></textarea><br-->
					</div>	
				</div>
			</div>

			<div class="description">
				<img src="../../images/arrowdown.png" class="toggle_triangle"/>
				<label for="file" class="subtitle"> Description:</label>
				<div>
					<br><br>
					<textarea rows="10" cols="50" id="Description" style="border-color:rgb(233,70,39)" ></textarea><br>
					<input type="hidden" class="descriptionId" value="0">
				</div>
			</div>

			<div class="diet">
				<img src="../../images/arrowdown.png" class="toggle_triangle"/>
				<label for="file" class="subtitle"> Diet:</label>
				<div>
					<br><br>
					<textarea rows="10" cols="50" id="Diet" style="border-color:rgb(233,70,39)" ></textarea><br>
					<input type="hidden" class="dietId" value="0">
				</div>
			</div>

			<div class="trainDiv">
				<img src="../../images/arrowdown.png" class="toggle_triangle"/>
				<label for="file" class="subtitle"> Training:</label>
				<div >
					<br><br>
				  	<form>
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
				    </form>
				    </div>
			</div>

			<div class="subm">
				<button type="submit" id="saveTemplate" class="btn">save</button>
				<button type="submit" id="deleteTemplate" class="btn">delete</button>
			</div>
		</form>
	</div>
</div>
<script>
$(document).ready(function(){
	var templateId;
	var programId = $('#programId').val();
	var userId = 23;


	//hide show
	$('.toggle_triangle').click(function(e) {
	    e.preventDefault();
	    $(this).next().next().toggle();
	    if ($(this).attr("class") == "toggle_triangle") {
	      this.src = this.src.replace("down","right");
	    } else {
	      this.src = this.src.replace("right","down");
	    }
	    $(this).toggleClass("on");
	});


	//add delete training table
	
	$( "table" ).delegate('#addTr',"click",function(e){
	 	e.preventDefault();
		$('#trainTable tbody:last').append('<tr><td><input type="text" class="name"></td><td><input type="text" class="numOfSet" onkeypress="return IsNum(event)"></td><td><input type="text" class="numPerSet" onkeypress="return IsNum(event)"></td><td><input type="text" class="finishTime" onkeypress="return IsNum(event)"></td><td><input type="text" class="remark"></td><td><div class="del">Del</div></td><td><input type="hidden" class="trainTrId" value="0"></td></tr>');
	});

	$( "table" ).delegate(".del","click",function(e){
		$(this).parent().parent().hide();
		var componentId = $(this).parent().next().children().val();
		if(componentId == 0){
			$(this).parent().parent().remove();
		}else{
			var id = componentId * -1;
			$(this).parent().next().children().val(id);	
		}
	});

	//add delete fileUnit
	$('#addFile').click(function(e){
	 	e.preventDefault();
		$(this).parent().next().append('<div><br><br><div class="fileinputs">Select a file to upload:'+
							'<input type="file" class="File">'+
						  	'<img id="deleteFile" src="../../images/delete.png" width="20" height="20">'+
						  	'<input type="hidden" class="fileId" value="0">'+
						  	'</div><br></div>');
	});

	$(".file").delegate("#deleteFile","click",function(e){
		$(this).parent().parent().hide();
		var componentId = $(this).next().val();

		if(componentId == 0){
			$(this).parent().parent().remove();
		}else{
			var id = componentId * -1;
			$(this).next().val(id);
		}
	});


	

	    
	//get template menus
	$.post(
		"../../../telesport/index.php/template",
		{
			type:1,
			userId:userId,
			programId:programId
		},
		function(data){
			console.log("sdfsdf");
			console.log(data);
			
			//console.log(data.PREVIOUS_TEMPLATE[0].templateId);
			// if(typeof data.PREVIOUS_TEMPLATE != 'undefined'){
			// 	for(var i=data.PREVIOUS_TEMPLATE.length-1; i>=0 ; i--){
			// 		var template = $('<li class="templateMenu"></li>').attr({ id: data.PREVIOUS_TEMPLATE[i].templateId });
			// 		$('<a></a>').text(data.PREVIOUS_TEMPLATE[i].name).appendTo(template);
			// 		template.appendTo("#templateList");
			// 	}
			// }
			if(typeof data.NEW_TEMPLATE != 'undefined'){
				for(var i=data.NEW_TEMPLATE.length-1; i>=0 ; i--){
					var template = $('<li class="templateMenu"></li>').attr({ id: data.NEW_TEMPLATE[i].templateId });
					$('<a></a>').text(data.NEW_TEMPLATE[i].name).appendTo(template);
					template.appendTo("#templateList");
				}
			}

		});

	//get one template
	$("#templateList").delegate(".templateMenu","dblclick",function(e){	
		//templateId = $(this).attr('id');
		$('.templateMenu').css("background","rgb(98,98,98)");
		$(this).css("background","rgb(233,70,39)");
		getTemplate($(this).attr('id'));
	}); 


	var getTemplate = function(id){
		$.post(
		"../../../telesport/index.php/template",
		{
			type:2,
			templateId: id
		},
		function(data){
			templateId = data.templateId;
		//	console.log("templateId: "+templateId);
			console.log("data: ");
			console.log("temid"+templateId);

			$('#trainTable').empty();
			$('#Image').empty();
			$('#basicTable').empty();
			$('#templateName').val(data.name);

			var firstTr = $('<tr>'+
								'<td width="140px">名称</td>'+
				                '<td width="140px">组数</td>'+
				                '<td width="140px">每组个数</td>'+
				                '<td width="140px">每组完成时间</td>'+
				                '<td width="140px">备注</td>'+
				                '<td><img id="addTr" src="../../images/add.png" width="16" height="16"></img></td>'+
				            '</tr>');
			firstTr.appendTo('#trainTable');

			if(typeof data.component != 'undefined'){	            	
				for(var i=0; i<data.component.length; i++){
					//undefined -> traintable
					if(typeof (data.component[i].typeId) == "undefined"){
						var trainTr = $('<tr>'+								
					                '<td><input type="text" class="name" value="'+data.component[i].name+'"/></td>'+
					                '<td><input type="text" class="numOfSet" onkeypress="return IsNum(event)" value="'+ data.component[i].numOfSet +'"/></td>'+
					                '<td><input type="text" class="numPerSet" onkeypress="return IsNum(event)" value="'+ data.component[i].numPerSet +'"/></td>'+
					                '<td><input type="text" class="finishTime" onkeypress="return IsNum(event)" value="'+ data.component[i].finishTime +'"/></td>'+
					                '<td><input type="text" class="remark" value="'+ data.component[i].remark +'"/></td>'+
					                '<td><div class="del">Del</div></td>'+
					                 '<td><input type="hidden" class="trainTrId" value="'+data.component[i].componentId+'"/></td>'+
					            '</tr>');
						trainTr.appendTo('#trainTable');
					}
					//////////////////////////////////////////////////////////////////////////////
					// image component display image <- '<input type="file" class="File">' //
					//////////////////////////////////////////////////////////////////////////////
					if(data.component[i].itemType == "IMAGE"){
						console.log("image");
						var image = $('<div>'+
									'<br><br>'+
									'<div class="fileinputs">'+
										'<input type="hidden" class="File" name="'+data.component[i].content+'">'+
									  	'<img src="http://128.199.174.170/telesport/upload/'+ data.component[i].content +'" width="400">'+
									  	'<img id="deleteFile" src="../../images/delete.png" width="20" height="20">'+
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

			$.post(
			"../../../telesport/index.php/program/getTemplates/"+programId,
			function(data){
				console.log(data);
				data = JSON.parse(data.templates);
				var num = data.length;
				console.log(num);
				var rows = Math.ceil(num/8);
				var cols = 8;
				var tr = [];
				for (var i = 0; i < rows; i++) {
					var row = $('<tr></tr>').attr({ class: ["class0"].join(' ') }).appendTo("#basicTable");
					for (var j = 0; j < cols; j++) {
						if(i*8+j<num){
							var ele = $('<td class="tdcurriculum"></td>').appendTo(row); ;
							$('<div id="'+ data[i*8+j] +'" class="curriculumId class1"></div>').text(i*8+j+1).appendTo(ele); 
						}
					}
					 		 
				}
			});
		});
	} 

	//create tableForcurriculum


	/*var num = 25;
	mytable = $('<table class="tableForcurriculum"></table>').attr({ id: "basicTable" });
	var rows = Math.ceil(25/8);
	var cols = 8;
	var tr = [];
	for (var i = 0; i < rows; i++) {
		var row = $('<tr></tr>').attr({ class: ["class0"].join(' ') }).appendTo(mytable);
		for (var j = 0; j < cols; j++) {
			if(i*8+j<num){
				var ele = $('<td class="tdcurriculum"></td>').appendTo(row); ;
				$('<div id="-1" class="curriculumId class1"></div>').text(i*8+j+1).appendTo(ele); 
			}
		}
		 		 
	}
	console.log("TTTTT:"+mytable.html());
	mytable.appendTo(".curriculum");*/



	// click event tableForcurriculum

	$("table").delegate(".curriculumId","click",function(e){
		$(this).toggleClass("class2");
		console.log(templateId);
		//$(this).id = templateId;
		$(this).attr("id",templateId);
	});  

	//save
	$(".subm").delegate("#saveTemplate","click",function(e){

		var trainRow = $('#trainTable tbody tr').length;  
		var component = [];
		var name = $('#templateName').val();
		var componentNum = 0;

		
		///////////////////////////////
		//component 0 description  //
		///////////////////////////////

		component[0]={
			componentId: $('.descriptionId').val(),
			componentType : 'generalItem',
			type : 'TEXT',
			content : $('#Description').val()
		};

		componentNum++;

		///////////////////////
		//component 1 diet //
		///////////////////////
		component[1]={
			componentId: $('.dietId').val(),
			componentType : 'generalItem',
			type : 'TEXT',
			content : $('#Diet').val()
		};

		componentNum++;

		//////////////////////
		//component table //
		//////////////////////

		for ( var i = 0; i < trainRow-1; i++ ) {
			component[componentNum]={ 
				name: $($('.name')[i]).val(),
				numOfSet: $($('.numOfSet')[i]).val(),
				numPerSet: $($('.numPerSet')[i]).val(),
				finishTime: $($('.finishTime')[i]).val(),
				remark: $($('.remark')[i]).val(),
				componentId : $($('.trainTrId')[i]).val(),
				componentType: 'trainingItem'
			}
			componentNum++;
		} 
	
		/////////////////////
		//component file //
		/////////////////////
		var fileNum = $('.fileId').length;
		console.log("fileNum"+fileNum)
		for(i=0; i<fileNum; i++){	
			console.log("i"+i);
			////not modified
			if( parseInt($('.fileId')[i].value) > 0){
				component[componentNum]={ 
						componentId: $('.fileId')[i].value,
						componentType : 'generalItem',
						type : 'IMAGE',
						content : $(".File")[i].name
						
				}
				componentNum++;
			}

			if( parseInt($('.fileId')[i].value) <= 0){
				console.log($('.fileId')[i].value);
				if( parseInt($('.fileId')[i].value) <0 || ($('.File')[i].files.length==1 &&  parseInt($('.fileId')[i].value)==0) )
				{	
					component[componentNum]={ 
						componentId: $('.fileId')[i].value,
						componentType : 'generalItem',
						type : 'IMAGE',
						//content : $(".File")[i].files[0].name
						content: "file"+i
					}
					console.log(component[componentNum]);
					componentNum++;
				}
			}
		}

		var templates=[];
		for(i=0; i<$('.curriculumId').length; i++){
			templates[i]= $('.curriculumId')[i].id
		}
		console.log(templates);

		console.log(JSON.stringify(component));
		console.log("templateId: "+templateId);
		console.log("templateName: "+name);

		/*$.post(
		"http://128.199.174.170/telesport/index.php/template",
		{
			//type:"4",
			programId: programId,
			//userId: userId,
			templateId: templateId,
			name: name,
			component: JSON.stringify(component)
		},
		function(data){
			console.log(data.RESULT);
		
		});*/

		console.log(templateId);
		var passdata = new FormData();
		for(i=0; i<fileNum; i++){
			if(parseInt($('.fileId')[i].value)==0)
				if($('.File')[i].files.length == 1)
					passdata.append("file"+i, $(".File")[i].files[0]);
		}
		passdata.append("totalNum",fileNum);
		passdata.append("programId",programId);
		passdata.append("templateId",templateId);
		passdata.append("component",JSON.stringify(component));
		passdata.append("name",name);
		passdata.append("templates",JSON.stringify(templates));
		console.log(templates);

		$.ajax({
	        url: "../../../telesport/index.php/template/modifyTemplate",
	        data: passdata,
	        processData: false,
	        type: 'POST',
	        enctype: 'multipart/form-data',
	        contentType: false,
	        success:function(data){
	          console.log(JSON.stringify(data));
	        }
	      }); 
	});


	//create template finished
	$("#templateList").delegate(".new_tmp","click",function(e){
		var tname = prompt("Please enter your name", "template");
		console.log(programId);
		if(tname != null){
			$.post(
			"../../../telesport/index.php/template",
			{
				type:3,
				programId: programId,
				userId: userId,
				name: tname,
				remark: "",
				component:""
			},
			function(data){
				console.log(data);
				if(data.RESULT == true){
					templateId = data.templateId;
					$(".new_tmp").parent().after($("<li class='templateMenu'><a>"+tname+"</a></li>").attr({ id: templateId }));;
				}
				getTemplate(templateId);
			});	
		}	
	});	

	//delete template finished
	$(".subm").delegate("#deleteTemplate","click",function(e){
		$.post(
		"../../../telesport/index.php/template",
		{
			type:5,
			programId: programId,
			userId: userId,
			templateId: templateId
		},
		function(data){
			console.log(data);
			location.reload();
		});		
	});


	

});

function IsNum(e) {
        var k = window.event ? e.keyCode : e.which;
        if (((k >= 48) && (k <= 57)) || k == 8 || k == 0) {
        } else {
            if (window.event) {
                window.event.returnValue = false;
            }
            else {
                e.preventDefault(); //for firefox 
            }
        }
} 
</script>
</body>
</html>
<!-- end .container -->

