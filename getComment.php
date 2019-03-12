<?php

    require ("library/function.php");
    require ("library/Db.class.php");

    $db = new DB();
    $pid = isset($_POST["pid"])?$_POST["pid"]:0;

    $sql = "select *  from mr_post where post_type = 1 and pid = :pid ORDER BY addtime DESC limit 5";

    $post = $db->query($sql,array("pid"=>$pid));
    foreach ($post as $vo){
        $sql2 = "select avatar from mr_user where id = :id ";
        $avatar = $db->single($sql2,array("id"=>$vo["user_id"]));

        $vo["avatar"] = get_cover_path($avatar);
        $vo["addtime"] = tranTime($vo["addtime"]);
        $list[] = $vo;
    }
    $jsdata = json_encode($list);
    echo $jsdata;


