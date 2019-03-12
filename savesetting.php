<?php

        require ("library/function.php");
        require('library/Db.class.php');//连接数据库
        is_login();
        $user_id = $_SESSION["user"]["id"];
        $sex = $_POST["sex"];
        $qq  = $_POST["qq"];
        $email = $_POST["email"];
        $db = new DB();
        $sql = "UPDATE mr_user SET sex = :sex, qq = :qq, email = :email where id=:user_id";
        $update = $db->query($sql,array("user_id"=>$user_id,"sex"=>$sex,"qq"=>$qq,"email"=>$email));
        if($update !== false){
            echo "<script> alert('保存成功');window.location.href = 'setting.php';</script>";
        }else{
            echo "<script> alert('保存失败');window.location.href = 'setting.php';</script>";
        }
