<?php
  /**************************************/
  /*		�ļ�����emotion.php			*/
  /*		���ܣ��鿴����ͼƬҳ��		*/
  /**************************************/

  include "config.inc.php";		//����������Ϣ
  include "header.inc.php";		//��������ͷ��ҳ��

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <strong>����</strong> - <a href="userlist.php">����</a>
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
  <?php
	$i = 0;

	//ѭ����������
	foreach($smilies as $icon => $image)
	{
		//�����е���ɫ
		if($bgrow == 1){
			$bgcolor = "row_1";
			$bgrow = 0;
		}else{
			$bgcolor = "row_2";
			$bgrow = 1;
		}
  ?>
	  <tr class="<?php echo $bgcolor ?>">
	    <td><strong><?php echo $icon ?></strong></td>
	    <td><?php echo $image ?></td>
	  </tr>
  <?php
	}
  ?>
	</table>
    </td>
  </tr>
</table>

</body>
</html>
