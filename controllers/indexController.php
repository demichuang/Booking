<?php

class indexController extends Controller {

    //  到首頁(登入頁)
    function index(){
        $getuser=$this->model("sqlcommand");
        $sUserName=$getuser->haveuser();        // 判斷$_SESSION["userName"]是否存在
        
        $this->view("index",$sUserName);
    } 
    
    //  到管理者登入頁
    function admin(){
        $this->view("admin_login","Guest");    
    }     
    
    //  管理者登入
    function login(){
        
        $user=$_POST["txtUserName"];        //  得輸入的adminname
        $password=$_POST['txtPassword'];    //  得輸入的adminpassword
        
        $login =$this->model("sqlcommand");
    	$num =$login->logincheck($user,$password);      // 取user資料表與輸入的adminname和userpassword相符的資料筆數
    	
     	if (trim($user) !="" & $num == 1)               // 登入成功(如果輸入的username非空值，且user資料表內有一筆相符的資料)    
    	{
    		$giveuser=$this->model("sqlcommand");
            $sUserName=$giveuser->sessionuser($user);       // $_SESSION['userName']設為輸入的username
    		$this->view("index",$sUserName);                // 回到登入頁
    	}
    	else                                            //	登入失敗    
    	{
    	    $giveuser=$this->model("sqlcommand");
            $sUserName=$giveuser->sessionuser("Guest");     // $_SESSION["userName"]設為"Guest"
      	    $this->view("admin_login",$sUserName,1);              // 回到登入頁，傳data2=2值，顯示輸入錯誤或不是會員
      	}
    }       

    //  到新增活動頁
    function goactivity() {
        $this->view("activity");
    }
    
    //  新增活動
    function addactivity(){
        $name=$_POST["aname"];      //  得輸入的新username
        $max=$_POST['amaxpeople'];
        
        $addact=$this->model("sqlcommand");
    	$result =$addact->addact($name,$max);
        
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
            $sUserName=$giveuser->sessionuser("Guest");         // $_SESSION["userName"]設為"Guest"
      	    
    	    $this->view("index",$sUserName,3);                  // 回到登入頁，傳data2=3值，顯示本來就是會員了
    	  }
    	  else                                              // 如果輸入的userpassword不相符 
    	    $this->view("index_sign",4);                        // 回到註冊頁，傳data2=4值，顯示帳號名已被使用
    	}
    	else                                            // 如果沒有與輸入的username相符的資料
    	{
        	$addnew=$this->model("sqlcommand");
        	$result =$addnew->adduser($newuser,$newpassword);   // 新增輸入的username和userpassword至user資料表
            
            $giveuser=$this->model("sqlcommand");
            $sUserName=$giveuser->sessionuser("Guest");         // $_SESSION["userName"]設為"Guest"
      	    
            
            $this->view("index",$sUserName,5);                  // 回到登入頁，傳data2=5值，顯示現在是會員了
    	}
    }
    
    //  點登出按鈕
    function logout(){
        //$this->user();
        $giveuser=$this->model("sqlcommand");
        $sUserName=$giveuser->sessionuser("Guest");     // $_SESSION["userName"]設為"Guest"
      	    
        $this->view("index",$sUserName);                // 回到登入頁
    }
}

?>
