<?php

// Inialize session
session_cache_limiter( 'nocache' );
session_start();

// Delete certain session
unset($_SESSION['loguser']);
// Delete all session variables
// session_destroy();

// Jump to login page
header('Location: login.php');

?>