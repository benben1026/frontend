var MsgIdQueue = [];
var idleTimes = 0;
var sleepTime = 2000;
var url = "../../../telesport/index.php/chat";
var fromUser = 1;
var toUser = 2;
var enrollId = 1;
var lastMessageId = 0;

function init(){
        if(USERTYPE == 1){
            toUser = $('#traineeId').val();
	}else{
            toUser = $('#coachId').val();
	}
	//fromUser = $('#fromUser').val();
	//toUser = $('#toUser').val();
	enrollId = $('#enrollId').val();
	getHistory();
}

function communicate(sendMsg){
	var ReadMsgId = [];
	while(MsgIdQueue.length != 0){
		ReadMsgId.push(MsgIdQueue.shift());
	}
	if(typeof sendMsg == 'undefined'){
		sendMsg = {};
		setTimeout(communicate, sleepTime);
	}
	var dataSend = "toUser=" + toUser + "&enrollId=" + enrollId + "&sendMsg=" + JSON.stringify(sendMsg) + "&readMsg=" + JSON.stringify(ReadMsgId);
	$.ajax({
		url: url,
		type: 'POST',
		data: dataSend,
		dataType: 'json',
		success: function(data){
				console.log("newMsg = " + data['NEWMSG'] + " sendMsg = " + data['SENDMSG'] + " setReadMsg = " + data['SETREADMSG']);
				if(data['NEWMSG'] != ''){
					get(data['NEWMSG']);
				}
		},
		error:function(error){
			console.log(error);
			//ajaxError();
		}
	})
}

function ajaxError(){
	console.log('error');
}

function updateSleepTime(){
	if(idleTimes < 30){
		sleepTime = 2000;
	}else if(idleTimes >= 30 && idleTimes < 60){
		sleepTime = 4000;
	}else if(idleTimes >= 60){
		sleepTime = 6000;
	}
}

function send(){
	var content = $('textarea.user_input').val();
	if(content == ''){
		return;
	}else{
		var msg = {};
		msg['type'] = 'TEXT';
		msg['content'] = content;
		communicate(msg);
		var ul = $('#chat_ul');
		var li = $('<li id="send_content" class="send_content_li"><span>' + content + '</span></li>');
		ul.append(li);
		$('textarea.user_input').val('');
	}
}

function get(newMsg){
	//var msg = JSON.parse(newMsg);
	var msg = newMsg;
	var ul = $('#chat_ul');
	for(var i = 0; i < msg.length; i++){
		MsgIdQueue.push(msg[i]['MSGID']);
		if(msg[i]['TYPE'] == 'TEXT'){
			var li = $('<li id="get_content' + msg[i]['MSGID'] + '" class="get_content_li"><span>' + msg[i]['CONTENT'] + '</span></li>');
			ul.append(li);
		}
	}
}

function msgReachDB(){
	var loading = $('.unreached');
	$(loading[0]).removeClass('unreached');
	$(loading[0]).addClass('reached');
}

function updateHistory(data){
	var ul = $('#chat_ul');
	for(var i = data.length - 1; i >= 0; i--){
		if(i == data.length - 1){
			lastMessageId = data[i].messageId;
		}
		if(data[i]['toUser'] == toUser){
			var li = $('<li id="send_content" class="send_content_li"><span>' + data[i]['content'] + '</span></li>');
			ul.append(li);
		}else{
			var li = $('<li id="get_content' + data[i]['messageId'] + '" class="get_content_li"><span>' + data[i]['content'] + '</span></li>');
			ul.append(li);
		}
	}
	communicate();
}

function getHistory(){
	$.ajax({
		url:'../../../telesport/index.php/chat/getHistory/' + enrollId + '/' + lastMessageId + '/' + 10,
		type: 'GET',
		dataType: 'json',
		success:function(data){
			if(data['status']){
				updateHistory(data['data']);
			}
		},
		error:function(){

		}
	})
}

$(window).load(init);