function getNewMsg(){
	if(typeof USERID == 'undefined'){
		window.location = '../nav';
	}
	var url = "../../../telesport/index.php/traineeapi/getNewMessage";
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data['status'] && USERTYPE == 1){
				setDataTrainer(data['data']);
			}else if(data['status'] && USERTYPE == 2){
				setDataTrainee(data['data']);
			}
		},
		error: function(){

		}
	});
}

function setDataTrainer(data){
	var table = $('#program_content');
	if(data['program'].length != 0){
		table.append($('<thead><tr><th>项目名称</th><th>学员昵称</th><th>状态</th><th>时间</th></tr></thead>'));
	}
	for(var i = 0; i < data['program'].length; i++){
		var a = $('<tr><td><a href="coachManage.php?programId=' + data['program'][i]['programId'] + '">' + data['program'][i]['name'] + '</a></td><td>' + data['program'][i]['username'] + '</td><td>' + data['program'][i]['text_zh'] + '</td><td>' + data['program'][i]['time'] + '</td></tr>');
		table.append(a);
	}
	table = $('#chat_content');
	if(data['chat'].length != 0){
		table.append($('<thead><tr><th>项目名称</th><th>学员昵称</th><th>内容</th><th>时间</th></tr></thead>'));
	}
	for(var i = 0; i < data['chat'].length; i++){
		var a = $('<tr><td><a href="../program/viewProgram.php?programId=' + data['chat'][i]['programId'] + '&enrollId=' + data['chat'][i]['enrollId'] + '&traineeId=' + data['chat'][i]['userId'] + '">' + data['chat'][i]['name'] + '</a></td><td>' + data['chat'][i]['username'] + '</td><td>' + data['chat'][i]['content'] + '</td><td>' + data['chat'][i]['timestamp'] + '</td></tr>');
		table.append(a);
	}
}

function setDataTrainee(data){
	var table = $('#program_content');
	if(data['program'].length != 0){
		table.append($('<thead><tr><th>项目名称</th><th>状态</th><th>时间</th></tr></thead>'));
	}
	for(var i = 0; i < data['program'].length; i++){
		var a = $('<tr><td><a href="coachManage.php?programId=' + data['program'][i]['programId'] + '">' + data['program'][i]['name'] + '</a></td><td>' + data['program'][i]['text_zh'] + '</td><td>' + data['program'][i]['time'] + '</td></tr>');
		table.append(a);
	}
	table = $('#chat_content');
	if(data['chat'].length != 0){
		table.append($('<thead><tr><th>项目名称</th><th>内容</th><th>时间</th></tr></thead>'));
	}
	for(var i = 0; i < data['chat'].length; i++){
		var a = $('<tr><td><a href="../program/viewProgram.php?programId=' + data['chat'][i]['programId'] + '&enrollId=' + data['chat'][i]['enrollId'] + '&traineeId=' + data['chat'][i]['userId'] + '">' + data['chat'][i]['name'] + '</a></td><td>' + data['chat'][i]['content'] + '</td><td>' + data['chat'][i]['timestamp'] + '</td></tr>');
		table.append(a);
	}
}

$(window).load(function(){
	getNewMsg();
});