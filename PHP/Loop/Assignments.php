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
$start = 10;
$end = 0;
$stop = 3;
for($i=$start; $i!=$stop-1; $i--){
    if($i<10)
        echo $end.$i."<br>";
    else
        echo $i."<br>";
}

#assignment 5:
$start = 0;
$mix = [1, 2, 3, "A", "B", "C", 4];
for ($i = $start; $i < count($mix); $i++) {
    //ignoring the first element
    if ($i == $start) 
        continue;
    // echo numbers only
    if (is_numeric($mix[$i]))
        echo $mix[$i] . "<br>";
}

#assignment 6:
$money = ["Ahmed" => 100, "Sayed" => 150, "Osama" => 100, "Maher" => 250];
foreach ($money as $name => $amount)
    echo "The Name Is $name And I Need $amount Pound From Him<br>";

#assignment 7:
$mix = [1, 2, "A", "B", "C", 3, 4];
$numbers = 0;
$letters = 0;
foreach($mix as $item) {
    if(is_numeric($item)){
        echo $item . "<br>";
        $numbers++;
    }else
        $letters++;
}
echo "\"$numbers Numbers Printed\"<br>";
echo "\"$letters Letters Ignored\"<br>";

#assignment 8:
$nums = [1, 13, 12, 20, 51, 17, 30];
foreach($nums as $num)
    if($num % 2 == 0)
        echo $num / 2 . "<br>";

#assignment 9:
$help_num = 3;
$nums = [4, 5, 6, 1, 2, 3];
$names = ["Ahmed", "Sayed", "Osama", "Mahmoud", "Gamal"];
for ($i = $help_num - 2; $i < $help_num; $i++)
    echo "\"$names[$i]\"<br>";

#assignment 10:
$help_num = 4;
$nums = [2, 4, 5, 6, 10];
foreach ($nums as $index => $num)
    echo "\"$num + " . $nums[count($nums) - $index - ($help_num / $help_num)] . " = " 
    . ($num + $nums[count($nums) - $index - ($help_num / $help_num)]) . "\"<br>";
