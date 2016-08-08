<!DOCTYPE html>
<html lang="en">
  
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Life is Travel</title>
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Exercise/views/assets/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Exercise/views/assets/animate/animate.css" />
<link rel="stylesheet" href="/Exercise/views/assets/animate/set.css" />
<link rel="stylesheet" href="/Exercise/views/assets/gallery/blueimp-gallery.min.css">
<link rel="shortcut icon" href="/Exercise/views/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="/Exercise/views/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="/Exercise/views/assets/style.css">
<script type="text/javascript" src="jquery.min.js">

$(document).ready(function(){
  
  $("#nowpeople").click(function(){
      $.ajax({
				url: '/Exercise/employee/show?actname=<?php echo $data?>'
				
      })
  })
});

</script>
</head>


<body>
<h3></h3>

<!-- Header Starts -->
<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
      <div class="container">
        <!-- 顯示回首頁連結 -->
         <a class="navbar-brand active" href="/Exercise/index/index"><h4>回首頁</h4></a>
      </div>
     </div>
   </div>
</div>
<!-- Header Ends -->


<!-- Join Starts -->
<div id="contact" class="mail">
  <div class="container contactform center">
    <!-- 顯示活動報名名稱 -->
    <h2 class="text-center  wowload fadeInUp"><?php echo $data?>報名</h2>
    <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12"> 
        
        <!-- 顯示報名畫面 -->
        <form method="post" action="/Exercise/employee/add?actname=<?php echo $data?>">
          <input type="text" placeholder="員工編號" name="Employeenum" required>
          
          <!-- 如果可以攜伴 -->
          <?php if($data3 ==1):?>
            <input type="text" placeholder="攜伴人數" name="Withpeople" required>
          <?php endif;?>
          
          <button class="btn btn-primary" type="submit" id="nowpeople">報名參加</button> 
          
        </form>
        <form method="post" action="/Exercise/employee/show?actname=<?php echo $data?>">
          <button type="submit">show</button> 
        </form>
        
      </div>
    </div>
    
    <!-- 顯示輸入人數超過上限 -->
    <?php if($data2[0]!=""):?>
      <h4 class="text-center  wowload fadeInUp"><?php echo $data2[0]?></h4>
    <?php endif;?>
    
    <!-- 顯示現階段人數 -->
    <h4 class="text-center  wowload fadeInUp" id="nowpeople">(人數上限:<?php echo $data2[1]?>，現在報名人數:<?php echo $data2[2]?>)</h4>
    
    <!-- 顯示無權參加活動 -->
    <?php if($data4!=""):?>
      <h4 class="text-center  wowload fadeInUp"><?php echo $data4?></h4>
    <?php endif;?>
    
  </div>
</div>
<!-- Join Ends -->

</body>
</html>