<?php

class indexController extends Controller {

    //  到首頁
    function index(){
        $getuser=$this->model("sqlcommand");
        $AdminName=$getuser->haveuser();        // 判斷$_SESSION["adminName"]是否存在
        
        $getact=$this->model("sqlcommand");
        $array=$getact->showactname();          // 取活動資料
        
        $this->view("index",$AdminName,[$array[0],$array[1],$array[2]]);    // 回首頁(data1:身分、data2:活動資料)
    } 
    
    //  到管理者登入頁
    function admin(){
        $this->view("admin_login","Guest");    
    }     
    
    //  管理者登入
    function login(){
        $user=$_POST["txtUserName"];            //  得輸入的adminname
        $password=$_POST['txtPassword'];        //  得輸入的adminpassword
        
        $login =$this->model("sqlcommand");
    	$num =$login->logincheck($user,$password);      // 取user資料表與輸入的adminname和adminpassword相符的資料筆數
    	
     	if (trim($user) !="" & $num == 1)               // 登入成功(如果輸入的adminname非空值，且資料表內有一筆相符的資料)    
    	{
    		$giveuser=$this->model("sqlcommand");
            $AdminName=$giveuser->sessionuser($user);       // $_SESSION['userName']設為輸入的username
    		$this->index();                                 // 回首頁
    	}
    	else                                            //	登入失敗    
    	{
    	    $giveuser=$this->model("sqlcommand");
            $AdminName=$giveuser->sessionuser("Guest");     // $_SESSION["adminName"]設為"Guest"
      	    $this->view("admin_login",$AdminName,1);        // 回登入頁，傳data2=1值，顯示輸入錯誤或不是管理員
      	}
    }
    
    //  管理者登出
    function logout(){
        $giveuser=$this->model("sqlcommand");
        $AdminName=$giveuser->sessionuser("Guest");     // $_SESSION["adminName"]設為"Guest"
      	    
        $this->index();                                 // 回首頁
    }
    
}

?>
