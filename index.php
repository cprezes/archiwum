<?php

require ('stale.php');
require_once ('footer.php'); 
?>

 <center> <h3> Witaj w archiwum, aby kontynuować przejdz do odpowiedniej zakładki  </h3>
 </center>
     <?php
require_once ('header.php');

   
      if (empty(Session::get("kat"))) { Session::set("kat",0);}
      if (empty(Session::get("URL"))) { Session::set("URL", constant('URL'));}
      
      ?>

<div style="font-size: 1;
    position: absolute;
    right: 10px;
    bottom: 10px;
    z-index: -1;" > <a href="admin.php">admin</a></div>



