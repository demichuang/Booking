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
    	$array3=array();
    	
    	while($row = $result->fetch())
	    {
           array_push($array,$row['act_name']);
           array_push($array2,$row['maxpeople']);
           array_push($array3,$row['numpeople']);
	    }
    	return [$num,$array,$array2,$array3];    // 回傳資料筆數
    }


//admin
    // 輸入活動 
    function addact($anum,$aname,$maxpeople,$starttime,$endtime,$withpeople){
        $cmd="INSERT `addactivity`(`act_num`,`act_name`,`maxpeople`,`numpeople`,`starttime`,`endtime`,`with`)  
              VALUES('$anum','$aname','$maxpeople','0','$starttime','$endtime','$withpeople')";
    	$this->db->query($cmd);
    }
    
    // 輸入人員
    function adde($aname,$enum,$ename){
        $cmd="INSERT `employee`(`act_name`,`enum`,`ename`,`join`)  
              VALUES('$aname','$enum','$ename','0')";
    	$this->db->query($cmd);
    }
    

//employee
    // 判斷是否可攜伴
    function with($actname){
        $cmd="SELECT * FROM `addactivity`   
              WHERE `act_name` ='$actname'";
    	$result=$this->db->query($cmd);
    	$row=$result->fetch();
        
        return $row['with'];        
    }

    // 活動報名
    function joinact($actname,$enum,$peoplenum){
        $cmd="SELECT * FROM `addactivity`   
              WHERE `act_name` ='$actname'";
    	$result=$this->db->query($cmd);
    	$row=$result->fetch();
    	
    	$total=$row['numpeople']+$peoplenum;
    	
    	if($total>$row['maxpeople'])
    	    return ["超出人數上限",$row['maxpeople'],$row['numpeople'],$row['with']];
    	else
    	{
    	    $cmd1="UPDATE `addactivity` 
    	           SET `numpeople`='$total'  
                   WHERE `act_name` ='$actname'";
    	    $this->db->query($cmd1);
    	}
    }
    
}

?>
