<?php



    function msg ($string1,$string2) {
	if ($string1 == "error1" and $string2 = 'brak') {
		print "<div class=\"error\">BŁĄD - Kolejny numer zapisu już istnieje!</div>";
	}
	if ($string1 == "error2" and $string2 == 'brak') {
		print "<div class=\"error\">BŁĄD - Brak numeru kolejnego zapisu!</div>";
	}
	else if  ($string2 == 'zapisu') {
		print "<div class=\"success\">Operacja $string2 wykonana poprawnie!</div>";
	}
	
    }

     function clean($strings) {
        $strings = str_replace('', '-', $strings); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '-', $strings); // Removes special chars.
     }
    
?>


