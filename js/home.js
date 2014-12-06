var timeId;

function init(){
	startShift();
}



function startShift(){
	timeId =setInterval("shiftLeft(0)",5000);
}

function moveLeft(left, classname){
	if(left==-960){
		$(classname).animate({left:"-1920px"},500, function(){
			$(classname).hide();
			$('#left').removeAttr("disabled");
			$('#right').removeAttr("disabled");
		});
		$(classname).animate({left:"1920px"}, 0, function(){
			$(classname).show();
		});
	}
	else if(left==0){
		$(classname).animate({left:"-960px"}, 500);
	}
	else if(left==960){
		$(classname).animate({left:"0px"}, 500);
	}
	else{
		$(classname).animate({left:"960px"}, 500);
	}
}

function moveRight(left, classname){
	if(left==-960){
		$(classname).animate({left:"0px"}, 500);
	}
	else if(left==0){
		$(classname).animate({left:"960px"}, 500);
	}
	else if(left==960){
		$(classname).animate({left:"1920px"}, 500);
	}
	else{
		$(classname).hide();
		$(classname).animate({left:"-1920px"}, 0, function(){
			$(classname).show();
		});
		$(classname).animate({left:"-960px"}, 500, function(){
			$('#right').removeAttr("disabled");
			$('#left').removeAttr("disabled");
		});
	}
}

	function shiftLeft(flag){
		$('#left').attr('disabled',"true");
		$('#right').attr('disabled',"true");
		var pic1 = Math.round($(".pic-1st").position().left);
		var pic2= Math.round($(".pic-2nd").position().left);
		var pic3 = Math.round($(".pic-3rd").position().left);
		var pic4 = Math.round($(".pic-4th").position().left);
		moveLeft(pic1, ".pic-1st");
		moveLeft(pic2, ".pic-2nd");
		moveLeft(pic3, ".pic-3rd");
		moveLeft(pic4, ".pic-4th");
		if(flag==1){
			startShift();
		}
	}

	function shiftRight(flag){
		$('#right').attr('disabled',"true");
		$('#left').attr('disabled',"true");
		var pic1 = Math.round($(".pic-1st").position().left);
		var pic2= Math.round($(".pic-2nd").position().left);
		var pic3 = Math.round($(".pic-3rd").position().left);
		var pic4 = Math.round($(".pic-4th").position().left);
		moveRight(pic1, ".pic-1st");
		moveRight(pic2, ".pic-2nd");
		moveRight(pic3, ".pic-3rd");
		moveRight(pic4, ".pic-4th");
		if(flag==1){
			startShift();
		}	
	}

$(document).ready(function(){

//buttons:


	$("#left").click(function(){
		clearInterval(timeId);
		shiftLeft(1);
	});

	$("#right").click(function(){
		clearInterval(timeId);
		shiftRight(1);
	});

    $("#train").click(function(){
      if($("#train-selection").is( ":hidden" )){
        $("#train-selection").show();
        $("#tr-train").show();
        $("#coach-list").show();
      }
      if(!$("#news-list").is(":hidden"))
      {
        $("#news-list").hide();
        $("#tr-news").hide();
      }
    });

    $("#news").click(function(){
      if($("#news-list").is(":hidden"))
      {
        $("#news-list").show();
        $("#tr-news").show();
      }
      if(!$("#train-selection").is( ":hidden" )){
        $("#train-selection").hide();
        $("#tr-train").hide();
        $("#coach-list").hide();
      }

    });

    $("#register").click(function(){
      $(".mask").show();
      $(".reg-selection").show();
    })

    $("#reg-coach").click(function(){
      location.href = "../user/signupCoach.php";
    })
    $("#reg-student").click(function(){
      location.href = "../user/signupStudent.php";
    });

    $(".mask").click(function(){
    	$(".mask").hide();
    	$(".reg-selection").hide();
    });


	$('.train-btn').click(function(event){
		$('#train-selection ul li button').removeClass('train-btn-active');
		$(this).addClass('train-btn-active');
	});

    getCoachList();
});


function getCoachList(){
	$.ajax({
		url: "../../../telesport/index.php/coach/getCoachList",
		type: 'POST',
		dataType: 'json',
		success: function(data){
			if(data['RESULT']){
				updateCoachTable(data['TRAINER']);
			}else{
				//ajaxError(data['']);
			}
		},
		error:function(){
			ajaxError();
		}
	});
}


function updateCoachTable(data){
	hideTable();
	$('.hot-coach').show();
	$('.hot-coach-data').remove();
	var table = $('.hot-coach');
	for(var i = 0; i < data.length && i < 5; i++){
		var row = $('<tr class="hot-coach-data"></tr>');
		var profile = $('<td><img src="../../images/default.png" alt="Smiley face" height="80" width="80" hspace="20"></img></td>');

		var link = "../../../version0.2/zh/user/commonCoach.php?userId="+ data[i].userId;
		console.log("link: "+link);
		var name = $('<td><a class="special" href='+link +'>'+ checkValid(data[i]['firstName']) + ' ' + checkValid(data[i]['lastName']) + '</a></td>');


		var expertise = $('<td>' + checkValid(data[i]['expertise']) + '</td>');
		if(data[i]['programId'] != null){
			var lastProgram = $('<td><a class="special" href="../program/programDetail.php?id=' + data[i]['programId'] +'">' + data[i]['programName'] + '</a></td>');
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

function getProgramList(){
	hideTable();
	$('.hot-program').show();
}

function getRecommend(){
	hideTable();
	$('.hot-recommend').show();
}
function hideTable(){
	$('.coach-list table').hide();
}

function getProgramList(){
	$.ajax({
		url: "../../../telesport/index.php/commonapi/getProgramList/20",
		type: 'POST',
		dataType: 'json',
		success: function(data){
			console.log(data);
			if(data['status']){
				updateProgramTable(data['list']);
			}
		},
		error:function(){
			ajaxError();
		}
	});
}

function updateProgramTable(data){
	hideTable();
	$('.hot-program').show();
	$('.hot-program-data').remove();
	var table = $('.hot-program');
	for(var i = 0; i < data.length && i < 5; i++){
		var row = $('<tr class="hot-program-data"></tr>');

		var link = "../../../version0.2/zh/user/commonCoach.php?userId="+ data[i].userId;
		console.log("link: "+link);
		var name = $('<td><a href='+link +'>'+ checkValid(data[i]['firstName']) + ' ' + checkValid(data[i]['lastName']) + '</a></td>');
		var name = $('<td><a class="special" href="../program/programDetail.php?id=' + data[i]['programId'] + '">' + checkValid(data[i]['name']) + '</a></td>');
		var coach = $('<td><a class="special" href="../user/commonCoach.php?userId=' + data[i]['userId'] + '">' + checkValid(data[i]['username']) + '</a></td>');
		var type_raw = data[i]['type'] == 1 ? '健身' : '减脂';
		var type = $('<td>' + type_raw + '</td>');
		var stuNum = $('<td>' + data[i]['unfinished'] + '/' + data[i]['maxNumOfUser'] + '</td>');
		var duration = $('<td>' + data[i]['duration'] + '</td>');
		row.append(name);
		row.append(coach);
		row.append(type);
		row.append(stuNum);
		row.append(duration);
		table.append(row);

		// var row = $('<tr class="hot-program-data"></tr>');
		// var profile = $('<td><img src="../../images/default.png" alt="Smiley face" height="80" width="80" hspace="20"></img></td>');
		// var name = $('<td>' + checkValid(data[i]['firstName']) + ' ' + checkValid(data[i]['lastName']) + '</td>');
		// var expertise = $('<td>' + checkValid(data[i]['expertise']) + '</td>');
		// if(data[i]['programId'] != null){
		// 	var lastProgram = $('<td><a href="../program/programDetail.php?programId=' + data[i]['programId'] +'">' + data[i]['programName'] + '</a></td>');
		// }else{
		// 	var lastProgram = $('<td></td>');
		// }
		// var rank = $('<td><div class="star"><span class="vote-star" style="text-align: left;"><i style="width:' + data[i]['rank'] + '%"></i></span><span class="vote-number">' + parseInt(data[i]['rank'])/10 + '</span></div></td>');
		// row.append(profile);
		// row.append(name);
		// row.append(expertise);
		// row.append(lastProgram);
		// row.append(rank);
		// table.append(row);
	}
}