<?php
require ( '../stale.php');
include_once ("../include/data.php");

    $dbhost     = constant('dbhost') ;
    $dbuser     = constant('dbuser');
    $dbpassword = constant('dbpassword');
    $dbarch     = constant('dbpieczecie') ;
    
    if ((isset($_GET['id']) and (! empty($_GET['id'])))){
        $id=$_GET['id'];
       }else{
         echo ( constant('Bug'));
         die();
       }
if (!empty(Session::get("uzytkownik")) AND Session::get("uzytkownik") > 0 and Session::get("Nazwa_bazy") == "Pieczecie") {

//    if (isset($_GET['plik'])) {
//        if (!(Session::get('plik')==$_GET['plik'])) die();
//        $path = KATALOG_ARCH."arch/";
//        $fullPath = $path . $_GET['plik'];
//        if (file_exists($fullPath) and $fd = fopen($fullPath, "r")) {
//            $fsize = filesize($fullPath);
//            $path_parts = pathinfo($fullPath);
//            $ext = strtolower($path_parts["extension"]);
//            switch ($ext) {
//                case "pdf":
//                    header("Content-type: application/pdf");
//                    header("Content-Disposition: attachment; filename=\"" . $path_parts["basename"] . "\"");
//                    exit;
//                default;
//                    header("Content-type: application/pdf");
//                    header("Content-Disposition: filename=\"" . $path_parts["basename"] . "\"");
//            }
//            header("Content-length: $fsize");
//            header("Cache-control: private");
//            while (!feof($fd)) {
//                $buffer = fread($fd, 2048);
//                echo $buffer;
//            }
//        } else {
//            print "Brak pliku!";
//            exit;
//        }
//        fclose($fd);
//        exit;
    if (isset($_GET['id'])) {
        
        $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
        $mysqldb = mysql_select_db($dbarch);
        mysql_query("SET NAMES utf8");
        $query = "SELECT * FROM rejestr_umow WHERE numer_kolejny_zapisu='{$_GET['id']}'";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        $numer_kolejny_zapisu = $row['numer_kolejny_zapisu'];
        $nazwa_nadawcy_adresata = $row['nazwa_nadawcy_adresata'];
        $data_rejestracji_dokumentu = $row['data_rejestracji_zapisu'];
        $numer_dokumentu_otrzymania = $row['numer_dokumentu_otrzymania'];
        $nazwa_dokumentu_lub_czego_dotyczy = $row['nazwa_dokumentu_lub_czego_dotyczy'];
        $wprowadzil = $row['uzytkownik_id'];
        $wprowadzil_data = $row['data'];
        if ($row['skan'] != "") {
         $skan = $row['skan'];
   Session::set('plik',$skan);
     Session::set('plikNazwa',  clean($numer_kolejny_zapisu));     
    $pdf = "<a href=\"pobierz.php?plik=" . $skan . "&nazwa=".clean($numer_kolejny_zapisu)."\">Pobierz plik <img src=\"../images/pdf.png\" border=\"0\"></a>";
   } else {
            $pdf = "";
        }
        mysql_query("SET NAMES utf8");
        $query1 = "SELECT * FROM uzytkownicy WHERE id=$wprowadzil";
        $result1 = mysql_query($query1);
        $row1 = mysql_fetch_array($result1);
        $nazwa = $row1['nazwa'];
        mysql_query("SET NAMES utf8");
        $query2 = "SELECT * FROM adnotacje WHERE id_umowy='$id'";
        $result2 = mysql_query($query2);
        $row2 = mysql_fetch_array($result2);
        $adnotacja = $row2['adnotacje'];
        mysql_query("SET NAMES utf8");
        $query3 = "SELECT * FROM uwagi WHERE id_umowy='$id'";
        $result3 = mysql_query($query3);
        $row3 = mysql_fetch_array($result3);
        $uwaga = $row3['uwagi'];
        mysql_close();
        ?>

        <?php
        if ($numer_kolejny_zapisu == "") {
            print "BŁĄD!";
            exit;
        }
        ?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                    <title>Dokument </title>
                    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/style.css">
                        </head>
                        <BODY>
                            <table cellspacing="0" cellpadding="0" border="1" bordercolor="black"  width="100&" align="center" style="border-style:solid; border-color:#888;">
                                <tr bgcolor="#888">
                                    <td colspan="2" align="center"><strong>DANE DOKUMENTU</strong></td>
                                    <tr>   
                                        <tr bgcolor="#FFFFFF">
                                            <td>
                                                <table width="600" align="center" border="0" cellpadding="0" cellspacing="0">	
                                                    <tr height="50">
                                                        <td align="left" width="200">Numer kolejny zapisu:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$numer_kolejny_zapisu"); ?></strong></td>
                                                    </tr>		
                                                    <tr height="50">
                                                        <td align="left" width="200">Data rejestracji dokumentu:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$data_rejestracji_dokumentu"); ?></strong></td>
                                                    </tr>
                                                    <tr height="50">     
                                                        <td align="left" width="200">Nazwa nadawcy/adresata:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$nazwa_nadawcy_adresata"); ?></strong></td>
                                                    </tr>
                                                    <tr height="50">
                                                        <td align="left" width="200">Numer dokumentu otrzymania:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$numer_dokumentu_otrzymania"); ?></strong></td>
                                                    </tr>
                                                    <tr height="50">
                                                        <td align="left" width="200">Nazwa dokumentu lub czego dotyczy:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$nazwa_dokumentu_lub_czego_dotyczy"); ?></strong></td>
                                                    </tr>
                                                    <tr height="50">
                                                        <td align="left" width="200">Adnotacje o wysłaniu dokumentu, przekazaniu do pieczecie lub nr pozycji teczki tematycznej, w której dokument si﻿ę znajduje:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$adnotacja"); ?></strong></td>
                                                    </tr>
                                                    <tr height="50">
                                                        <td align="left" width="200">Informacje uzupełniające, uwagi:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$uwaga"); ?></strong></td>
                                                    </tr>
                                                    <tr height="50">
                                                        <td align="left" width="200">Załącznik umowy (skan PDF):</td>
                                                        <td align="left" width="400"><strong><?php echo ("$pdf"); ?></strong></td>
                                                    </tr>
                                                    <tr height="50">
                                                        <td align="left" width="200">Wprowadził:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$nazwa"); ?></strong></td>
                                                    </tr>		
                                                    <tr height="50">
                                                        <td align="left" width="200">Wprowadzono do systemu:</td>
                                                        <td align="left" width="400"><strong><?php echo ("$wprowadzil_data"); ?></strong></td>
                                                    </tr>
                                                </table>	
                                            </td>
                                        </tr>       
        <?php
        $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
        $mysqldb = mysql_select_db($dbarch);
        mysql_query("SET NAMES utf8");
        $query = "SELECT * FROM rejestr_wydanych WHERE id_umowy=\"$id\"";
        $result = mysql_query($query);
        $row = mysql_num_rows($result);
        ?>
                                        <tr bgcolor="#888">
                                            <td colspan="2" align="center"><strong>HISTORIA DOKUMENTU</strong></td>
                                            <tr>	
                                                <tr>
                                                    <td>
                                                        <table align="center" width="600" cellspacing="0" cellpadding="0" border="0">
                                                            <tr>
                                                                <td width="250" align="center"><strong>Pobrał</strong></td>
                                                                <td width="150" align="center"><strong>Stanowisko</strong></td>
                                                                <td width="100" align="center"><strong>Wydany dnia</strong></td>
                                                                <td width="100" align="center"><strong>Zwrot dnia</strong></td>			
                                                            </tr>
        <?php
        for ($i = 0; $i < $row; $i++):
            $id_wydania = mysql_result($result, $i, "id");
            $komu_wydany_imie_i_nazwisko = mysql_result($result, $i, "komu_wydany_imie_i_nazwisko");
            $komu_wydany_stanowisko = mysql_result($result, $i, "komu_wydany_stanowisko");
            $komu_wydany_data = mysql_result($result, $i, "komu_wydany_data");
            mysql_query("SET NAMES utf8");
            $query1 = "SELECT * FROM rejestr_zwrotow WHERE id_wydania=\"$id_wydania\"";
            $result1 = mysql_query($query1);
            $row1 = mysql_fetch_array($result1);
            $zwrot_data = $row1['zwrot_data'];
            echo ("
			    <tr height=\"40\">
				    <td width=\"250\" align=\"center\">$komu_wydany_imie_i_nazwisko</td>
				    <td width=\"150\" align=\"center\">$komu_wydany_stanowisko</td>
				    <td width=\"100\" align=\"center\">$komu_wydany_data</td>
				    <td width=\"100\" align=\"center\">$zwrot_data</td>
			    </tr>
			 ");
        endfor;
        mysql_close();
        ?>    
                                                        </table>
                                                    </td>
                                                </tr>              
                                                <tr bgcolor="#ffffff">
                                                    <td colspan="2" align="center">&nbsp;</td>
                                                    <tr>              	
                                                        </table>
                                                        </body>
                                                        </html>
        <?php
    }  
   log_add("DOC " .$query. " ". json_encode( $rowForLog)  );   }
 
else {
    echo ( constant('Bug'));
}
?>