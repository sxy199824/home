<?php
header("content-type:text/html;charset=utf-8");
$res = flower(420);
function flower($n)
{
   $g = floor($n%10);
   $s = floor($n/10)%10;
   $b = floor($n/100%10);
   if(pow($g,3)+pow($s,3)+pow($b,3)==$n){
       echo "$n"."是水仙花数";
   }else{
       echo "$n"."不是水仙花数";
   }

}