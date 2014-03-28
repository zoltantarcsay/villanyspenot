<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
<script type="text/javascript">

	bkLib.onDomLoaded(function() {
		editor();
	});
	
	/**
	* nicExample
	* @description: An example button plugin for nicEdit
	* @requires: nicCore, nicPane, nicAdvancedButton
	* @author: Brian Kirchoff
	* @version: 0.9.0
	*/
	
	var nicExampleOptions = {
		buttons : {
			'send' : {name : __('send'), type : 'nicEditorExampleButton'}
		},iconFiles : {'send' : 'save.gif'}
	};
		var nicEditorExampleButton = nicEditorButton.extend({   
		mouseClick : function() {
			submitText();
		}
	});
	nicEditors.registerPlugin(nicPlugin,nicExampleOptions);
		
</script>

<div class="editor" id="editor_wrap">
	<div id="panel"> </div>
	<div id="area"> <?php echo $str_szoveg; ?> </div>
</div>


<form id="send" method="post">
	<input type="hidden" name="text" value=""></input>
	<input type="hidden" name="kod" value="<?php echo $kod; ?>"></input>
</form>

<script type="text/javascript">
		
	window.onload=function() {
		var height = (screen.height)*0.7;
		$( "#area" ).css( "height", height );
	};
	
</script>
