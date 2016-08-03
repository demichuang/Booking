<?php

class sqlcommand extends connect_db{
//首頁
    // 判斷$_SESSION["userName"]是否存在 
    function haveuser(){
        if (isset($_SESSION["userName"]))       
            $sUserName = $_SESSION["userName"]; 
        else
            $sUserName = "Guest";               

        return $sUserName;              // 回傳$sUserName 
    }
    
    // 定義$_SESSION["userName"] 
    function sessionuser($sessionuser){
        $_SESSION["userName"] =$sessionuser; 
        return $_SESSION["userName"];        // 回傳$_SESSION["userName"]  
    }
    
    // 從user資料表取與輸入的username和userpassword相符的資料      
    function logincheck($user,$password){
        $cmd="SELECT * FROM `admin` 
              WHERE `adminname`='$user' 
              AND `adminpw`='$password'";
    	$result=$this->db->query($cmd);
    	$num=$result->rowCount();
    	
    	return $num;    // 回傳資料筆數
    }
    
    function addact($name,$max){
        $cmd="INSERT `user`(`username`,`userpassword`)  
              VALUES('$newuser','$newpassword')";
    	$this->db->query($cmd);
    	
    	$cmd1="SELECT * FROM `dst` 
    	       WHERE `d`='1'";
    	$result1=$this->db->query($cmd1);
    
    	while($row = $result1->fetch())
	    {
            $cmd2="INSERT `file`(`username`,`dnum`,`dname`,`additem`,`gone`)
                   VALUES('$newuser','{$row['dnum']}','{$row['dname']}','0','0')";
            $this->db->query($cmd2);
	    }
	    
	    
	    $cmd3="SELECT * FROM `dst` 
	           WHERE `d`='2'";
    	$result2=$this->db->query($cmd3);
    
    	while($row = $result2->fetch())
	    {
	        $cmd4="INSERT `file2`(`username`,`dnum`,`dname`,`additem`,`gone`)
	               VALUES('$newuser','{$row['dnum']}','{$row['dname']}','0','0')";
       	    $this->db->query($cmd4);
	    } 
    }
    
    
    
    
    
    
    
    
    
    // 從user資料表取與輸入的新username相符的資料
    function signupcheck($newuser){
        $cmd="SELECT * FROM `user` 
              WHERE `username`='$newuser'";
    	$result=$this->db->query($cmd);
        $num=$result->rowCount();
        $row=$result->fetch();
        
    	return [$row,$num]; // 回傳結果
    }
    
    // 新增新使用者的資料
    function adduser($newuser,$newpassword){
        $cmd="INSERT `user`(`username`,`userpassword`)  
              VALUES('$newuser','$newpassword')";
    	$this->db->query($cmd);
    	
    	$cmd1="SELECT * FROM `dst` 
    	       WHERE `d`='1'";
    	$result1=$this->db->query($cmd1);
    
    	while($row = $result1->fetch())
	    {
            $cmd2="INSERT `file`(`username`,`dnum`,`dname`,`additem`,`gone`)
                   VALUES('$newuser','{$row['dnum']}','{$row['dname']}','0','0')";
            $this->db->query($cmd2);
	    }
	    
	    
	    $cmd3="SELECT * FROM `dst` 
	           WHERE `d`='2'";
    	$result2=$this->db->query($cmd3);
    
    	while($row = $result2->fetch())
	    {
	        $cmd4="INSERT `file2`(`username`,`dnum`,`dname`,`additem`,`gone`)
	               VALUES('$newuser','{$row['dnum']}','{$row['dname']}','0','0')";
       	    $this->db->query($cmd4);
	    } 
    }
    
    
    

}

?>
