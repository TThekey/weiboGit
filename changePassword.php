<?php
require ("library/function.php");
require('library/Db.class.php');//连接数据库
is_login();
$user_id = $_SESSION["user"]["id"];
$old_password = md5($_POST["old_password"]);
$new_password = md5($_POST["new_password"]);

$db = new DB();
$sql = "select password from mr_user where id = :user_id";
$password = $db->single($sql,array("user_id"=>$user_id));
if($old_password == $password){
    $sql = "UPDATE mr_user SET password = :new_password where id = :user_id";
    $update = $db->query($sql,array("new_password"=>$new_password,"user_id"=>$user_id));
    if($update){
        echo 1 ;
    }else{
        echo 0 ;
    }
}else{
    echo -1;
}