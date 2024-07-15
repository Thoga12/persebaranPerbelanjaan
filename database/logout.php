<?php
session_start();
session_unset();
session_destroy();
header("Location: ../user/login.php?message=" . urlencode("Anda telah logout."));
exit();
?>
