<?php

$x = 15;
echo $x++;   //���15���ȷ��غ��Լ�
echo '<br/>';
$y = 20;
echo ++$y;   //���21�����ԼӺ󷵻�
echo '<br/>'; //���ˣ�$x=16��$y=21
//$z1 = ($x+$y)--;		//$z1Ϊ37��������36
$zz = ($x + $y);
$zz--;
echo ($zz);

//$z2 = --($x+$y);		//$z2Ϊ36
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
