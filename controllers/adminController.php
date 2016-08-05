<?php

class adminController extends Controller {

    //  到新增活動頁
    function admin(){
        $this->view("activity");    
    } 
    
    //  到新增人員頁
    function gopeople(){
        $actname = $_GET['name'];           // 活動名稱
        $this->view("peoplelist",$actname);    
    } 
    
    //  新增活動
    function addactivity(){
        $anum=$_POST["anum"];               // 活動編號
        $aname=$_POST["aname"];             // 活動名稱
        $maxpeople=$_POST['maxpeople'];     // 人數上限
        $starttime=$_POST['starttime'];     // 開始時間
        $endtime=$_POST['endtime'];         // 結束時間
        $withpeople=$_POST['withpeople'];   // 是否可攜伴
        
        if ($starttime>$endtime)                                                                // 如果開始時間和結束時間輸入錯誤
            $this->view("activity",[$anum,$aname,$maxpeople,$starttime,$endtime,$withpeople],0);    // 回activity頁
        if ($withpeople!=0 or $withpeople!=1)                                                   // 如果攜伴人數輸入錯誤
            $this->view("activity",[$anum,$aname,$maxpeople,$starttime,$endtime,$withpeople],1);    // 回activity頁
        else                                                                                    // 輸入正確
        {
            $addact=$this->model("sqlcommand");
        	$addact->addact($anum,$aname,$maxpeople,$starttime,$endtime,$withpeople);           // 活動寫進資料庫
            header("location:/Exercise/index");                                                 // 回首頁
        }
    }
    
    //  新增人員
    function addpeople(){
        $aname=$_GET['aname'];      // 活動名稱
        $enum=$_POST["enum"];       // 員工編號
        $ename=$_POST["ename"];     // 員工名稱

        $adde=$this->model("sqlcommand");
    	$adde->adde($aname,$enum,$ename);
        header("location:/Exercise/index");
    }

    
}

?>
