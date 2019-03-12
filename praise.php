<?php

    require ("library/function.php");
    require ("library/Db.class.php");

    is_login();
    $db = new DB();
    $user_id = $_SESSION["user"]["id"];
    $post_id = $_POST["post_id"];

    $sql1 = "select * from mr_praise where user_id = :user_id and post_id = :post_id";
    $praise = $db->row($sql1,array("user_id"=>$user_id,"post_id"=>$post_id));
    if(!$praise){
        $sql2 = "insert into mr_praise(user_id,post_id) VALUE (:user_id,:post_id)";
        $insert = $db->query($sql2,array("user_id"=>$user_id,"post_id"=>$post_id));
        if($insert){
            echo 1;
        }
        $sql3 = "update mr_post set praise_num = praise_num+1 where id = :post_id";
        $db->query($sql3,array("post_id"=>$post_id));
    }else{
        echo 0;

    }

