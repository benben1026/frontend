function getProgramList(){
	$.ajax({
		url: '../../../telesport/index.php/traineeapi/getProgramList/',
		type: 'GET',
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data['status']){
				updateProgramTable(data['data']);
			}
		},
		error: function(){
			console.log('error');
		}
	});
}

function mappingTable(id){
	switch(parseInt(id)){
		case 1: return '申请处理中';
		case 2: return '申请通过，进入等待列表';
		case 3: return '申请通过，等待付款';
		case 4: return '付款成功，等待系统审核';
		case 5: return '付款成功，等待学员开始学习';
		case 6: return '学习中';
		case 7: return '学习完成';
		case 8: return '申请被拒绝';
		case 9: return '退出项目';
		default: return 'UNKNOWN ID';
	}
}

function updateProgramTable(data){
	for(var i = 0 ; i < data.length; i++){
		var tr = '<tr><td>' + data[i]['name'] +'</td><td>' + mappingTable(data[i]['statusId']) +'</td><td>' + data[i]['time'] +'</td><td><a href="../program/programDetail.php?id=' + data[i]['programId'] + '"><button class="btn btn-form">详情</button></a></td></tr>';
		$('#programTable').append($(tr));
	}
}

$(window).load(getProgramList);