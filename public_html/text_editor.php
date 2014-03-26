<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<div >
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>						
	<textarea name="area" id="area" style="width: 100%;">
		<?php echo htmlspecialchars($str_szoveg, ENT_QUOTES); ?>
	</textarea>
</div>
<div id="menu_cont_bottom">
	<div id="menu_left">
			<form id="send" method="post">
			<input type="hidden" name="text" value=""></input>
			<input type="hidden" name="kod" value="<?php echo $kod; ?>"></input>
			<input class="editor_btn" id="btn_send" type="submit" value="Elküld"></input>
			</form>
	</div>
</div>
<script type="text/javascript">
	$("#btn_send").click(function () {
		var nicInstance = nicEditors.findEditor('area');
		var content = nicInstance.getContent();
		var formInfo = document.forms['send'];
		formInfo.text.value = content;
	});
</script>
