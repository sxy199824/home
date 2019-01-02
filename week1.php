<?php
header("content-type:text/html;charset=utf-8");
//九九乘法表
echo "九九乘法表";
echo "<table border='1px'>";
for($i=1;$i<=9;$i++)
{
    echo "<tr>";
    for($j=1;$j<=$i;$j++)
    {
        echo "<td>";
        $p = $i*$j;
        echo "$i*$j = $p";
        echo "</td>";
    }

    echo "</tr>";
}
echo "</table>";



// 杨辉三角
echo "杨辉三角"."<br>";

get(10);
function get($n)
{
    $arr = array();
    for($i=1;$i<=$n;$i++)
    {
     for($j=1;$j<=$i;$j++)
     {
         if($i==$j||$j==1)
         {
             echo $arr[$i][$j] = 1;
         }else
         {
             echo $arr[$i][$j] = $arr[$i-1][$j-1]+$arr[$i-1][$j];
         }
         echo "   ";
     }
        echo "</br>";
    }

}

 echo "判断一个数是否是水仙花数"."<br>";
//水仙花数
flower(151);
function flower($n)
{
    $b = floor($n/100%10);
    $s = floor($n/10%10);
    $g = floor($n%10);
    if(pow($g,3)+pow($s,3)+pow($b,3)==$n)
    {
        echo $n."是水仙花数";
    }else{
        echo $n."不是水仙花数";
    }
}