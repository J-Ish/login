<?php

session_start();
SESSION_DESTROY();

header("Location:login.php");

?>