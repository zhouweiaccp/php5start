<?php

$x = 15;
echo $x++;   //输出15，先返回后自加
echo '<br/>';
$y = 20;
echo ++$y;   //输出21，先自加后返回
echo '<br/>'; //至此，$x=16，$y=21
//$z1 = ($x+$y)--;		//$z1为37，而不是36
$zz = ($x + $y);
$zz--;
echo ($zz);

//$z2 = --($x+$y);		//$z2为36
class clb {

    public static $a = '222222222';

    public function init() {
        echo '<br/>';
        echo '<br/>=='+self::$a;
    }

}
$cl=new clb();
$cl->init();
echo '-0'
?>
