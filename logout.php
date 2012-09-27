<!--<script type="text/javascript">
	$(".alert").alert();
</script>-->
<?php
	session_start();
	include "includes/head.php";

	session_destroy();
	
	echo '<center><div class="alert" style="width:450px;">
  		<!--<button id ="close" type="button" class="close" data-dismiss="alert">&times;</button>-->
  		<strong>You have been logged out.</strong> Click <a href="index.php">here</a> to go to start page.
	</div></center>';

?>
