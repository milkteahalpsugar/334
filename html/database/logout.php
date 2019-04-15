<?php
session_start();
session_destroy();

echo '<script type="text/javascript">
	alert("You have logged out.");
	window.location.href="../../homepage.php";
</script>';

exit();
?>

