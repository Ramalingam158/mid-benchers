<?php

session_start();
// Storing values in Session variables
// $_SESSION['name'] = '';
// $_SESSION['ID'] = '';
// $_SESSION['dept'] = '';
// $_SESSION['designation'] = '';
// $_SESSION['contact'] = '';
// $_SESSION['mail'] = '';
// $_SESSION['whoisit'] = '';

session_destroy();

?>
<script type="text/javascript">
	window.location = "../login.php";
</script>