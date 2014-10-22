<?php
   //�Զ��幹���ѯ�ַ�������
   function build_query($formdata, $key = null)
   {
       $res = array();
       foreach ((array)$formdata as $k=>$v) {
           $tmp_key = urlencode($k);
           if ($key) $tmp_key = $key.'['.$tmp_key.']';
           if (is_array($v)) {
               $res[] = build_query($v, $tmp_key);
           } else {
               $res[] = $tmp_key."=".urlencode($v);
           }
       }
       return implode("&", $res);
   }
   
   //���Ժ�����֧�ֶ�ά����
   $query = array (
		"col"=>array("blue", "red"), 
		"fav" => "books",
		"id" => array("u001", array(11,22)) ,
   );
   echo build_query($query);

   //�������col[0]=blue&col[1]=red&fav=books&id[0]=u001&id[1][0]=11&id[1][1]=22
?>

