<!DOCTYPE html>
<head>

<?php include('../header/headInfo.php'); ?>
<script src="js/signup.js" type="text/javascript"></script>
<link href="../../css/form.css" type="text/css" rel="stylesheet">

</head>

  <body onload="student_init()">
   <?php include_once "../../tracking_code.php"; ?>
  <?php include('../header/topMenu.php'); ?>
  <?php include('../header/headerFormB.php'); ?>
    <br/>
    <div class="container">    
   		<div class="inline signup">
        	<div><table class="line"></table></div>
			      <div class="signup-step"><span class="step-tag-after" id="tag_one">1</span>协议书</div>
            <div ><table class="line-middle"></table></div>
            <div class="signup-step"><span class="step-tag-before" id="tag_two">2</span>基本信息</div>
            <div><table class="line-middle"></table></div>
            <div class="signup-step"><span class="step-tag-before" id="tag_three">3</span>补充资料</div>
            <div><table class="line-middle"></table></div>
            <div class="signup-step"><span class="step-tag-before" id="tag_four">4</span>注册成功</div>
            <div><table class="line"></table></div>
      </div>
    </div>
   
    <div><br/><br/><br/></div>
    
    <div class="container">
      <div style="position:absolute; margin-left:550px;" id="vertical_line">
        <table class="vertical-line" style="height:500px;"></table>
      </div>
    </div>

    <div class="container inline" id="stepone" style="height:500px;">
      <div class="signup-body">
   		
      <div>
        <textarea type="" class="agreement" readonly>学员用户协议

**所有协议条款都建⽴立在promeXeus、教练用户和学员用户三方的信任之上，不具备法律效应。

基本协议
1. promeXeus利用互联网，提供一个简单而且快捷的方式，让学员用户找到理想的远程教练用户。promeXeus希望帮助那些身边没有资源的学员用户摆脱客观的限制，自由地接受专业的指导。
2. promeXeus上入驻的教练用户为学员用户提供专业的训练指导，点拨学员用户，解答学员用户在习得运动的各种疑问。
promeXeus相信真正地掌握一个运动技能需要学员用户的努力和坚持，一切的教授都是抛砖引⽟玉。学员用户可以学会如何驾驭自己的身体。由于学员用户接受教练用户的远程指导，学员用户在使用器械的过程中未必能够有教练及时的指导。学员用户可能会由于一时的疏忽而受伤，尽管这样的受伤概率很低。如同实体教练和她/他所教授的学生签订的免责协议一样，promeXeus为学员用户和教练用户提供一个互动的平台，不会为学员用户和教练用户的受伤而负责
。

个⼈人资料协议：
1. 学员用户在promeXeus注册时需要填写真实的个人资料，比如身体状况、饮食习惯等；而教练用户则需要真实的教练信息。promeXeus会严格保密学员用户和教练用户在promeXeus上的一切信息。真实的学员用户信息可以很好地帮助该学员用户的教练为学员提供具有针对性的训练计划的服务；真实的教练用户信息可以很好地帮助该教练用户建⽴立自己的信誉度，让更多的学员用户获得自己的服务。

沟通⽅方式协议：
1. 学员用户在promeXeus上可以根据教练的简介、评级、甚⾄至和教练直接的沟通，自由地选择合适理想的教练。学员用户付费成功后，将在promeXeus上和所选择的教练建立师生的关系，接受该教练用户的专业指导。promeXeus为学员用户和教练⽤用户提供搭建了一个直接的沟通⽅方式：学员用户可以通过文字、照片甚至视频，向教练提出问题；教练用户亦可以通过文字、照片和视频，解释关键的动作，解答学员的疑问。
2. promeXeus上有来自国外的教练。考虑到可能出现的语言问题，promeXeus在学员用户和教练用户的同意下，会为学员用户和教练用户提供翻译服务，辅助学员用户和教练用户的沟通。promeXeus将采取专门设计的系统，保护双方用户的隐私，翻译人员不可能知道双方用户的身份。
3. 为了保证学员用户能够得到可靠的指导，教练用户需要在学员用户提出问题后12小时内解答学员的疑问。promeXeus将会发邮件提醒双方用户。

评价协议：
1. 学员用户在完成一个阶段的训练内容后，需要评价该教练用户。等级从1星到5星。目的：一是，保证学员用户获得优质的指导；二是，根据学员用户的评价，教练用户可以得到反馈，提高自己的综合能力，为更多的学员用户提供更好的服务。

支付方式：
1. 为了保证学员用户和教练用户的资金安全，promeXeus使⽤用支付宝（中国大陆），贝宝Paypal（海外）转账的方式。学员用户需要先将金额转入promeXeus的指定账户，在promeXeus核实之后，学员用户的账户会有与转入金额相等的训练币，随着学员用户训练的进行，训练费用会逐渐从学员用户的训练币账户中扣除，与此同时，promeXeus将会把实际的费用转入教练用户的账户之中。欢迎学员用户和教练用户通过邮件和电话的形式，随时联系promeXeus。

给学员⽤用户的建议协议
1. 学员用户在锻炼前，需要做必要的热身练习，以免受伤。
2. 过度的训练或者不正规的训练均有受伤的可能，学员用户在运用前需要对自己身体情况进行判断，保持运动强度和时间的适当。每天训练完成后，学员用户都应该向自己的教练汇报自己的训练情况，寻求教练的指导和帮助。
3. promeXeus没有能力为学员用户提供任何有关医疗、医学⽅方面的建议和指导。
4. 如果，学员用户对训练内容有不太明白、清楚的地方，应该及时与自己的教练进行沟通，在解决学员用户的疑问之后，再进行练习。
5. 学员用户应该可以获得自己教练对训练的各种指导，包括任何单项或者多项器械的操作方式以及注意事项。学员用户需要注意自身的身体状况和承受的能力。
</textarea>
      </div>
      
      <div><br/></div>
         
      <div class="inline agreement-checkbox">     
          <div>
          <input id="checkbox_agreement" type="checkbox" value="check">
          </div>
          <div>
          我同意此<a href="agreementStudent.php">协议</a>
          </div>
      </div>

      <div><br/></div>
    
   		<div style="text-align:right">
        <button class="btn btn-form" id="next_steptwo" disabled="disabled">下一步</button>
      </div>
      </div>
    </div>

    <div class="container" id="steptwo" style="display:none; height:500px;">
      <div class="signup-body inline" style="width:500px; height:auto;">
     
        <div class="signup-form">
          <ul>
          <li>电子邮箱</li>
          <li>验证码</li>
          <li>用户名</li>
          <li>登录密码</li>
          <li>确认密码</li>
          <li>性别</li>
          <li>年龄</li>
          </ul>
        </div>
          
        <div class="signup-form">
          <ul>
            <li><input class="reg w2" id="email" name="email" type="text" value="" placeholder="邮箱地址" ></li>
            <li><input class="reg w5" id="verifycode" name="verifycode" type="text" value="" placeholder="接收邮件获取" > &nbsp;<button id="send-email" class="btn btn-form" disabled="disabled">获取验证码</button><div id="spin" style="position:relative;width:20px; height:25px; padding:0; display:none; top:10px; left:10px;" class="spin" data-spin></div></li>
            <li><input class="reg w2" id="username" name="username" type="text"  onkeyup="this.value=this.value.replace(/[^a-z0-9A-Z_]/g,'');" value="" maxlength="15" placeholder="字母，数字或下划线" ></li>
            <li><input class="reg w2" id="password" name="password" maxlength="16" style="ime-mode:disabled" type="password" value="" placeholder="设置登录密码" ></li>
            <li><input class="reg w2" id="validation" name="validation" type="password" value="" maxlength="12" placeholder="确认登录密码" ></li>
            <li><input  type="radio" value="male" name="gender" id="male" checked="checked"> 男
                <input  type="radio" value="female" name="gender" id="female"> 女</li>
            <li><input class="reg w5" type="text" value="" name="age" id="age" max="99" min="10" maxlength="2" placeholder="填写年龄"></li>
            <li></li>
            <li style="text-align:right;">
              <button class="btn btn-form" id="previous_stepone">上一步</button>
              <button class="btn btn-form" id="next_stepthree" >下一步</button>
            </li>
          </ul>
        </div> 
       
        <div class="signup-form" style="width:120px;">
          <ul class="signup-err">
            <li id="email-err"></li>
            <li id="verifycode-err"></li>
            <li id="username-err"></li>
            <li id="password-err"></li>
            <li id="validation-err"></li>
            <li id="gender-err"></li>
            <li id="age-err"></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container inline" id="stepthree" style="display:none; height:500px;">
      <div class="signup-body">        
        <div style="width:450px;">

          <div><p class="flip" id="info-necessary">+ 个人信息</p>
          </div>

          <div class="panel inline" id="info-necessary" style="height:260px;  display:block;">

            <div class="signup-form">
                  <ul>
                    <li>身高</li>
                    <li>体重</li>
                    <li>日均运动时间</li>
                    <li>是否吸烟</li>
                    <li>是否酗酒</li>
                    <li>健身目的</li>                    
                  </ul>
            </div>

            <div class="signup-form">
              <ul>
                <li><input class="reg w6" id="height" type="text" value="" placeholder="000.0" > 厘米</li>
                <li><input class="reg w6" id="weight" type="text" value="" placeholder="00.0" > 公斤</li>
                <li><select class="reg w5" id="sportsTimePerDay"></select></li>
                <li><input  type="radio" value="yes"  name="ifSmoke" id="smoke-yes" > 是
                    <input  type="radio" value="no" name="ifSmoke" id="smoke-no" checked="checked"> 否</li>
                <li><input  type="radio" value="yes"  name="ifDrink" id="drink-yes" > 是
                    <input  type="radio" value="no" name="ifDrink" id="drink-no" checked="checked"> 否</li>
                <li><select name="aim" id="aim" class="reg w5"></select></li>   

              </ul>
            </div>
          </div>
                      
                                   
          <div><p class="flip" id="info-illness">+ 伤病历史</p>
          </div>
            
          <div class="panel" id="info-illness" style="height:260px;">
                 
            <div class="signup-form" style="margin-top:10px;">
              <ul>
                <li>如果有心脏方面疾病，请注明：</li>
                <li><textarea  class="description" rows="1" id="illnessDescription"  value="" placeholder="病症名称及持续时间等"></textarea></li>
                <li>如果长期服用药物，请注明： </li>
                <li><textarea class="description" rows="1" id="medicineDescription"  value="" placeholder="药品名称及服用原因等"></textarea></li>
                <li>如果进行过手术，请注明： </li>
                <li><textarea class="description" rows="1"  id="operationDescription"  value="" placeholder="手术类型和手术原因等"></textarea></li>
              </ul>
            </div>
          </div>

<!--           <div><p class="flip" id="info-bodystatus">+ 身体状况</p>
          </div>
            
          <div class="panel" id="info-bodystatus" style="height:260px;">          
            <div class="signup-form">
              <ul id="bodyStatus">
                <li>是否存在以下情况：</li>
              </ul>
            </div>
          </div> -->
  
          <div style="text-align:right; position:absolute; top:650px; width:450px;" >
            <button class="btn btn-form" id="previous_steptwo">上一步</button>
            <button class="btn btn-form" id="next_stepfour">下一步</button>
          </div>
        </div>
      </div>
    </div>

    <div class="container" id="stepfour" style="text-align:center; display:none; height:500px;">
      <div class="signup-body">
        <ul>
          <li></li>
          <li><h1><img src="../../images/success.png"> 恭喜您，注册成功！ </h1></li>
          <li></li>
          <li><button class="btn btn-form btn-signup-success" id="backtohomepage"> 返回主页 </button></li>
            <li><br/></li>
          <li><a href="student.php"><button class="btn btn-form btn-signup-success"> 进入个人主页 </button></a></li>
            <li><br/></li>          
          <li><button class="btn btn-form btn-signup-success" id="findcoaches"> 寻找教练 </button></li>
            <li><br/></li>
          <li><button class="btn btn-form btn-signup-success" id="findprograms"> 寻找训练项目</button></li>
            <li><br/></li>
        </ul>
      </div>
    </div>   

  <br/>

  <?php include('../header/footer.php'); ?>
    

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="../../js/jquery.spin.js" type="text/javascript"></script>
    <link href="../../css/jquery.spin.css" rel="stylesheet" type="text/css" />

  <script type="text/javascript">
  $("#next_stepfour").click(function(){
      var check;

      var password = $("#password").val();
      var passConf = $("#validation").val();
      var username = $("#username").val();      
      
      var email = $("#email").val();

      var age = $("#age").val();
      var username = $("#username").val();
      var gender;
      check = document.getElementsByName("gender");
      if(check[0].checked == true)
      { 
        gender = 1;
      }
      else
      {
        gender = 0;
      }


      var sportsTimePerDay = $("#sportsTimePerDay").val();
      var height = $("#height").val();
      var weight = $("#weight").val();


      var ifSmoke;
      check = document.getElementsByName("ifSmoke");
      if(check[0].checked == true)
      { 
        ifSmoke = 1;
      }
      else
      {
        ifSmoke = 0;
      }

      var ifDrink;
      check = document.getElementsByName("ifDrink");
      if(check[0].checked == true)
      { 
        ifDrink = 1;
      }
      else
      {
        ifDrink = 0;
      }            

      

      var operationDescription =  $("#operationDescription").val();
      var medicineDescription = $("#medicineDescription").val();
      var toolDescription = $("#toolDescription").val();
      var illnessDescription = $("#illnessDescription").val();
      
      var bodyStatus="";
      check = document.getElementsByName("bodyStatus");
      for (var i=0; i<check.length; i++)
      {
        if(check[i].checked == true)
        {
          bodyStatus += check[i].value + ";";
          console.log(bodyStatus);
        }
      }

      var aim = $("#aim").val();
      console.log("time"+sportsTimePerDay);

      $.post(
      "../../../telesport/index.php/register/ajaxRegister",
      {
        username:username,
        email: email,
        password: password,
        passConf: passConf,
        gender: gender,
        age: age,
        height: height,
        weight: weight,
        ifSmoke: ifSmoke,
        ifDrink: ifDrink,
        illnessDescription: illnessDescription,
        medicineDescription: medicineDescription,
        operationDescription: operationDescription,
        aim: aim,
        bodyStatus: bodyStatus,
        sportsTimePerDay: sportsTimePerDay
      },
      function(data){
        console.log(data);
        if(data.status){
          $("div#stepthree").hide();
          $("div#stepfour").show();
          $("#tag_three").attr("class", "step-tag-before");
          $("#tag_four").attr("class", "step-tag-after");
          $("#vertical_line").hide();
        }
        else{
          alert("注册失败");
        }
        });
    });
  </script>    


  </body>
</html>