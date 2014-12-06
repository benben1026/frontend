function getProgramDetail(){
	var url = "../../../telesport/index.php/commonapi/getProgramInfo/" + $('#programId').val();
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			if(data['status']){
				updateTable(data['program']);
			}else{
				ajaxError(data);
			}
		},
		error:function(){
			ajaxError();
		}
	});
}

function updateTable(data){
	display();
	$('#userId').val(data['userId']);
	var tr = $('#main_body tr');

	var name = $('<td>' + checkValid(data['name']) + '</td>');
	var intro = $('<td>' + checkValid(data['introduction']) + '</td>');
	var prerequest = $('<td>' + checkValid(data['prerequest']) + '</td>');
	var goal = $('<td>' + checkValid(data['goal']) + '</td>');
	var duration = $('<td>' + checkValid(data['duration']) + ' Days</td>');
	var num = $('<td>' + checkValid(data['total']) + '/' + checkValid(data['maxNumOfUser']) + '</td>');
	var lastModified = $('<td>' + checkValid(data['lastModified'].split(" ")[0]) + '</td>');
	var price = $('<td></td>');

	$(tr[0]).append(name);
	$(tr[1]).append(intro);
	$(tr[2]).append(prerequest);
	$(tr[3]).append(goal);
	$(tr[4]).append(duration);
	$(tr[5]).append(num);
	$(tr[6]).append(lastModified);
	$(tr[7]).append(price);
}

function ajaxError(data){
	$('#loading').hide();
	if(typeof data == 'undefined'){
		var errMsg = 'Fail to load data';
	}else{
		var errMsg = data['error'];
	}
	var div = $('.loading');
	var err = $('<span>Error Message: ' + errMsg + '</span>');
	div.append(err);
}

function checkValid(str){
	return str == null ? 'N/A' : str;
}

function display(){
	$('.loading').hide();
	$('#main_body').show();
}

function checkStatus(){
	if( typeof USERID == 'undefined' || USERTYPE == 1){
		return false;
	}
	$.ajax({
		url: '../../../telesport/index.php/enroll',
		type: 'POST',
		dataType: 'json',
		data: {
			type: 2,
			programId: $('#programId').val(),
			traineeId: USERID
		},
		success: function(data){
			console.log(data);
			if(data['status']){
				updateStatus(data);
			}
		},
		error: function(){

		}
	});
}

function process(type ,enrollId){
	$.ajax({
		url: '../../../telesport/index.php/traineeapi/' + type + '/' + enrollId,
		type: 'GET',
		dataType: 'json',
		success: function(data){
			console.log(data);
			location.reload();
			// console.log(data);
			// if(data['status']){
			// 	checkStatus();
			// }else{
			// 	alert(data['error']);
			// }
		},
		error: function(request,error){

		}
	});
}

// function process(){
// 	$.ajax({
// 		url: '../../../telesport/index.php/enroll',
// 		type: 'POST',
// 		dataType: 'json',
// 		data: {
// 			type: 1,
// 			programId: $('#programId').val(),
// 			traineeId: USERID
// 		},
// 		success: function(data){
// 			console.log(data);
// 			if(data['status']){
// 				checkStatus();
// 			}else{
// 				alert(data['error']);
// 			}
// 		},
// 		error: function(request,error){
// 			console.log(error);
// 			alert('error');
// 		}
// 	});
// }

function exitProgram(enrollId){
	if(!confirm("你确定要退出该项目吗？已经缴纳的费用将不会退还。")){
		return;
	}
	process('exitProgram', enrollId);
	// $.ajax({
	// 	url: '../../../telesport/index.php/enroll',
	// 	type: 'POST',
	// 	dataType: 'json',
	// 	data: {
	// 		type: 3,
	// 		programId: $('#programId').val(),
	// 		traineeId: USERID
	// 	},
	// 	success: function(data){
	// 		if(data['status']){
	// 			checkStatus();
	// 		}else{
	// 			alert(data['error']);
	// 		}
	// 	},
	// 	error: function(){
	// 		alert('SERVER_ERROR');
	// 	}
	// });
}

function applyToEnroll(){
	if(confirm('确定要申请加入该项目吗？')){
		process('apply', $('#programId').val());
	}
}

function pay(enrollId){
	if(confirm('点击确定后请于24小时内完成付费')){
		process('payment',enrollId);
	}
}

function startProgram(enrollId){
	if(confirm('确定从今天起开始学习该项目？')){
		process('startProgram',enrollId);
	}
}

function enterProgram(){
	window.location = 'viewProgram.php?programId=' + $('#programId').val() + '&enrollId=' + $('#enrollId').val() + "&coachId=" + $('#userId').val();
}

function pleaseLogin(){
	alert('请先登录或注册一个新帐户.');
	window.location = '../user/login.php';
}

function updateStatus(data){
	$('#mainBody-enroll-btn').hide();
	$('#status').show();
	var sta;
	var code;
	var operation;
	$('#enrollId').val(data['enrollId']);
	if(data['info'] == -1){
		sta = '尚未加入该项目';
		code = '';
		operation = '<button class="btn btn-form" onclick="applyToEnroll()">申请加入该项目</button>';
	}else if(data['info'] == 1){
		sta = '等待教练审核';
		code = '';
		operation = '<button class="btn btn-form" onclick="exitProgram(' + data['enrollId'] + ')">退出该项目</button>';
	}else if(data['info'] == 2){
		sta = '该项目名额已满，你已被加入等待列表';
		code = '';
		operation = '<button class="btn btn-form" onclick="exitProgram(' + data['enrollId'] + ')">退出等待列表</button>';
	}else if(data['info'] == 3){
		sta = '教练审核通过，请付费';
		code = '' + data['paymentCode'] + '';
		operation = '<button class="btn btn-form" onclick="pay(' + data['enrollId'] + ')">付费</button>';
	}else if(data['info'] == 4){
		sta = '已付费，等待系统核准';
		code = '' + data['paymentCode'] + '';
		operation = '';
	}else if(data['info'] == 5){
		sta = '付费成功，等待用户确认开始学习该项目';
		code = '' + data['paymentCode'] + '';
		operation = '<button class="btn btn-form" onclick="startProgram(' + data['enrollId'] + ')">开始学习</button>';
	}else if(data['info'] == 6){
		sta = '正在学习中';
		code = '' + data['paymentCode'] + '';
		operation = '<button class="btn btn-form" onclick="enterProgram()">进入学习界面</button>';
	}else if(data['info'] == 7){
		sta = '项目结束';
		code = '' + data['paymentCode'] + '';
		operation = '';
	}else if(data['info'] == 8){
		sta = '教练审核未通过，请检查您是否符合加入要求';
		code = '';
		operation = '<button class="btn btn-form" onclick="applyToEnroll()">再次申请加入该项目</button>';
	}else if(data['info'] == 9){
		sta = '已退出该项目';
		code = '';
		operation = '<button class="btn btn-form" onclick="applyToEnroll()">再次申请加入该项目</button>';
	}
	var td = $('.status_content');
	$(td[0]).html(sta);
	$(td[1]).html(code);
	$(td[2]).html(operation);
}

$(window).load(function(){
	getProgramDetail();
	checkStatus();
});
