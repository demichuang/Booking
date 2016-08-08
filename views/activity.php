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
        <!-- 顯示回首頁連結 -->
         <a class="navbar-brand active" href="/Exercise/index/index"><h4>回首頁</h4></a>
      </div>
     </div>
   </div>
</div>
<!-- Header Ends -->


<!-- Activity Starts-->
  <div class="container contactform center">
    <!-- 顯示"Add Activity" -->
    <h3></h3>
    <h2 class="text-center  wowload fadeInUp">Add Activity</h2>
    <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 col-sm-offset-3 col-xs-12">
        <!-- 顯示新增活動畫面 -->
        
        <!-- 如果尚未輸入過資料 -->
        <?php if($data[0]==""):?>
        <form method="post" action="/Exercise/admin/addactivity" >
          <input type="text" placeholder="活動編號" name="anum" required>
          <input type="text" placeholder="活動名稱" name="aname" required>
          <input type="text" placeholder="人數限制" name="maxpeople" required>
          <input type="text" placeholder="開始時間(年/月/日)" name="starttime" required>
          <input type="text" placeholder="結束時間(年/月/日)" name="endtime" required>
          <input type="text" placeholder="可否攜伴(可：1，不可：0)" name="withpeople" required>
          <button class="btn btn-primary" type="submit">Add</button> 
        </form>
        
        <!-- 時間輸入有錯誤 -->
        <?php else:?>
        <form method="post" action="/Exercise/admin/addactivity" >
          <input type="text" placeholder="活動編號" name="anum" value="<?php echo $data[0]?>">
          <input type="text" placeholder="活動名稱" name="aname" value="<?php echo $data[1]?>">
          <input type="text" placeholder="人數限制" name="maxpeople" value="<?php echo $data[2]?>">
          <input type="text" placeholder="開始時間(年/月/日)" name="starttime" value="<?php echo $data[3]?>">
          <input type="text" placeholder="結束時間(年/月/日)" name="endtime" value="<?php echo $data[4]?>">
          <input type="text" placeholder="可否攜伴(可：1，不可：0)" name="withpeople" value="<?php echo $data[5]?>">
          <button class="btn btn-primary" type="submit">Add</button> 
        </form>
        <?php endif;?>
        
      </div>
    </div>
    &nbsp;&nbsp;
    
    <!-- 顯示時間輸入錯誤 -->
    <?php if($data2 ==0):?>
      <h4 class="text-center  wowload fadeInUp">Error(時間)</h4>
    <!-- 顯示攜伴人數輸入錯誤 -->
    <?php elseif($data2==1):?>
      <h4 class="text-center  wowload fadeInUp">Error(攜伴人數)</h4>
    <?php endif;?>
    
  </div>
</div>
<!-- Activity Ends-->

</body>
</html>