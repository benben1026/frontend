    
// slide toggle in signup coach page

$(document).ready(function(){
  $("p#info-basic").click(function(){
    $("div#info-basic").slideToggle("fast");
      if ( !$( "div#info-qualification" ).is( ":hidden" ) ) {
        $( "div#info-qualification" ).hide();
      }
  });

  $("p#info-qualification").click(function(){
    $("div#info-qualification").slideToggle("fast");
      if ( !$( "div#info-basic" ).is( ":hidden" ) ) {
        $( "div#info-basic" ).hide();
      }
  });

  $("#backtohomepage").click(function(){
    window.location.href="../nav/index.php";
  });
  $("#findcoaches").click(function(){
    window.location.href="../nav/coach.php";
  });
  $("#findprograms").click(function(){
    window.location.href="../nav/program.php";
  });

});


function student_init(){
  $.get(
    "../../../telesport/index.php/formconstant",
    function(data){
      $.each(data.sportsPerDay,function(index,value) {
        $('#sportsTimePerDay').append($('<option>', {
          value: index,
          text: value.sc
        }));
      });

// get the options for aim        
      $.each(data.aim,function(index,value) {
        $('#aim').append($('<option>', {
          value: index,
          text: value.sc
        }));
      });

// get the options for bodyStatus
      $.each(data.bodyStatus,function(index,value) {
        $('#bodyStatus').append("<li>"+"<input type='checkbox' value="+ index + ">"+value.sc+"</li>");
      });
    });
  }

// slide toggle in signup student page
$(document).ready(function(){
  $("p#info-necessary").click(function(){
    $("div#info-necessary").slideToggle("fast");
    if ( !$( "div#info-illness" ).is( ":hidden" ) ) {
        $( "div#info-illness" ).hide();      
      }
/*    if ( !$( "div#info-bodystatus" ).is( ":hidden" ) ) {
        $( "div#info-bodystatus" ).hide();      
      } */ 
  });

  $("p#info-illness").click(function(){
    $("div#info-illness").slideToggle("fast");
      if ( !$( "div#info-necessary" ).is( ":hidden" ) ) {
        $( "div#info-necessary" ).hide();
      }   
/*      if ( !$( "div#info-bodystatus" ).is( ":hidden" ) ) {
          $( "div#info-bodystatus" ).hide();      
        } */  
  });
/*  $("p#info-bodystatus").click(function(){
    $("div#info-bodystatus").slideToggle("fast");
      if ( !$( "div#info-necessary" ).is( ":hidden" ) ) {
        $( "div#info-necessary" ).hide();
      }  
      if ( !$( "div#info-illness" ).is( ":hidden" ) ) {
        $( "div#info-illness" ).hide();
      }    
  });*/
});


  var random_num="";


// check email format:

  function valid_email() {
   // var patten = new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
    var format;
    if (!$("#email").val().match(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/))
    {
      format = false;
    }
    else
    {
      format = true;
    }

    return format;
  }


// check email duplication:

  function emailDupCheck(){
    $.get("../../../telesport/index.php/register/checkEmailDuplicate",
      {email:$("input#email").val()},
      function(data){
        var exist = data.status;
        console.log(exist);
        if(exist){
          $("li#email-err").html("邮箱已注册");
        }
      });   
  }


  function usernameDupCheck(){
    $.get("../../../telesport/index.php/register/checkUsernameDuplicate",
      {username:$("input#username").val()},
      function(data){
        var exist = data.status;
        console.log(exist);
        if(exist){
          $("li#username-err").html("已注册");
        }
      });   
  }

// get a random number from 0-99
  function getRandom(){
      return Math.floor(Math.random()*100);
  }

  $(document).ready(function(){
    // functions for step one    
    $("#checkbox_agreement").click(function(){
      if(document.getElementById("checkbox_agreement").checked==true)
      {
        document.getElementById("next_steptwo").removeAttribute("disabled");
      }
      else
      {
        document.getElementById("next_steptwo").disabled="disabled";
      }
    });

    $("#next_steptwo").click(function(){
      $("div#stepone").hide();
      $("div#steptwo").show();
      $("#tag_one").attr("class", "step-tag-before");
      $("#tag_two").attr("class", "step-tag-after");
    });

// functions for step two


// check whether user input email:

  $("input#verifycode").focus(function(){
    if($("input#email").val()=="")
    {
      $("li#email-err").html("必填");
    }
  });

// check whether email is valid:
  $("input#email").change(function(){
    emailDupCheck();

    if(!valid_email()){
      $("li#email-err").html("邮箱格式错误");
    }
    else{
      $("button#send-email").prop("disabled", false);
    }
  });
  
  $("input#username").change(function(){
    var untmp = $("input#username").val();
    var unlen = untmp.length;
    console.log(unlen);
    if(unlen<3 || unlen>15){
      $("li#username-err").html("长度：3-15");
    }
    else{
      $("li#username-err").html("");
    }

    usernameDupCheck();
  });
  
  $("input#password").change(function(){
    var pwtmp = $("input#password").val();
    var pwlen = pwtmp.length;
    console.log(pwlen);
    if(pwlen<6 || pwlen>18){
      $("li#password-err").html("长度：6-18");
    }
    else{
      $("li#password-err").html("");
    }
  });


//send email for verify code
  $("button#send-email").click(function(){
    $("button#send-email").html("发送中");
    document.getElementById("spin").style.display="";
    $random_num = ""+getRandom()+getRandom()+getRandom();
    $.post("../../PHPMailer-master/verifycode.php",{email:$("input#email").val(),verifycode:$random_num},
    function(data){
      if(data)
      {
        $("button#send-email").html("请查收");
        $("#spin").hide();

        $("button#send-email").prop("disabled", true);
       // $("input#verifycode").prop("disabled", false);
      }
      else
      {
        alert("邮箱地址有误，请检查后重新发送验证码");
        $("button#send-email").html("重新发送");
        document.getElementById("spin").style.display="none";
      }
      });
  });

//enable next button after enter verify code  

  $("input#verifycode").change(function(){
    $("li#verifycode-err").html("");
    document.getElementById("next_stepthree").removeAttribute("disabled");
    if($("input#verifycode").val() == $random_num)
    {
      $("button#send-email").html("验证码正确");
      $("li#verifycode-err").html("");
    }
    else
    {
      $("button#send-email").prop("disabled", false);
      $("button#send-email").html("重新发送");
      $("li#verifycode-err").html("验证错误");
    }
  });
  
  $("input#email").change(function(){
    $("li#email-err").html("");
    if(!valid_email($("input#email").val()))
    {
      $("li#email-err").html("格式错误");
    }
  });


  $("input#validation").change(function(){
    $("li#validation-err").html("");
    if($("input#password").val()!=$("input#validation").val())
    {
      $("li#validation-err").html("不一致");
    }
    else
    {
      $("li#validation-err").html("");
    }
  });

  $("input#validation").change(function(){
    $("li#age-err").html("");
  });  

  $("#previous_stepone").click(function(){
      $("div#steptwo").hide();
      $("div#stepone").show();
      $("#tag_one").attr("class", "step-tag-after");
      $("#tag_two").attr("class", "step-tag-before");
  });


//click "next" button
  $("#next_stepthree").click(function(){
    if($("input#email").val()=="")
    {
      $("li#email-err").html("必填");
    }
    
    if($("input#verifycode").val()=="")
    {
      $("li#verifycode-err").html("必填");
    }
    
    if($("input#username").val()=="")
    {
      $("li#username-err").html("必填");
    }
    
    if($("input#password").val()=="")
    {
      $("li#password-err").html("必填");
    }
    
    if($("input#validation").val()=="")
    {
      $("li#validation-err").html("必填");
    }
    
    if($("input#age").val()=="")
    {
      $("li#age-err").html("必填");
    }
    
    if(document.getElementById("email-err").innerHTML=="" &&
    document.getElementById("verifycode-err").innerHTML=="" &&
    document.getElementById("username-err").innerHTML=="" &&
    document.getElementById("password-err").innerHTML=="" &&
    document.getElementById("validation-err").innerHTML=="" &&
    document.getElementById("age-err").innerHTML=="")
    {
      $("div#steptwo").hide();
      $("div#stepthree").show();    
      $("#tag_two").attr("class", "step-tag-before");
      $("#tag_three").attr("class", "step-tag-after");
      $(".vertical-line").css("height", "600px");
      $("div#steptwo").hide();
      $("div#stepthree").show();
    }




  });

// functions in step three

  $("#previous_steptwo").click(function(){
      $("div#stepthree").hide();
      $("div#steptwo").show();
      $("#tag_two").attr("class", "step-tag-after");
      $("#tag_three").attr("class", "step-tag-before");
      $(".vertical-line").css("height", "500px");
  }); 
});


    