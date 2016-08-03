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


// 印出原陣列
echo "Origin: <br><br>";

for ($i=0; $i<count($origin); $i++){
    for ($j=0; $j<count($origin); $j++){
        echo $origin[$i][$j]." ";
    }
    echo "<br>";
}

// 新陣列
echo "<br><br> Max area of 1: <br><br>";



$initorigin=new area($origin);

$initorigin->start();

$initorigin->printafter();

class area{

    var $oarray=array();
    var $oarray2=array();
    var $origin;
    var $maxarea=0;
    
    function __construct($arr)
    {
        $this -> origin = $arr;
        $originstart = $this -> origin;
    }
        
    
    function start(){
    
        for($i=0; $i<count($originstart); $i++)
        {
            for($j=0; $j<count($originstart); $j++)
            {
                if ($originstart[$i][$j])
                {
                    $num=1;
                    $getnum=$this->findmax($i,$j)+1;
                    
                    if($this->maxarea < $getnum)
                    {
                        $this->oarray2 = $this->oarray;
                        $this->maxarea =$getnum;
                    } 
                    
                    for($row=0; $row < count($originstart); $row++)
                    {
                        for($col=0; $col < count($originstart[$row]); $col++)
                        {
                            $this->oarray[$row][$col] = 0;
                        }
                    }
                }
            }
        }
    }
    
    
    function findmax(){
        
        if($originstart[$i+1][$j] && !$this->oarray[$i+1][$j])
        {
            $this->oarray[$i+1][$j] = $originstart[$i+1][$j];
            $num++;
            $num += $this->findnax($i+1,$j);
        };
        
        if($originstart[$i-1][$j] && !$this->oarray[$i-1][$j])
        {
            $this->oarray[$i-1][$j] = $originstart[$i-1][$j];
            $num++;
            $num += $this->findnax($i-1,$j);
        };
        
        if($originstart[$i][$j+1] && !$this->oarray[$i][$j+1])
        {
            $this->oarray[$i][$j+1] = $originstart[$i][$j+1];
            $num++;
            $num += $this->findnax($i,$j+1);
        };
        
        if($originstart[$i][$j-1] && !$this->oarray[$i][$j-1])
        {
            $this->oarray[$i][$j-1] = $originstart[$i][$j-1];
            $num++;
            $num += $this->findnax($i,$j-1);
        };
        return $num;
    }
    
    function printafter()
    {
        foreach($this->oarray2 as $key)
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