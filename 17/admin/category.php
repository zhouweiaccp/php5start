<?php
  /************************************/
  /*    �ļ�����admin/category.php    */
  /*    ˵������Ʒ������ҳ��        */
  /************************************/
  include "../config.inc.php";	//�����ļ�
  include "header.inc.php";		//������湫��ͷ�ļ�
?>
<!-- ������Ʒ���� -->
<form action="category_edit.php" method="post">
  <table width="100%" class="main" cellspacing="1">
    <caption>
    ��������
    </caption>
    <input type="hidden" name="action" value="addcat">
    <tr>
      <th width="20%"><input type="submit" value="��������" name="submit1">
        </td>
      <td width="80%"><input size="30" name="category_name"></td>
    </tr>
  </table>
</form>

<!-- �޸���Ʒ���� -->
<form action="category_edit.php" method="post">
  <table width="100%" class="main" cellspacing="1">
    <caption>
    �޸ķ���
    </caption>
    <input type="hidden" name="action" value="rencat">
    <tr>
      <th width="20%"><input type="submit" value="�޸ķ���" name="submit2"></th>
      <td width="80%"><select size="1" name="category_id">
          <option value="0">-=ѡ�����=-</option>
          <?php echo OptionCategories() ?>
        </select>
        �����֣�
        <input name="category_name" size="20">
      </td>
    </tr>
  </table>
</form>

<!-- ɾ����Ʒ���� -->
<form action="category_edit.php" method="post">
  <table width="100%" class="main" cellspacing="1">
    <caption>
    ɾ������
    </caption>
    <input type="hidden" name="action" value="delcat">
    <tr>
      <th width="20%"><input type="submit" value="ɾ������" name="submit3">
        </td>
      <td width="80%"><select size="1" name="category_id">
          <option value="0">-=ѡ�����=-</option>
          <?php echo OptionCategories() ?>
        </select></td>
    </tr>
  </table>
</form>

</body>
</html>
