<script>
	do_message=function() {
		title = $("money").value+"元/"+$("room_num").value;
		title += " - "+$("title").value;
		content = $("desc").value;
		email = $("email").value;
		tel = $("tel").value;
		city_id = "<?php echo $city_id; ?>"+"_"+$("city_id").value+"_"+$("sub_city_id").value;
		category_id="<?php echo $category_id; ?>";
		submit_message(title,content,email,tel,city_id,category_id);
	}
</script>
地区：<span><?php echo $city_name; ?></span>
<br />
<span id="message_class"><?php echo $class_name; ?></span>
<form>
	<table>
		<tr><td>居室</td><td>租金</td><td>发布标题</td></tr>
		<tr>
			<td>
				<select id="room_num">
					<option value="一居">一居</option>
					<option value="二居" selected>二居</option>
					<option value="三居">三居</option>
					<option value="四居">四居+</option>
				</select>
			</td>
			<td><input type="text" id="money" size="6" />元</td>
			<td><input type="text" id="title" size="35" /></td>
		</tr>
		<tr>
			<td colspan="3">房屋描述：</td>
		</tr>
		<tr >
			<td colspan="3" ><textarea rows="8" cols="50" id="desc"></textarea></td>
		</tr>
		<tr>
			<td colspan="3">所在地：(可不选，代表本地区发布)</td>
		</tr>
		<tr>
			<td colspan="2"><select size="10" id="city_id" onchange="sub_city(this.value);" style="width:150px;height:100px;"><?php echo $city_options; ?></select></td>
			<td><div id="sub_city">&nbsp;</div></td>
		</tr>
		<tr>
			<td colspan="3">Email：</td>
		</tr>
		<tr>
			<td colspan="3"><input type="text" name="email" id="email" /></td>
		</tr>
		<tr>
			<td colspan="3">电话：</td>
		</tr>
		<tr>
			<td colspan="3"><input type="text" name="tel" id="tel" /></td>
		</tr>
		<tr>
			<td colspan="3"><input type="button" value=" 发 布 信 息 "  style="font:bold; width:120px;height:40px;" onclick="do_message();" /></td>
		</tr>
	</table>
</form>