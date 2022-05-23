<?php
include_once "../functions/goods.php";
if($_GET[id]){
    $id= $_GET[id];
    deleteGood($connect, $id);
    header("Location: admin.php");
}