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
        <textarea type="" class="agreement" readonly>淘宝服务协议
          最新修订日期：2014年4月11日
          欢迎您使用淘宝平台服务！

          特别提示：
          在使用淘宝平台服务之前，您应当认真阅读并遵守《淘宝服务协议》（以下简称“本协议”），请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制责任的条款、争议解决和法律适用条款。免除或者限制责任的条款可能将以加粗字体显示，您应重点阅读。如您对协议有任何疑问的，应向淘宝客服咨询。

          当您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，或您按照激活页面提示填写信息、阅读并同意本协议且完成全部激活程序后，或您以其他淘宝允许的方式实际使用淘宝平台服务时，即表示您已充分阅读、理解并接受本协议的全部内容，并与淘宝平台达成协议。您承诺接受并遵守本协议的约定， 届时您不应以未阅读本协议的内容或者未获得淘宝对您问询的解答等理由，主张本协议无效，或要求撤销本协议。

          一、 协议范围

          1、本协议由您与淘宝平台的经营者共同缔结，本协议具有合同效力。
          淘宝平台的经营者是指法律认可的经营淘宝平台网站的责任主体，淘宝平台网站包括但不限于淘宝网（域名为 taobao.com）、天猫（域名为tmall.com）、一淘网（域名为etao.com）、聚划算（域名为ju.taobao.com）、阿里妈妈（alimama.com），本协议项下各淘宝平台的经营者可单称或合称为“淘宝”。有关淘宝平台经营者的信息请查看各淘宝平台首页底部公布的公司信息和证照信息。

          2、除另行明确声明外，淘宝平台服务包含任何淘宝及其关联公司提供的基于互联网以及移动网的相关服务，且均受本协议约束。如果您不同意本协议的约定，您应立即停止注册/激活程序或停止使用淘宝平台服务。

          3、本协议内容包括协议正文、 法律声明、《淘宝规则》及所有淘宝已经发布或将来可能发布的各类规则、公告或通知（以下合称“淘宝规则”或“规则”）。所有规则为本协议不可分割的组成部分，与协议正文具有同等法律效力。

          4、淘宝有权根据需要不时地制订、修改本协议及/或各类规则，并以网站公示的方式进行变更公告，无需另行单独通知您。变更后的协议和规则一经在网站公布后，立即或在公告明确的特定时间自动生效。若您在前述变更公告后继续使用淘宝平台服务的，即表示您已经阅读、理解并接受经修订的协议和规则。若您不同意相关变更，应当立即停止使用淘宝平台服务。 
        </textarea>
      </div>
      
      <div><br/></div>
         
      <div class="inline agreement-checkbox">     
          <div>
          <input id="checkbox_agreement" type="checkbox" value="check">
          </div>
          <div>
          我同意此<a href="agreement.php">协议</a>
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
                <li><input  type="radio" value="yes"  name="ifSmoke" id="smoke-yes" checked="checked"> 是
                    <input  type="radio" value="no" name="ifSmoke" id="smoke-no" > 否</li>
                <li><input  type="radio" value="yes"  name="ifDrink" id="drink-yes" checked="checked"> 是
                    <input  type="radio" value="no" name="ifDrink" id="drink-no" > 否</li>
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