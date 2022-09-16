<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["usernames"]);
header("Location:../login.php?type=servx");
echo 
"<style>
    // disply:none;
</style>";
?>