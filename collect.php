<?php

        require ("library/function.php");
        require ("library/Db.class.php");

        is_login();
        $user_id = $_SESSION["user"]["id"];
        $post_id = $_POST["post_id"];

        $db = new DB();
        $sql = "select * from mr_collect where user_id = :user_id and post_id = :post_id";
        $collect = $db->row($sql,array("user_id"=>$user_id,"post_id"=>$post_id));
        if(!$collect){          //首次收藏
            $sql2 = "insert into mr_collect(user_id,post_id,status) VALUE (:user_id,:post_id,1) ";
            $insert = $db->query($sql2,array("user_id"=>$user_id,"post_id"=>$post_id));
                echo 1;

        }else{
            $sql3 = "update mr_collect set status = :status where user_id = :user_id and post_id = :post_id ";
            if($collect["status"] == 0){    //已取消收藏，再次点击收藏
                $db->query($sql3,array("status"=> 1,"user_id"=>$user_id,"post_id"=>$post_id));
                echo 1;
            }else{          //已收藏
                $sql4 = "update mr_collect set status = 0 where id = :id";
                $db->query($sql4,array("id"=>$collect["id"]));
                echo 0 ;
            }
        }