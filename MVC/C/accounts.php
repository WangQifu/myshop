<?php
?>
<script>
	$(document).ready(function(){
	
			function addCartNum(pid)
			{
				$.post("index.php?control=prodC&action=accounts&",{"pid":pid},function(result){
					alter(result);
				})
			}
	}
</script>