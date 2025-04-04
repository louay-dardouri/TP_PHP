<?php
    session_unset();
    session_destroy();
    
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }

    header("Location: login.php");
    exit();