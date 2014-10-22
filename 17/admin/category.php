<?php
  /************************************/
  /*    文件名：admin/category.php    */
  /*    说明：商品类别管理页面        */
  /************************************/
  include "../config.inc.php";	//配置文件
  include "header.inc.php";		//管理界面公用头文件
?>
<!-- 建立商品分类 -->
<form action="category_edit.php" method="post">
  <table width="100%" class="main" cellspacing="1">
    <caption>
    建立分类
    </caption>
    <input type="hidden" name="action" value="addcat">
    <tr>
      <th width="20%"><input type="submit" value="建立分类" name="submit1">
        </td>
      <td width="80%"><input size="30" name="category_name"></td>
    </tr>
  </table>
</form>

<!-- 修改商品分类 -->
<form action="category_edit.php" method="post">
  <table width="100%" class="main" cellspacing="1">
    <caption>
    修改分类
    </caption>
    <input type="hidden" name="action" value="rencat">
    <tr>
      <th width="20%"><input type="submit" value="修改分类" name="submit2"></th>
      <td width="80%"><select size="1" name="category_id">
          <option value="0">-=选择分类=-</option>
          <?php echo OptionCategories() ?>
        </select>
        新名字：
        <input name="category_name" size="20">
      </td>
    </tr>
  </table>
</form>

<!-- 删除商品分类 -->
<form action="category_edit.php" method="post">
  <table width="100%" class="main" cellspacing="1">
    <caption>
    删除分类
    </caption>
    <input type="hidden" name="action" value="delcat">
    <tr>
      <th width="20%"><input type="submit" value="删除分类" name="submit3">
        </td>
      <td width="80%"><select size="1" name="category_id">
          <option value="0">-=选择分类=-</option>
          <?php echo OptionCategories() ?>
        </select></td>
    </tr>
  </table>
</form>

</body>
</html>
