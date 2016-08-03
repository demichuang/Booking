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

<!-- Header Starts -->
<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
      <div class="container">
        
        <!-- 尚未登入時，顯示註冊連結 -->
        <?php if ($data == "Guest"): ?>
         <a class="navbar-brand active" href="/Exercise/index/admin"><h4>管理者登入</h4></a>
        <!-- 已登入時，顯示使用者名稱 -->
        <?php else: ?>
        
         <a class="navbar-brand active" href="/Exercise/index/logout"><h4>管理者登出</h4></a>
         <!--<div class="navbar-collapse  collapse">-->
            <ul class="nav navbar-nav navbar-right">
              <li ><a href="/Exercise/index/goactivity"><h4>新增活動</h4></a></li>
            </ul>
          <!--</div>-->
        <?php endif; ?> 
      </div>
     </div>
   </div>
</div>
<!-- Header Ends -->


<!-- Login Starts -->
<div id="contact" class="mail">

  <div class="container contactform center">
   
     <!-- 顯示"Please Login" -->
    <h3></h3>
    <h2 class="text-center  wowload fadeInUp">Activities</h2>
    <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12"> 
        <!-- 顯示登入畫面 -->
        <form method="post" action="/Exercise/index/login">
          <input type="text" placeholder="Username" name="txtUserName" required>
          <input type="password"  placeholder="Password" name="txtPassword"  required>
          <button class="btn btn-primary" name="reset" type="reset">Clear</button>&nbsp;
          &nbsp;<button class="btn btn-primary" name="login" type="submit">Login</button> 
        </form>
      </div>
    </div>
    &nbsp;&nbsp;
    
    
    <!-- 得$data2=1值，顯示要先登入 -->
    <?php if ($data2==1):?> 
      <h4 class="text-center  wowload fadeInUp">You need to login first.</h4>
    <?php endif; ?>
    
    <!-- 得$data2=2值，顯示輸入錯誤，或還不是會員 -->
    <?php if ($data2==2):?> 
      <h4 class="text-center  wowload fadeInUp">You have wrong enter or you are not a member.</h4>
      <h4 class="text-center  wowload fadeInUp">Please enter again or sign up first.</h4>
    <?php endif; ?>
    
    <!-- 得$data2=3值，顯示本來就是會員了，登入即可 -->
    <?php if ($data2==3):?> 
      <h4 class="text-center  wowload fadeInUp">You are already a member.</h4>
      <h4 class="text-center  wowload fadeInUp">Please login.</h>
    <?php endif; ?>
    
    <!-- 得$data2=5值，顯示現在是會員了，請登入 -->
    <?php if ($data2==5):?> 
      <h4 class="text-center  wowload fadeInUp">You are a member now.</h4>
      <h4 class="text-center  wowload fadeInUp">Please login.</h4>
    <?php endif; ?>
  
  </div>
</div>
<!-- Login Ends -->

</body>
</html>