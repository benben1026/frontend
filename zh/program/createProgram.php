<!DOCTYPE html>
<head>

<?php include('../header/headInfo.php'); ?>
<link href="../../css/form.css" type="text/css" rel="stylesheet">

</head>


<body>    
<?php include_once "../../tracking_code.php"; ?>
  <?php include('../header/headerFormB.php'); ?>
    <br/>
    <div class="container">    
      <div class="inline signup">
          <div><table class="line" style="width:350px"></table></div>
          <div class="signup-step" style="width:200px">Create Program</div>
          <div><table class="line" style="width:350px"></table></div>
      </div>
    </div>
   
    <div><br/><br/><br/></div>
    
    <div class="container">
      <div style="position:absolute; margin-left:550px;" id="vertical_line">
        <table class="vertical-line" style="height:500px;"></table>
      </div>
    </div>

  <div class="container inline" id="stepthree" style="height:500px;">
      <div class="signup-body">        
        <div style="width:800px;">

          <div>
          </div>

          <div class="panel inline" id="info-basic" style="height:350px;  display:block;">

            <div class="signup-form">
              <ul>
                <li>name</li>
                               
                <li>maxNumOfUser</li>
                <li>duration</li>
                <li>price</li>
                <br>
                <li>introduction</li>
                <li></li>
                <li>goal</li> 
                <li></li>   
              </ul>
            </div>

            <div class="signup-form">
              <ul>
                <li><input class="reg w5" id="programName" type="text" value="" placeholder="programName" > </li>
                <li><input class="reg w2" id="maxNumOfUser" type="text" value="" placeholder="maxNumOfUser" ></li>

                <li><input class="reg w2" id="duration" type="text" value="" maxlength="11" placeholder="duration" ></li>
                <li><input class="reg w2" id="price" type="text" value="" placeholder="price" ></li>
              <br>
                <li><textarea class="reg w2" id="introduction" type="text" style="height:60px;"></textarea></li>
                <li></li>
                <li><textarea class="reg w2" id="goal" type="text" style="height:60px;"></textarea></li>
                <li></li>    

                
              </ul>
            </div>
          </div>
                      
          

            <div class="signup-form">
              <ul>
                                      
              </ul>
            </div>
          </div>
                                              
        </div>
            
        <div style="text-align:right; position:absolute; top:650px; width:450px;" >
          <button class="btn btn-form" id="next_stepfour">Finish</button>
        </div>
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

      //$(this).attr("disabled", "disabled");
      var check;
      var programId;
      var programName = $("#programName").val();
      var maxNumOfUser = $("#maxNumOfUser").val();
      var duration = $("#duration").val();
      var price =$("#price").val();
      var introduction = $("#introduction").val();
      var goal =$("#goal");

      $.post(
      "../../../telesport/index.php/program/createProgram",
      {
          type:1,
          name:programName,
          introduction:introduction,
          maxNumOfUser:maxNumOfUser,
          duration:duration
      },
      function(data){
        console.log(data);
        console.log(data.id);
        programId = data.id;
        if(programId<0){
          alert();
        }else{
          $.post(
          "../../../telesport/index.php/program/updatePricePlan",
          {
              type:2,
              programId:programId,
              fromDate: new Date().getTime(),
              toDate: new Date().getTime() + 31536000000,
              price:price
          },
          function(data){
            console.log(data);
            console.log(data.SUCCESS);
            //programId =2;
            window.location='createTemplate.php?programId='+programId;
         }

         );
        }
      });
    });  


     </script>
  </body>
</html>