<?php
class connect_db{
    public $db;
    public function __construct()
    {
        $this->db= new PDO('mysql:host=127.0.0.1;dbname=activity;charset=utf8',
                           'root',
                           ''
                           );
    }
}
?>