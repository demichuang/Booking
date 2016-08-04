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
</head>


<body>
<h3></h3>

<!-- Employee Starts -->
<div id="contact" class="mail">
  <div class="container contactform center">
    <!-- 顯示"Join Activity" -->
    <h2 class="text-center  wowload fadeInUp">Join Activity</h2>
    <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12"> 
        <!-- 顯示報名畫面 -->
        <form method="post" action="/Exercise/index/add">
          <input type="text" placeholder="員工編號" name="Employeenum" required>
          <input type="text" placeholder="攜伴人數" name="Withpeople">
          <button class="btn btn-primary" name="login" type="submit">報名參加</button> 
        </form>
      </div>
    </div>
  
    <!-- 得$data2=1值，顯示要先登入 -->
    <!--<?php if ($data2==1):?> -->
    <!--  <h4 class="text-center  wowload fadeInUp">You need to login first.</h4>-->
    <!--<?php endif; ?>-->
    
    
  
  </div>
</div>
<!-- Employee Ends -->

</body>
</html>