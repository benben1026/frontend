<!DOCTYPE html>
<html>
<head>

<?php include('../header/headInfo.php'); ?>
<script type="text/javascript" src="../../js/home.js"></script>

</head>

<body onload="init()">
 <?php include_once "../../tracking_code.php"; ?>
<div class="mask">
</div>
<div class="fixed-center reg-selection">
  <div>
    <div class="reg-coach">
      <button id="reg-coach" class="btn btn-form">教练</button>
    </div>
    <div class="reg-student">
      <button id="reg-student" class="btn btn-form">学员</button>
    </div>
  </div>
</div>

<?php include('../header/headerMenu.php'); ?>
<div style="width:100%; overflow: hidden; min-width:960px;">
	<div class="container" style="position:relative;height:400px;">
		<div class="pic-1st" ><img src="../../images/slider1.jpg" /></div>
	    <div class="pic-2nd" ><img src="../../images/slider2.jpg" /></div>
	    <div class="pic-3rd" ><img src="../../images/slider1.jpg" /></div>
	    <div class="pic-4th" ><img src="../../images/slider2.jpg" /></div>
	    <div class="mask-left"><button id="left"></button></div>
	    <div class="mask-right"><button id="right"></button></div>
    </div>
  </div>

  <div class="container">
	<div class="slider-shadow"></div>
</div>

<div>
  <br/>
</div>

<div class="full">
  	<div class="container home-menu">
  		<div class="color-news wrapper">
  			<div class="cell">
    				<div>
    					<p>消 息</p>
    					<br/>
    					<img  src="../../images/news.png" />
    				</div>
  			</div>
  		</div>

  		<div class="color-train wrapper">
  			<div class="cell">
    				<div>
    					<p>训 练</p>
    					<br/>
    					<img src="../../images/dumbbell.png" />
    				</div>
  			</div>
  		</div>

  		<div class="color-register wrapper">
  			<div class="cell">
    				<div>
    					<p>注 册</p>
    					<br/>
    					<img src="../../images/signup.png" />
    				</div>

  			</div>
  		</div>

      <div class="news"> 
        <button id="news"></button>
      </div>

      <div class="train">
        <button id="train"></button>
      </div>

      <div class="register">
        <button id="register"></button>
      </div>
 	  </div>


 	  <div class="container triangle-pointer">
 		   <div><div class="triangle-down-news" id="tr-news"></div></div>
	     <div><div class="triangle-down-train" id="tr-train"></div></div>
 	  </div>

 		    
    <div class="container train-selection" id="train-selection" >
      	<ul>
          	<li><button class="btn train-btn train-btn-active" onclick="getCoachList()"><p>热门教练</p></button></li>
          	<li><button class="btn train-btn" onclick="getProgramList()"><p>热门项目</p></button></li>
          	<li><button class="btn train-btn" onclick="getRecommend()"><p>热门推荐</p></button></li>      
      	</ul>
    </div>

    <div class="container news-list" id="news-list" style="padding:20px;">
    <h2 style="color:white;display:inline;">暂无消息</h2>
    </div>

    <div class="container coach-list" id="coach-list" >
        <table class="hot-coach">
        <colgroup>
        <col width="110"></col><col width="110"></col><col width="110"></col><col width="110"></col><col width="150"></col>
        </colgroup>
			   <tr>
				<th></th><th>姓名</th><th>领域</th><th>最新项目</th><th>评分</th>
			   </tr>
		    </table>
		    <table class="hot-program">
            <colgroup>
             	<col width="120"> <col width="120"><col width="120"><col width="120"> <col width="160">
            </colgroup>
            <tr>
            <th>项目</th><th>教练</th><th>类型</th><th>当前人数/最大人数</th><th>项目时长(天)</th>
            </tr>
		    </table>
		    <table class="hot-recommend">
				<tr><td>暂无推荐</td></tr>
		    </table>
    </div>
<div><br/></div>
</div>



<?php include('../header/footer.php'); ?>
<style type="text/css">
  td{height: 50px;}
</style>

</body>
</html>




