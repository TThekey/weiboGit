<?php
require ("library/function.php");
require('library/Db.class.php');//连接数据库
is_login();
$db = new DB();
$user_id = $_SESSION["user"]["id"];
$sql = "select * from mr_user where id = :user_id";
$user = $db->row($sql,array("user_id"=>$user_id));
include ("view/setting_list.php");