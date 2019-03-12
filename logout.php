<?php

    session_start();
    unset( $_SESSION['user']);

    $result = session_destroy();
    if($result){
        echo "<script>window.location.href= 'login.php' </script>";
    }else{
        echo"退出失败";
    }
