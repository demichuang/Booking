<?php

// $origin 陣列(原陣列)
$origin = array(
    array(1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
    array(0, 0, 0, 1, 1, 0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 1, 1, 1, 0, 0),
    array(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
    array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
    array(1, 1, 1, 0, 1, 0, 1, 1, 1, 1),
    array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
    array(1, 0, 0, 0, 1, 0, 1, 1, 1, 1),
    array(1, 1, 0, 1, 1, 0, 0, 0, 0, 1)
);

$init=new area($origin);

// 印出原陣列
echo "Origin: <br><br>";
$init->init();

// 印出新陣列
echo "<br><br> Max area of 1: <br><br>";
$init->start();
$init->printafter();


class area{
    
    var $temparray=array();         // 暫存陣列
    var $maxarray=array();          // 最大陣列
    var $maxarea=0;                 // 最大面積的"1"數量預設為0
    
    function __construct($arr)
    {
        $this->origin = $arr;
    }
    
    // 印出原陣列
    function init()
    {
        foreach($this->origin as $key)
        {
            foreach($key as $value)
            {
                echo $value." ";
            }
            echo "<br>";
        } 
    }
        
    // 開始執行
    function start()
    {
        for($i=0; $i<count($this->origin); $i++)
        {
            for($j=0; $j<count($this->origin); $j++)
            {
                if ($this->origin[$i][$j])                  // 如果$origin[$i][$j]位置值為1
                {
                    $getnum=$this->findmax($i,$j);                  // 搜尋$origin[$i][$j]位置周圍是否值為1
                    
                    if($getnum > $maxarea)                  // 如果搜尋到面積的"1"數量 > 儲存的最大數量
                    {
                        $this->maxarray = $this->temparray;         // 最大陣列設為暫存陣列
                        $maxarea =$getnum;                          // 新搜尋到的"1"數量取代原最大數量
                    } 
                    
                    for($row=0; $row < count($this->origin); $row++)
                    {
                        for($col=0; $col < count($this->origin[$row]); $col++)
                        {
                            $this->temparray[$row][$col] = 0;       // 暫存陣列歸0                    
                        }
                    }
                }
            }
        }
    }
    
    // 搜尋$origin[$i][$j]位置周圍是否有1(有找到的話=>num+1)
    function findmax($i,$j)
    {
        if($this->origin[$i+1][$j] && !$this->temparray[$i+1][$j])  // 往下找
        {
            $this->temparray[$i+1][$j] = $this->origin[$i+1][$j];
            $num++;
            $num += $this->findmax($i+1,$j);
        };
        
        if($this->origin[$i-1][$j] && !$this->temparray[$i-1][$j])  // 往上找
        {
            $this->temparray[$i-1][$j] = $this->origin[$i-1][$j];
            $num++;
            $num += $this->findmax($i-1,$j);
        };
        
        if($this->origin[$i][$j+1] && !$this->temparray[$i][$j+1])  // 往右找
        {
            $this->temparray[$i][$j+1] = $this->origin[$i][$j+1];
            $num++;
            $num += $this->findmax($i,$j+1);
        };
        
        if($this->origin[$i][$j-1] && !$this->temparray[$i][$j-1])  // 往左找
        {
            $this->temparray[$i][$j-1] = $this->origin[$i][$j-1];
            $num++;
            $num += $this->findmax($i,$j-1);
        };
        return $num;        // 回傳找到的1數量
    }
    
    // 印出有最大1面積的新陣列
    function printafter()
    {
        foreach($this->maxarray as $key)
        {
            foreach($key as $value)
            {
                echo $value." ";
            }
            echo "<br>";
        } 
    }
    
}
       
?>