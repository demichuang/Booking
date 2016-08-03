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

$array=array();
$array2=array();

$max=0;

for($i=0; $i<count($origin); $i++)
{
    for($j=0; $j<count($origin); $j++)
    {
        if ($origin[$i][$j])
        {
            $num=1;
            
            
            if($max < $num)
            {
                $array2 = $array;
                $max =$num;
            } 
            
            for($row=0; $row < count($origin); $row++)
            {
                for($col=0; $col < count($origin[$row]); $col++)
                {
                    $array[$row][$col] = 0;
                }
            }
        }
    }
}



function findmax(){
    
    if($origin[$i+1][$j] && !$array[$i+1][$j])
            {
                $array[$i+1][$j] = $origin[$i+1][$j];
                $num++;
            };
            
            if($origin[$i-1][$j] && !$array[$i-1][$j])
            {
                $array[$i-1][$j] = $origin[$i-1][$j];
                $num++;
            };
            
            if($origin[$i][$j+1] && !$array[$i][$j+1])
            {
                $array[$i][$j+1] = $origin[$i][$j+1];
                $num++;
            };
            
            if($origin[$i][$j-1] && !$array[$i][$j-1])
            {
                $array[$i][$j-1] = $origin[$i][$j-1];
                $num++;
            }
    
}


foreach($array2 as $key)
{
    foreach($key as $value)
    {
        echo $value." ";
    }
    echo "<br>";
} 
       
?>