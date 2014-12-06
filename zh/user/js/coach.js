
function getTrainerInfo(){
	$.get(
		"../../../telesport/index.php/trainerapi/getTrainerInfo",
		function(data){
			console.log(data);
			$("#username").html("昵称 : "+data.result.username);
			$("#truename").html("姓名 : "+data.result.firstName + data
				.result.lastName);
			if(data.result.gender==1){
				$("#gender").html("性别 : 男");}
			else{
				$("#gender").html("性别 : 女");}			
			//$("#age").html(data.result.age);

	});
}

function getTrainerProgram(){
		$.post(
		"../../../telesport/index.php/trainerapi/getProgramList/",
		function(data){
			console.log(data);
			updateTable(data['published'], data['unpublished']);
		});
}

$(document).ready(function(){

	var userId = $('#userId').val();

	//getprogramlist


	// // view program	published
	// $("#programTablePublished").delegate(".programMenu","click",function(e){	
	// 	window.location='../../../version0.2/zh/program/viewProgram.php?programId='+$(this).attr('id');
	// }); 

	// // view program	unpublished
	// $("#programTableUnPublished").delegate(".programMenu","click",function(e){		
	// 	window.location='../../../version0.2/zh/program/createTemplate.php?programId='+$(this).attr('id');
	// }); 

});

function updateTable(published, unpublished){
	if(published.length == 0){
		var p = '<tr><td colspan="6">暂无项目</td></tr>';
		$('#programTablePublished').append($(p));
	}else{
		for(var i = 0 ; i < published.length; i++){
			var tr;
			if(i %2 == 0){
				tr = '<tr class="odd_row">';
			}else{
				tr = '<tr class="even_row">';
			}
			tr += '<td>' + published[i]['name'] + '</td><td>' + published[i]['unfinished'] + '/' + published[i]['maxNumOfUser'] + '</td><td>' + published[i]['lastModified'].split(" ")[0] + '</td><td>' + published[i]['applicant'] + '</td><td><a href="coachManage.php?programId=' + published[i]['programId'] + '"><button class="btn btn-form">进入管理页面</button></a></td><td><button class="btn btn-form">关闭该项目</button></td></tr>';
			//$(tr).append($(p));
			$('#programTablePublished').append($(tr));
		}
	}
	if(unpublished.length == 0){
		var p = '<tr><td colspan="4">暂无项目</td></tr>';
		$('#programTableUnPublished').append($(p));
	}else{
		for(var i = 0 ; i < unpublished.length; i++){
			var tr;
			if(i %2 == 0){
				tr = '<tr class="odd_row">';
			}else{
				tr = '<tr class="even_row">';
			}
			tr += '<td>' + unpublished[i]['name'] + '</td><td>' + unpublished[i]['lastModified'] + '</td><td><a href="../program/createTemplate.php?programId=' + unpublished[i]['programId'] + '"><button class="btn btn-form">编辑</button></a></td><td><button class="btn btn-form">公开该项目</button></td>';
			$('#programTableUnPublished').append($(tr));
		}
	}
}


$(window).load(function(){
	getTrainerInfo();
	getTrainerProgram();
})