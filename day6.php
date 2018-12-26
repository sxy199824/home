<?php


header("content-type:text/html;charset=utf8");
echo 6;
$res=calFn(1,13);
function calFn($n,$m)
{
    $arr=range($n,$m);
    $num=0;
    $sum=0;
    for ($i=0;$i<count($arr);$i++)
    {
        if ($arr[$i]%10==1)
        {
            $sum++;
        }
    }
}



?>