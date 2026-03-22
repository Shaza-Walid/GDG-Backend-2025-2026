<?php
#assignment 1:
$index = 10;
for($i=$index; $i>0; $i--)
    echo $i."<br>";

#assignment 2:
$ind = 0;
for($j=$ind; $j<=20; $j++){
    if($j!=0 && $j%2==0)
        echo $j."<br>";
}
$var = $ind;
while($var<=20){
    if($var!=0 && $var%2==0)
        echo $var."<br>";
    $var++;
}

#assignment 3:
$num = 2;
while ($num < 520) {
    @$start = ($start > 0) ? $start : 0 ;  //start with 0
    if($start == 0 ){
        $result = 1; 
    }else{
        $result = ($start + 1 )* 2 ;
    }
   
    $start = $result ;
    echo $result . "<br>" ;
    $num += 65 ;
}

#assignment 4:

