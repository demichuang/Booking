<?php

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


for ($i=0; $i<count($origin); $i++){
    for ($j=0; $j<count($origin); $j++){
        echo $origin[$i][$j]." ";
    }
    echo "<br>";
}



$max=0;

for($i=0; $i<count($origin); $i++)
{
    for($j=0; $j<count($origin); $j++)
    {
        if ($origin[$i][$j])
        {
            $e = 0;
            for($m=0; $m<count($origin)-$i; $m++)
            {
                for ($n=0; $n<count($origin)-$j-$e; $n++)
                {
                    if ($origin[$m + $i][$n + $j]==0)
                    {
                        $e = count($origin) - $j - $n;
                        break;
                    }
                    
                    $max = $max > ($m + 1) * ($n + 1) ? $max : ($m + 1) * ($n + 1);
                }
            }
        }
    }
}

echo $max;

/*
$count=0;
$max = $max > ($m + 1) * ($n + 1) ? $max : ($m + 1) * ($n + 1);

for ($i=0; $i<count($origin); $i++){
    for ($j=0; $j<count($origin); $j++){
        
        if($origin[$i][$j]==1){
            
            for($m=0; $m<count($origin)-$i; $m++){
                for($n=0; $n<count($origin)-$i; $n++){
                    
                    if($origin[$i+$m][$j+$n]!=1){
                        break;
                        
                    }
                
                }
            }
            
        }
        
    }
}

echo $count;

$i=0;
$j=0;

$count=0;

for ($i=0; $i<3; $i++){
    
     for ($j=0; $j<3; $j++){
         
        for ($n=0; $n<3;$n++){
         
            if($origin[$i][$j+$n]==1){
                $count++;
            }
            if($origin[$i][$j+$n]==0){
                if($origin[$i+1][$j+$n-1]==1){ 
                    $count++;
                    if($origin[$i+1][$j+$n]==1){
                        $count++;
                        if($origin[$i+2][$j+$n]==1){
                            $count++;
                            if($origin[$i+2][$j+$n-1]==1){
                                $count++;
                                if($origin[$i+2][$j+$n-2]==1){
                                    $count++;
                                    if($origin[$i+1][$j+$n-2]==1){
                                        $count++;
                                        if($origin[$i+1][$j+$n-1]==1){
                                            $count++;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
         }
    }
}


echo $count;



*/
       
?>
