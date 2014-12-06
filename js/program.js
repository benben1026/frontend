var url = "../../../telesport/index.php/commonapi/getProgramList/20";

function getProgramList(){
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data['status']){
				updateTable(data['list']);
			}
		},
		error:function(){
			ajaxError();
		}
	});
}

function display(){
	$('.loading').hide();
	$('.tableInstructor').show();
}

function updateTable(data){
	display();
	var table = $('#programTable');
	for(var i = 0; i < data.length; i++){
		var row = $('<tr></tr>');
		var name = $('<td><a href="../program/programDetail.php?id=' + data[i]['programId'] + '">' + checkValid(data[i]['name']) + '</a></td>');
		var coach = $('<td><a href="../user/commonCoach.php?id=' + data[i]['userId'] + '">' + checkValid(data[i]['username']) + '</a></td>');
		var type_raw = data[i]['type'] == 1 ? '健身' : '减脂';
		var type = $('<td>' + type_raw + '</td>');
		//var prerequest = $('<td style="text-align: left">' + checkValid(data[i]['prerequest'], 60) + '</td>');
		var intro = $('<td style="text-align: justify">' + checkValid(data[i]['introduction'], 90) + '</td>');
		var stuNum = $('<td>' + data[i]['unfinished'] + '/' + data[i]['maxNumOfUser'] + '</td>');
		var duration = $('<td>' + data[i]['duration'] + '</td>');
		row.append(name);
		row.append(coach);
		row.append(type);
		//row.append(prerequest);
		row.append(intro);
		row.append(stuNum);
		row.append(duration);
		table.append(row);
	}
}

function checkValid(str, length){
	if(typeof length == 'undefined'){
		length = 60;
	}
	if(str == null){
		return 'N/A';
	}else if(str.length > length){
		return str.substring(0,length) + '...';
	}else{
		return str;
	}
}

function ajaxError(){
	alert('error');
}

$(window).load(getProgramList);