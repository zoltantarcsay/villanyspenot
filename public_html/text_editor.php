<head>
</head>
<body onLoad="Start()">
<iframe onload="frameHeight();" id='edit' srcdoc='<?php echo htmlspecialchars($str_szoveg, ENT_QUOTES); ?>'></iframe>
<div id="menu_cont_bottom">
	<div id="menu_left">
			<form id="send" method="post">
			<input type="hidden" name="text" value=""></input>
			<input type="hidden" name="kod" value="<?php echo $kod; ?>"></input>
			<input class="editor_btn" type="submit" value="Elküld" onclick="getText();"></input>
			</form>
	</div>
	<div id="menu_right">
			<input type="checkbox" onclick="viewsource(this.checked)">View HTML Source</input>
	</div>	
</div>
<script>
</script>
