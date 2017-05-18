<?php

require ('../stale.php');


if (empty(Session::get("EditDB"))) {
    die;
}
require_once ('baza.php');

If ((isset($_REQUEST['fildID'])) and ( !(empty($_REQUEST['fildID'])))) {
    $fildID = $_REQUEST["fildID"];
    $filds = explode("*-*", $fildID);
    $column = $filds[0];
    $id = $filds[1];
    $editval = trim($_REQUEST["editval"], "<br>");
    if ($column == "Id" or $column == "id")
        die();


    $database = new DB();
    $database = DB::getInstance();


    //Save change
    $update = array($column => $editval);
    $update_where = array('Id' => $id);
    $database->update("uzytkownicy", $update, $update_where, 1);


    //Get value to check if 
    $return = $database->get_results("SELECT $column FROM uzytkownicy WHERE Id=$id");
    echo $return[0][$column];
} elseif ((isset($_REQUEST['nowy']))) {
    $database = new DB();
    $database = DB::getInstance();

    $user_data = array(
        'nazwa' => 'NowyUser'
    );
    $database->insert(uzytkownicy, $user_data);

    $previous = "javascript:history.go(-1)";
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }
    echo "<a href= $previous>Powórt</a>";
    echo ' <body onload="javascript:history.go(-1);">';
} else
    die(); 


