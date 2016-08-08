<?php

class Controller {
    public function model($model) {
        require_once "../Exercise/models/$model.php";
        return new $model ();
    }
    
    public function view($view, $data = Array(),$data2 = Array(),$data3 = Array(),$data4 = Array(),$data5 = Array()) {
        require_once "../Exercise/views/$view.php";
    }
}


?>