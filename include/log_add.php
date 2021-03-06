<?php

function log_add($parametry = "") {
    // MySQL command create table  
    //CREATE TABLE `log`.`pieczecie` ( `id` BIGINT NOT NULL AUTO_INCREMENT ,
    // `timestamp` TIMESTAMP on update CURRENT_TIMESTAMP() NOT NULL DEFAULT CURRENT_TIMESTAMP() , `user_name` VARCHAR(32) NULL DEFAULT NULL , 
    // `ip` VARCHAR(16) NULL DEFAULT NULL , `adress` TEXT NULL DEFAULT NULL , `parmas` TEXT NULL DEFAULT NULL , 
    // PRIMARY KEY (`id`)) ENGINE = InnoDB;


    $link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $ip = $_SERVER['REMOTE_ADDR'];
    $user = "undefined";
    if (Session::get("uzytkownik"))
        $user = Session::get("user");
    include_once __DIR__ . '/baza.php';
    include_once __DIR__ . '/../stale.php';
    $logDB = new DB(LOG_DB_HOST, LOG_DB_USER, LOG_DB_PASSWD, LOG_DB_NAME);
    $data = array(
        'user_name' => $user,
        'ip' => $ip,
        'adress' => $link,
        'parmas' => $parametry
    );

    $data = $logDB->filter($data);

    $logDB->insert(Session::get("db_name"), $data);
}
