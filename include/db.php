<?php
if (session_status()==1){ die();}
 $Gdzie_jestem = Session::get("Gdzie_jestem");
 if ($Gdzie_jestem =="archiwum/archiwum.php"){$mysqlDbName=constant("dbarch"); }
 elseif ($Gdzie_jestem == "umowy/umowy.php") {$mysqlDbName=constant("dbumowy");}
 elseif ($Gdzie_jestem == "pieczecie/pieczecie.php") {$mysqlDbName=constant("dbpieczecie");} else {die();}   //przy zaminie popraw  ten badziew w plikach index.php archiwum i umowy
         
 
         Session::set("db_name", $mysqlDbName) ;    
         $mysql   = @mysql_connect(constant('dbhost'), constant('dbuser'), constant('dbpassword'));
         $mysqldb = @mysql_select_db($mysqlDbName);
	 $user 	  = @mysql_real_escape_string($_POST['user']);
	 $pass 	  = @mysql_real_escape_string($_POST['pass']);
         $query   = "SELECT * FROM uzytkownicy WHERE uzytkownik='$user' AND haslo='$pass'";
         $result  = mysql_query($query);
    	 $row 	  = mysql_fetch_array($result);
         if($row['haslo']==$pass and $row['haslo']!='') {
	        $uzytkownik		= $row["id"];
                $nazwa			= $row["nazwa"];
		$zapis			= $row["zapis"];
		Session::set("uzytkownik", $uzytkownik);
		Session::set("nazwa", $nazwa);
		Session::set("zapis", $zapis);
                Session::set("zalogowano"," Jesteś zalogowany jako $nazwa na bazie ". Session::get("Nazwa_bazy"));
                     echo ("
                          <br>
                          <center><b>Jesteś zalogowany(a) jako: $nazwa</b>
                          <br />
                          <br />
                          <a href=". constant("URL") . $Gdzie_jestem . ">Przejdź do menu</a>
                          </center>
                          <br>
                         ");
                     Session::set("user", $uzytkownik ."  ". $nazwa);
                 }
          else
                 {
                     echo ( constant('Bug'));
                     Session::destroy();
                 };