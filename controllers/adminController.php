<?php

class adminController extends Controller {

    //  到新增活動頁
    function admin(){
        $this->view("activity");    
    }     
    
    //  新增活動
    function addactivity(){
        $aname=$_POST["aname"];         //  得輸入的新username
        $maxpeople=$_POST['maxpeople'];
        $withpeople=$_POST['withpeople'];
        $starttime=$_POST['starttime'];
        $endtime=$_POST['endtime'];

        $addact=$this->model("sqlcommand");
    	$addact->addact($aname,$maxpeople,$starttime,$endtime);
        $this->view("peoplelist",$aname);
    }
    
    //  新增人員
    function addpeople(){
        $aname=$_GET['aname'];
        $enum=$_POST["enum"];        
        $ename=$_POST["ename"]; 

        $adde=$this->model("sqlcommand");
    	$adde->adde($aname,$enum,$ename);
        header("location:/Exercise/index");
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function goact(){
        $actnum=$_GET['actnum'];    //  得輸入的adminpassword
        
        $join =$this->model("sqlcommand");
    	$join->joinact($actnum);
        
        header("lcation:/Exercise/index");
        
    }

    
    //  點註冊按鈕
    function signup(){
        $newuser=$_POST["newtxtUserName"];      //  得輸入的新username
        $newpassword=$_POST['newtxtPassword'];  //  得輸入的新userpassword
        
        $signup=$this->model("sqlcommand");
    	$result =$signup->signupcheck($newuser);   // 取user資料表與新輸入的username相符的資料
    	$row = mysqli_fetch_array($result);        // 取每筆資料
        
    	if (mysqli_num_rows($result)>0)                 // 如果有與輸入的username相符的資料                        
    	{
    	  if($row['userpassword']==$newpassword)            // 如果輸入的userpassword也相符
    	  { 
    	    $giveuser=$this->model("sqlcommand");
            $AdminName=$giveuser->sessionuser("Guest");         // $_SESSION["adminName"]設為"Guest"
      	    
    	    $this->view("index",$AdminName,3);                  // 回到登入頁，傳data2=3值，顯示本來就是會員了
    	  }
    	  else                                              // 如果輸入的userpassword不相符 
    	    $this->view("index_sign",4);                        // 回到註冊頁，傳data2=4值，顯示帳號名已被使用
    	}
    	else                                            // 如果沒有與輸入的username相符的資料
    	{
        	$addnew=$this->model("sqlcommand");
        	$result =$addnew->adduser($newuser,$newpassword);   // 新增輸入的username和userpassword至user資料表
            
            $giveuser=$this->model("sqlcommand");
            $AdminName=$giveuser->sessionuser("Guest");         // $_SESSION["adminName"]設為"Guest"
      	    
            
            $this->view("index",$AdminName,5);                  // 回到登入頁，傳data2=5值，顯示現在是會員了
    	}
    }
    
    
}

?>
