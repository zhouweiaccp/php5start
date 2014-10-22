<form enctype="multipart/form-data" method="POST" action="multiy_upload.php">
	<input type="hidden" name="MAX_FILE_SIZE" value="40000">
	文件1：<input name="upfile[]" type="file"><br>
	文件2：<input name="upfile[]" type="file"><br>
	文件3：<input name="upfile[]" type="file"><br>
	<input type="submit" value="上传文件">
</form>
