<?php

class sqlcommand extends connect_db{
//首頁
    // 判斷$_SESSION["adminName"]是否存在 
    function haveuser(){
        if (isset($_SESSION["adminName"]))       
            $AdminName = $_SESSION["adminName"]; 
        else
            $AdminName = "Guest";               

        return $AdminName;              // 回傳$AdminName 
    }
    
    // 定義$_SESSION["adminName"] 
    function sessionuser($sessionuser){
        $_SESSION["adminName"] =$sessionuser; 
        return $_SESSION["adminName"];        // 回傳$_SESSION["adminName"]  
    }
    
    // 從admin資料表取與輸入的adminname和adminpw相符的資料      
    function logincheck($user,$password){
        $cmd="SELECT * FROM `admin` 
              WHERE `adminname`='$user' 
              AND `adminpw`='$password'";
    	$result=$this->db->query($cmd);
    	$num=$result->rowCount();
    	
    	return $num;    // 回傳資料筆數
    }
    
    // 從addactivity資料表輸出活動資料
    function showactname(){
        $cmd="SELECT * FROM `addactivity`";
    	$result=$this->db->query($cmd);
    	$num=$result->rowCount();
    	$array=array();
    	$array2=array();
    	
    	while($row = $result->fetch())
	    {
           array_push($array,$row['act_name']);
           array_push($array2,$row['numpeople']);
	    }
    	return [$num,$array,$array2];    // 回傳資料筆數
    }


//admin
    // 輸入活動 
    function addact($aname,$maxpeople,$starttime,$endtime){
        $cmd="INSERT `addactivity`(`act_name`,`maxpeople`,`numpeople`,`starttime`,`endtime`)  
              VALUES('$aname','$maxpeople','0','$starttime','$endtime')";
    	$this->db->query($cmd);
    }
    
    // 輸入人員
    function adde($aname,$enum,$ename){
        $cmd="INSERT `employee`(`act_name`,`enum`,`ename`,`join`)  
              VALUES('$aname','$enum','$ename','0')";
    	$this->db->query($cmd);
    }
    
    
    
    
    
    
    
    
    function joinact($actnum){
        $cmd="SELECT * FROM `addactivity` 
              WHERE `actnum`='$actnum'";
    	$result=$this->db->query($cmd);
    	$row = $result->fetch();
	    
        	if($row['numpeople']<=$row['maxpeople']){
        	    $cmd="UPDATE `addactivity`(`numpeople`)  
                    VALUES('$actnum+1')";
        	    $this->db->query($cmd);
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
