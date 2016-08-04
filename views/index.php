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
        
        <!-- 管理者未登入時，顯示管理者登入 -->
        <?php if ($data == "Guest"): ?>
         <a class="navbar-brand active" href="/Exercise/index/admin"><h4>管理者登入</h4></a>
        <!-- 管理者已登入時，顯示管理者登出、新增活動-->
        <?php else: ?>
         <a class="navbar-brand active" href="/Exercise/index/logout"><h4>管理者登出</h4></a>
            <ul class="nav navbar-nav navbar-right">
              <li ><a href="/Exercise/index/goactivity"><h4>新增活動</h4></a></li>
            </ul>
        <?php endif; ?> 
      </div>
     </div>
   </div>
</div>
<!-- Header Ends -->


<!-- Activities Starts -->
<div class="container contactform center">
  <h3></h3>
  <!-- 顯示Activities -->
  <h2 class="text-center  wowload fadeInUp">Activities</h2>
  <div class='row text-center'>
  
  <?php 
    for($i=0; $i<$data2[0]; $i++)
    {
      echo "<h4>{$data2[1][$i]}(報名人數:{$data2[2][$i]})";  
      echo "<a href='/Exercise/index/goact?actnum=$data2[1][$i]'>報名</a>";   // 刪除景點      
      echo "</h4>";       
    }
  ?>
  
  </div>
</div>
<!-- Activities Ends -->

</body>
</html>