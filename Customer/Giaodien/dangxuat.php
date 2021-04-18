<?php
      session_start();
      unset($_SESSION['loginuser']);
      header("location:./trangchu.php");
?>