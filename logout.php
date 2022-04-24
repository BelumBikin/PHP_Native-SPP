<?php
session_start();
session_destroy();
header("location: ../spp/index.php");
?>