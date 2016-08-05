<?php

class employeeController extends Controller {

    //  到活動報名頁
    function employee(){
        $actname =$_GET['name'];            // 得活動名
        
        $ifwith=$this->model("sqlcommand");
        $with=$ifwith->with($actname);      // 判斷此活動是否可攜伴
        
        $this->view("employee",$actname,"",$with);    
    }
    
    //  參加活動
    function add(){
        $actname = $_GET['actname'];        // 活動名稱
        $enum=$_POST['Employeenum'];        // 員工編號
        $peoplenum=$_POST['Withpeople']+1;  // 人數計算(攜伴人數+員工1人)

        $ejoin=$this->model("sqlcommand");
        $message=$ejoin->joinact($actname,$enum,$peoplenum);    // 判斷加入人數是否超過上限
        
        if(isset($message))                                                                     // 加入人數超過上限
            $this->view("employee",$actname,[$message[0],$message[1],$message[2]],$message[3]);     // 回employee頁
        else                                                                                    // 加入人數未超過上限(加入成功)
            header("location:/Exercise/index");                                                     // 到首頁
    } 

}

?>
