var numOfWaitForApprove = 0;
var numOfWaitingList = 0;
var numOfWaitForPayment = 0;
var numOfWaitToStart = 0;
var numOfOngoing = 0;

function getData(){
	$.ajax({
		url: '../../../telesport/index.php/trainerapi/getUserOfProgram/' + $('#programId').val(),
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data['status']){
				classifyData(data['result']);
			}
		},
		error: function(){

		}
	});
}

function classifyData(data){
	numOfWaitForApprove = 0;
	numOfWaitingList = 0;
	numOfWaitForPayment = 0;
	numOfWaitToStart = 0;
	numOfOngoing = 0;
	var finishedNum = 0;
	for(var i = 0 ; i < data.length; i++){
		switch(parseInt(data[i]['statusId'])){
			case 1:
				waitForApprove(data[i]);
				break;
			case 2:
				waitingList(data[i]);
				break;
			case 3:
				waitForPayment(data[i]);
				break;
			case 4:
			case 5:
				waitToStart(data[i]);
				break;
			case 6:
				ongoing(data[i]);
				break;
			case 7:
				finishedNum++;
				break;
		}
	}
	$('#finishedNum').html(finishedNum);
}
function waitForApprove(row){
	if(numOfWaitForApprove == 0){
		$('.waitForApprove .data').remove();
	}
	numOfWaitForApprove ++;
	var name = row['username'];
	var gender = row['gender'] == 1 ? '男' : '女';
	var tr = '<tr class="data"><td><a target="_blank" href="commonStudent.php?userId=' + row['traineeId'] + '">' + name + '</a></td><td>' + gender + '</td><td>' + row['time'].split(" ")[0] + '</td><td><button class="btn btn-form" onclick="approve(' + row['enrollId'] + ',' + row['programId'] + ')">通过</button><button class="btn btn-form" onclick="reject(' + row['enrollId'] + ',' + row['programId'] + ')">拒绝</button></td></tr>';
	$('.waitForApprove').append($(tr));
}

function waitingList(row){
	if(numOfWaitingList == 0){
		$('.waitingList .data').remove();
	}
	numOfWaitingList ++;
	var name = row['username'];
	var gender = row['gender'] == 1 ? '男' : '女';
	var tr = '<tr class="data"><td><a target="_blank" href="commonStudent.php?userId=' + row['traineeId'] + '">' + name + '</a></td><td>' + gender + '</td><td>' + row['time'].split(" ")[0] + '</td><td></td></tr>';
	$('.waitingList').append($(tr));
}

function waitForPayment(row){
	if(numOfWaitForPayment == 0){
		$('.waitForPayment .data').remove();
	}
	numOfWaitForPayment ++;
	var name = row['username'];
	var gender = row['gender'] == 1 ? '男' : '女';
	var tr = '<tr class="data"><td><a target="_blank" href="commonStudent.php?userId=' + row['traineeId'] + '">' + name + '</a></td><td>' + gender + '</td><td>' + row['time'].split(" ")[0] + '</td><td></td></tr>';
	$('.waitForPayment').append($(tr));
}

function waitToStart(row){
	if(numOfWaitToStart == 0){
		$('.waitToStart .data').remove();
	}
	numOfWaitToStart ++;
	var name = row['username'];
	var gender = row['gender'] == 1 ? '男' : '女';
	var tr = '<tr class="data"><td><a target="_blank" href="commonStudent.php?userId=' + row['traineeId'] + '">' + name + '</a></td><td>' + gender + '</td><td>' + row['time'].split(" ")[0] + '</td><td></td></tr>';
	$('.waitToStart').append($(tr));
}

function ongoing(row){
	if(numOfOngoing == 0){
		$('.ongoing .data').remove();
	}
	numOfOngoing ++;
	var name = row['username'];
	var gender = row['gender'] == 1 ? '男' : '女';
	var tr = '<tr class="data"><td><a target="_blank" href="commonStudent.php?userId=' + row['traineeId'] + '">' + name + '</a></td><td>' + gender + '</td><td>' + row['time'].split(" ")[0] + '</td><td><a href="../program/viewProgram.php?programId=' + row['programId'] + '&enrollId=' + row['enrollId'] + '&traineeId=' + row['traineeId'] + '"><buttonn class="btn btn-form">进入教学界面</button></a></td></tr>';
	$('.ongoing').append($(tr));
}

function approve(enrollId, programId){
	if(!confirm("确定通过该学员申请？")){
		return;
	}
	$.ajax({
		url: '../../../telesport/index.php/trainerapi/approve/' + enrollId + '/' + programId,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data['status']){
				getData();
			}else{
				console.log(data['error']);
			}
		},
		error: function(){
			console.log('error');
		}
	});
}

function reject(enrollId, programId){
	if(!confirm("确定拒绝该学员申请？")){
		return;
	}
	var reason = prompt("请写下拒绝理由", "Sorry, you do not meet the prerequisite.");
	reason = (reason == null ? "Sorry, you do not meet the prerequisite." : reason);
	$.ajax({
		url: '../../../telesport/index.php/trainerapi/reject/' + enrollId + '/' + programId,
		type: 'POST',
		dataType: 'json',
		data:{
			reason: reason
		},
		success: function(data){
			console.log(data);
			if(data['status']){
				getData();
			}else{
				console.log(data['error']);
			}
		},
		error: function(){
			console.log('error');
		}
	});
}

$(window).load(getData);