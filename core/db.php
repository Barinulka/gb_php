<?
    require_once 'consts.php';

    $connect = mysqli_connect(SQL_SERVER,SQL_USER,SQL_PASSWORD,SQL_DB) or 
        die("Error: ".mysqli_error($connect));

    if(!mysqli_set_charset($connect, "utf8")){
        printf("Error: ".mysqli_error($connect));
    }