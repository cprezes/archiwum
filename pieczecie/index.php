<?php
require ( '../stale.php');
include_once ("../footer.php");
include_once ("../include/data.php");

   if ((!isset($_POST['user'])) && (!isset($_POST['pass']))) {

echo ' <center><h2>Pieczecie [zaloguj się]</h2> </center> ';  


require_once ('../include/forms.php');
      }
   else
      {
          Session::set("Gdzie_jestem", "pieczecie/pieczecie.php");
          Session::set("Nazwa_bazy","Pieczecie");
          require_once ('../include/db.php');

      }
   require("../header.php");
