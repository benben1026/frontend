function updateProgramList(data){
	if(data.length == 0){
		var program = '<tr class="odd_row"><td colspan="5">暂无项目</td></tr>';
		$(program).appendTo("#programTable");
		return;
	}
	for(var i = 0; i < data.length; i++){
		var row;
		if(i % 2 == 0){
			row = 'odd_row';
		}else{
			row = 'even_row';
		}
		var type = data[i]['programId'] == 1 ? '健身' : '减脂';
		var program = '<tr class=' + row + '><td>' + data[i]['name'] + '</td><td>' + type + '</td><td>' + data[i]['maxNumOfUser'] + '</td><td>' + data[i]['duration'] + '</td><td><a href="../../../version0.2/zh/program/programDetail.php?id=' + data[i]['programId'] + '"><button class="btn btn-form">查看详情</button></a></td></tr>';
		$(program).appendTo("#programTable");
	}
}

function getTraninerInfo(){
	$.get(
		"../../../telesport/index.php/commonapi/getTrainerInfo/" + $("#coachId").val(),
		function(data){
			console.log(data);
			$("#username").html("昵称 : "+data.username);
			$("#truename").html("姓名 : "+data.firstName +  " " + data.lastName);
			if(data.gender==1){
				$("#gender").html("性别 : 男");
			}else{
				$("#gender").html("性别 : 女");
			}	
			$("#language").html("语言 : "+data.firstLanguage+";"+ checkValid(data.secondLanguage));
			$("#nationality").html("国籍 : "+checkValid(data.nationality));
			$("#occupation").html("职业 : "+checkValid(data.occupation));
			//$("#username").html("昵称 : "+data.username);	
			getPublishedProgram();
		});
}

function getPublishedProgram(){
	$.ajax({
		url: '../../../telesport/index.php/commonapi/getCoachPublishedProgramList/' + $("#coachId").val(),
		type: 'GET',
		dataType: 'json',
		success:function(data){
			if(data['status']){
				updateProgramList(data['list']);
			}
		},	
		error: function(){
			console.log('error');
		}
	});
}

function checkValid(str){
	return str == null ? '' : str;
}

$(window).load(getTraninerInfo);