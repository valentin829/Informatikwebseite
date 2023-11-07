<?php
session_start();

if (isset($_SESSION['username'])) {
    session_destroy();
    header("Location: logout_success.html");
    exit();
} else {
    header("Location: logout_failure.html");
    exit();
}
?>
