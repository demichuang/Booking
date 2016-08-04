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
    
    
    //  編輯活動
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
    

    
}

?>
