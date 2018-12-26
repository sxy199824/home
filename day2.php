<?php
header("content-type:text/html;charset=utf8");
//春天是鲜花的季节，水仙花就是其中最迷人的代表，
//数学上有个水仙花数，他是这样定义的：
// “水仙花数”是指一个三位数，它的各位数字的立方和等于其本身，
//比如：153=1^3+5^3+3^3。 现在要求输出所有在m和n范围内的水仙花数。
//编写一个php函数测试输入的数字是否为水仙花数
$res= flower(153);
function flower($n)
{
    $b=floor($n/100%10);
    $s=floor($n/10%10);
    $g=floor($n%10);
    if (pow($g,3)+pow($b,3)+pow($s,3)==$n)
    {
        echo $n."是水仙花数";
    }
    else
    {
        echo $n."不是水仙花数";
    }
}





?>