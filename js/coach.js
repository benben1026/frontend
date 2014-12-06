var url = "../../../telesport/index.php/coach/getCoachList";

function getCoachList(){
	$.ajax({
		url: url,
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data['RESULT']){
				updateTable(data['TRAINER']);
			}
		},
		error:function(){
			ajaxError();
		}
	});
}

function display(){
	$('.loading').hide();
	$('#coachTable').show();
}

function updateTable(data){
	display();
	var table = $('#coachTable');
	for(var i = 0; i < data.length; i++){
		var row = $('<tr></tr>');
		var profile = $('<td><img src="../../images/default.png" alt="Smiley face" height="80" width="80" hspace="20"></img></td>');
		var link = "../../../version0.2/zh/user/commonCoach.php?userId="+ data[i].userId;
		console.log("link: "+link);
		var name = $('<td><a href='+link +'>'+ checkValid(data[i]['firstName']) + ' ' + checkValid(data[i]['lastName']) + '</a></td>');
		var expertise = $('<td>' + checkValid(data[i]['expertise']) + '</td>');
		if(data[i]['programId'] != null){
			var lastProgram = $('<td><a href="../program/programDetail.php?id=' + data[i]['programId'] +'">' + data[i]['programName'] + '</a></td>');
		}else{
			var lastProgram = $('<td></td>');
		}
		var rank = $('<td><div class="star"><span class="vote-star" style="text-align: left;"><i style="width:' + data[i]['rank'] + '%"></i></span><span class="vote-number">' + parseInt(data[i]['rank'])/10 + '</span></div></td>');
		row.append(profile);
		row.append(name);
		row.append(expertise);
		row.append(lastProgram);
		row.append(rank);
		table.append(row);
	}
}


function checkValid(str){
	return str == null ? 'N/A' : str;
}

function ajaxError(){
	alert('error');
}

$(window).load(getCoachList);