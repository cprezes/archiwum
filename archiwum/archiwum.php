<?php
require ( '../stale.php');
include_once ("../footer.php");
include_once ("../include/data.php");


    $dbhost     = constant('dbhost') ;
    $dbuser     = constant('dbuser');
    $dbpassword = constant('dbpassword');
    $dbumowy    = constant('dbumowy');
    $dbarch     = constant('dbarch') ;
$adres_tmp = basename($_SERVER['PHP_SELF']). "?kat=";
  if ((isset($_GET["strona"]) and (!(empty($_GET["strona"]))))) {$strona = $_GET["strona"] ;} else { $strona=1;} 
  
   If ((isset($_POST["numer_kolejny_zapisu"])) and (!(empty($_POST["numer_kolejny_zapisu"])))) $numer_kolejny_zapisu=$_POST["numer_kolejny_zapisu"]; else  $numer_kolejny_zapisu="";
   If ((isset($_POST["data_rejestracji_zapisu"])) and (!(empty($_POST["data_rejestracji_zapisu"])))) $data_rejestracji_zapisu=$_POST["data_rejestracji_zapisu"]; else $data_rejestracji_zapisu=""; 
   If ((isset($_POST["data_rejestracji_dokumentu"])) and (!(empty($_POST["data_rejestracji_dokumentu"])))) $data_rejestracji_dokumentu=$_POST["data_rejestracji_dokumentu"]; else $data_rejestracji_dokumentu=date("Y-m-d");
   If ((isset($_POST["typ_umowy"])) and (!(empty($_POST["typ_umowy"])))) $typ_umowy=$_POST["typ_umowy"]; else $typ_umowy="";
   If ((isset($_POST["rok_dokumentu"])) and (!(empty($_POST["rok_dokumentu"])))) $rok_dokumentu=$_POST["rok_dokumentu"]; else $rok_dokumentu="";
   If ((isset($_POST["komu_wydany_stanowisko"])) and (!(empty($_POST["komu_wydany_stanowisko"])))) $komu_wydany_stanowisko=$_POST["komu_wydany_stanowisko"]; else $komu_wydany_stanowisko ="" ;
   If ((isset($_POST["nazwa_nadawcy_adresata"])) and (!(empty($_POST["nazwa_nadawcy_adresata"])))) $nazwa_nadawcy_adresata=$_POST["nazwa_nadawcy_adresata"]; else $nazwa_nadawcy_adresata="";
   If ((isset($_POST["nazwa_dokumentu_lub_czego_dotyczy"])) and (!(empty($_POST["nazwa_dokumentu_lub_czego_dotyczy"])))) $nazwa_dokumentu_lub_czego_dotyczy=$_POST["nazwa_dokumentu_lub_czego_dotyczy"]; else $nazwa_dokumentu_lub_czego_dotyczy="";
   If ((isset($_POST["numer_dokumentu_otrzymania"])) and (!(empty($_POST["numer_dokumentu_otrzymania"])))) $numer_dokumentu_otrzymania=$_POST["numer_dokumentu_otrzymania"]; else $numer_dokumentu_otrzymania="";
   If ((isset($_POST["adnotacje"])) and (!(empty($_POST["adnotacje"])))) $adnotacje=$_POST["adnotacje"]; else $adnotacje="";
   If ((isset($_POST["plik"])) and (!(empty($_POST["plik"])))) $plik=$_POST["plik"]; else $plik="";
   If ((isset($_POST["komu_wydany_imie_i_nazwisko"])) and (!(empty($_POST["komu_wydany_imie_i_nazwisko"])))) $komu_wydany_imie_i_nazwisko=$_POST["komu_wydany_imie_i_nazwisko"]; else $komu_wydany_imie_i_nazwisko="";
   If ((isset($_POST["id_umowy"])) and (!(empty($_POST["id_umowy"])))) $id_umowy=$_POST["id_umowy"]; else $id_umowy="";
   If ((isset($_POST["wgrany_plik"])) and (!(empty($_POST["wgrany_plik"])))) $wgrany_plik=$_POST["wgrany_plik"]; else $wgrany_plik="";
   If ((isset($_POST["id_zapisu"])) and (!(empty($_POST["id_zapisu"])))) $id_zapisu=$_POST["id_zapisu"]; else $id_zapisu="";
   If ((isset($_POST["pdf1"])) and (!(empty($_POST["pdf1"])))) $pdf1=$_POST["pdf1"]; else $pdf1="";
   If ((isset($_POST["uwagi"])) and (!(empty($_POST["uwagi"])))) $uwagi=$_POST["uwagi"]; else $uwagi="";
   If ((isset($_POST["usun"])) and (!(empty($_POST["usun"])))) $usun=$_POST["usun"]; else $wgrany_plik= $pdf1;   




if (!empty(Session::get("uzytkownik")) AND Session::get("uzytkownik") > 0 and Session::get("Nazwa_bazy") == "Archiwum") {
        $uzytkownik = Session::get("uzytkownik");
?>
<table width="100%">
        <tr valign="top">
            <td width="140" bgcolor="#f4f4f4">
                <table width="100">
                   <tr>
                       <td align="center"><b>:: MENU ::</b><br /><br /></td>
                   </tr>
<?php if (!empty(Session::get("zapis")) AND Session::get("zapis")==1) {
?>	    
                   <tr>
                       <td align="left"><b>DOKUMENT:</b></td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>10"> dodaj</a></li></td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>20"> edytuj</td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>30"> usuń</td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>40"> wydanie</td>
                   <tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>50"> zwrot</td>
                   </tr>
                   <tr>
                       <td align="center">&nbsp;</td>
                   </tr>
<?php
    };
?>
                   <tr>
                       <td align="left"><b>WYSZUKAJ:</b></td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>102"> wszystkie</li></td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>112"> w/g nr. zapisu</li></td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>100"> dokładnie</li></td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>110"> w/g kategorii</li></td>
                   </tr>
                   <tr>
                       <td align="left"><li><a href="<?php echo $adres_tmp ?>120"> w/g rocznika</li></td>
                   </tr>
                   <tr>
                       <td align="center">&nbsp;</td>
                   </tr>
                </table>
            </td>
	    <td>
<?php
    if (isset($_GET["kat"]) AND ($_GET["kat"]==10))
	{
        
	 $mysql=mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb=mysql_select_db($dbarch);
	 mysql_query("SET NAMES utf8");
	 $query = "SELECT numer_kolejny_zapisu AS cp FROM rejestr_umow ORDER BY id DESC LIMIT 1"; 
	 $result = mysql_query($query);
	 $row = mysql_fetch_array($result);
	 $id_cp = $row['cp'];
	 mysql_close();

?>
    <form method="post" action="archiwum.php" enctype="multipart/form-data">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><b>NOWY DOKUMENT</b></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr height="50">
                     <td align="left" width="300">Numer kolejny zapisu:</td>
                     <td align="left" width="550"><input  name="numer_kolejny_zapisu" type="text" size="60" maxlength="50" class="inputbox"></td>
                <tr height="50">
                     <td align="left" width="300">Ostatni wpis:</td>
                     <td align="left" width="550" style="color:#990000;"><b><?php echo ($id_cp) ?></b></td>
		</tr>
		</tr>
        <tr height="50">
                <td align="left" width="300">Wybierz kategorię:</td>
                <td align="left" width="550">
					<select name="typ_umowy" class="inputbox">
						<option value="">*</option>
						<option value="budowy">Budowy</option>
						<option value="kadry">Kadry</option>
						<option value="ksiegowosc">Księgowość</option>
						<option value="place">Płace</option>
						<option value="zarzad">Zarząd</option>
					</select>
                </td>
		</tr>	
        <tr height="50">
                     <td align="left" width="250">Data rejestracji dokumentu:</td>
                     <td align="left" width="450"><input type="text" value="<?php echo $data_rejestracji_dokumentu; ?>" name="data_rejestracji_dokumentu" size="60" maxlength="10" class="inputbox"></td>
		</tr>
		<tr height="50">     
                     <td align="left" width="250">Nazwa nadawcy:</td>
                     <td align="left" width="450"><textarea cols="70" rows="5" name="nazwa_nadawcy_adresata" class="inputbox"></textarea></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Numer dokumentu otrzymania:</td>
                     <td align="left" width="450"><input type="text" name="numer_dokumentu_otrzymania" size="60" maxlength="500" class="inputbox"></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Nazwa dokumentu lub czego dotyczy:</td>
                     <td align="left" width="450"><textarea name="nazwa_dokumentu_lub_czego_dotyczy" cols="70" rows="5" class="inputbox"></textarea></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Adnotacje o wysłaniu dokumentu, przekazaniu do archiwum lub nr pozycji teczki tematycznej, w której dokument si﻿ę znajduje:</td>
                     <td align="left" width="450"><input type="text" name="adnotacje" size="60" class="inputbox"></td>
                </tr>		
                <tr height="50">
                     <td align="left" width="250">Załącz skan (format PDF):</td>
                     <td align="left" width="450"><input type="file" name="plik" size="60" value="" class="inputbox" /></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><input type="submit" class="button" value="Dodaj"></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
        </table>
        <input type="hidden" value="11" name="kat">
    </form>
<?php
     }	    
    if (isset($_POST["kat"]) AND ($_POST["kat"]==11)) { 

         $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb = mysql_select_db($dbarch);
	 mysql_query("SET NAMES utf8");
	 $query = "SELECT * FROM rejestr_umow WHERE numer_kolejny_zapisu='$numer_kolejny_zapisu'"; 
	 $result = mysql_query($query);
	 $row = mysql_num_rows($result);
	 $numer_kolejny_zapisu = preg_replace('/\s+/','',$numer_kolejny_zapisu);

	 if (($numer_kolejny_zapisu<>'') AND ($row==0)) {
		 if(sizeof($_FILES)!=0 and $_FILES['plik']['type'] == "application/pdf") {
		    $wgrany_plik = md5($_FILES['plik']['name'].time().mt_rand()) . ".pdf";
		    $kat_pliki = KATALOG_ARCH;
		    $kat_pliki = $kat_pliki . basename($wgrany_plik); 
		    $przeniesienie = move_uploaded_file($_FILES['plik']['tmp_name'], $kat_pliki);
        	 }
        	 else {
		    $wgrany_plik = "";
		 }
	    	 mysql_query("SET NAMES utf8");
	         $query = "INSERT INTO rejestr_umow VALUES (null,\"$numer_kolejny_zapisu\",\"$data_rejestracji_dokumentu\",\"$nazwa_nadawcy_adresata\",\"$numer_dokumentu_otrzymania\",\"$nazwa_dokumentu_lub_czego_dotyczy\",\"$uzytkownik\",null,\"$typ_umowy\",\"$wgrany_plik\")";
    		 $result = mysql_query($query);	    
		 mysql_query("SET NAMES utf8");
		 $query = "INSERT INTO adnotacje VALUES (null,\"$numer_kolejny_zapisu\",\"$adnotacje\",\"$uzytkownik\",null)";
	         $result = mysql_query($query);
		 mysql_query("SET NAMES utf8");
		 $query = "INSERT INTO uwagi VALUES (null,\"$numer_kolejny_zapisu\",\"\",\"$uzytkownik\",null)";	
	         $result = mysql_query($query);
		 echo ("<script language=\"JavaScript\">alert('Dokument dodano!');</script>");
	    }
	else	
	    {    
		if (($numer_kolejny_zapisu<>'') AND ($row>0)) {
			echo ("Dokument istnieje!");
		    }
		else {
			echo ("Nie podałeś numeru kolejnego zapisu!");
		    }    	
	    }
         mysql_close();
	}

if (isset($_GET["kat"]) AND ($_GET["kat"]==20)) {	
?>
    <form method="post" action="archiwum.php">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><b>EDYTUJ DOKUMENT</b></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr height="50">
                 <td align="left" width="250">Numer zapisu dokumentu:</td>
                 <td align="left" width="450"><input type="text" name="numer_kolejny_zapisu" size="50" maxlength="50" class="inputbox"></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><input type="submit" class="button" value="Edytuj"></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>  
            </tr>
	</table>
	<input type="hidden" value="21" name="kat">
    </form>	    	
<?php
	}
    if (isset($_POST["kat"]) AND ($_POST["kat"]==21)) {
              $mysql=mysql_connect($dbhost, $dbuser, $dbpassword);
	         $mysqldb=mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
#	 $numer_kolejny_zapisu = preg_replace('/\s+/', '', $numer_kolejny_zapisu1);
	 $query = "SELECT * FROM rejestr_umow WHERE numer_kolejny_zapisu=\"$numer_kolejny_zapisu\"";
         $result = mysql_query($query);
	 $row = mysql_fetch_array($result);
	 $id_zapisu = $row['id'];
	 $data_rejestracji_zapisu = $row['data_rejestracji_zapisu'];
         $nazwa_nadawcy_adresata = $row['nazwa_nadawcy_adresata'];
	 $numer_dokumentu_otrzymania = $row['numer_dokumentu_otrzymania'];
	 $nazwa_dokumentu_lub_czego_dotyczy = $row['nazwa_dokumentu_lub_czego_dotyczy'];
	 $skan = $row['skan'];
	 if ($row['skan'] !='') {
			$obraz = '<img src="' . constant('PDF_JPG').'">';
			//$pole1 = "";
		        $pole1 = "Usuń skan w formacie PDF <input type=\"checkbox\" name=\"usun\" vaule=\"\" /><input type=\"hidden\" value=\"$skan\" name=\"pdf1\" />";
		        //$pole1 = "<select id=\"combo\" onchange=\"ukryj();\">\n<option value=\"BezZMAIN\">Nie zmieniaj</option>\n<option value=\"Zmien\">Zmień</option>\n<option value=\"Usun\">Usuń</option>\n</select><input type=\"file\" name=\"plik\" size=\"60\" value=\"\" class=\"inputbox\" />";
		    }		    		    
		    else {
			$obraz = "";
			$pole1 = "<input type=\"file\" name=\"plik\" size=\"60\" value=\"\" class=\"inputbox\" />";
		    }
	 if ($row['skan']!='') {
	    $plik_skan_jest = "<img>";
	 } else {
	    $plik_skan ="";
	 }
	 mysql_query("SET NAMES utf8");
	 $query = "SELECT * FROM adnotacje WHERE id_umowy=\"$numer_kolejny_zapisu\"";
         $result = mysql_query($query);
	 $row = mysql_fetch_array($result);
	 $adnotacje = $row['adnotacje'];
         mysql_query("SET NAMES utf8");
	 $query = "SELECT * FROM uwagi WHERE id_umowy=\"$numer_kolejny_zapisu\"";
         $result = mysql_query($query);
	 $row = mysql_fetch_array($result);
	 $uwagi = $row['uwagi'];	 	 
?>
  <script>
  function ukryj(){  
      var combo1 = document.getElementById("combo");
      var val = combo1.options[combo1.selectedIndex].text;
        if(val=="Usun"){
	    document.getElementById('pole').style.visibility='hidden'; 
        }
	else{
    	    document.getElementById('pole').style.visibility='visible'; 
	}
 }
  
  </script>

    <form method="post" action="archiwum.php" enctype="multipart/form-data">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><b>EDYTUJ DOKUMENT</b></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Numer kolejny zapisu:</td>
                     <td align="left" width="450"><input name="numer_kolejny_zapisu" type="text" value="<?php echo $numer_kolejny_zapisu; ?>" size="50" maxlength="50" class="inputbox" READONLY></td>
		</tr>		
		<tr height="50">
                     <td align="left" width="250">Wybierz kategorię:</td>
                     <td align="left" width="450">
                        <select name="typ_umowy" class="inputbox">
                            <option value="">*</option>
			    <option value="budowy">Budowy</option>
			    <option value="kadry">Kadry</option>
			    <option value="ksiegowosc">Księgowość</option>
			    <option value="place">Płace</option>
			    <option value="zarzad">Zarząd</option>
                        </select>
                     </td>
		</tr>	
                <tr height="50">
                     <td align="left" width="250">Data rejestracji dokumentu:</td>
                     <td align="left" width="450"><input value="<?php echo $data_rejestracji_zapisu; ?>" type="text" name="data_rejestracji_dokumentu" size="50" maxlength="10" class="inputbox"></td>
		</tr>
		<tr height="50">     
                     <td align="left" width="250">Nazwa nadawcy:</td>
                     <td align="left" width="450"><textarea cols="70" rows="5" name="nazwa_nadawcy_adresata" class="inputbox"><?php echo $nazwa_nadawcy_adresata; ?></textarea></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Numer dokumentu otrzymania:</td>
                     <td align="left" width="450"><input value="<?php echo $numer_dokumentu_otrzymania; ?>" type="text" name="numer_dokumentu_otrzymania" size="50" maxlength="100" class="inputbox"></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Nazwa dokumentu lub czego dotyczy:</td>
                     <td align="left" width="450"><textarea name="nazwa_dokumentu_lub_czego_dotyczy" cols="70" rows="5" class="inputbox"><?php echo $nazwa_dokumentu_lub_czego_dotyczy;  ?></textarea></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Adnotacje o wysłaniu dokumentu, przekazaniu do archiwum lub nr pozycji teczki tematycznej, w której dokument si﻿ę znajduje:</td>
                     <td align="left" width="450"><input value="<?php echo $adnotacje; ?>" type="text" name="adnotacje" size="50" maxlength="200" class="inputbox"></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Informacje uzupełniające, uwagi:</td>
                     <td align="left" width="450"><textarea name="uwagi" cols="70" rows="5" class="inputbox"><?php echo $uwagi; ?></textarea></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Skan (format PDF): <?php echo $obraz; ?></td>
                     <td align="left" width="450"><?php echo $pole1; ?></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><input type="submit" class="button" value="Zapisz zmiany"></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
        </table>
        <input type="hidden" value="22" name="kat"><input type="hidden" value="<?php echo $id_zapisu ?>" name="id_zapisu">
    </form>

<?php
        }
    if (isset($_POST["kat"]) AND ($_POST["kat"]==22)) {
         $mysql=mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb=mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 if(sizeof($_FILES)!=0 and $_FILES['plik']['type'] == "application/pdf") {
		    $wgrany_plik = md5($_FILES['plik']['name'].time().mt_rand()) . ".pdf";
		    $kat_pliki = KATALOG_ARCH;
		    $kat_pliki = $kat_pliki . basename($wgrany_plik); 
		    $przeniesienie = move_uploaded_file($_FILES['plik']['tmp_name'], $kat_pliki);
    	 }
	 $query = "UPDATE rejestr_umow SET data_rejestracji_zapisu='$data_rejestracji_dokumentu', nazwa_nadawcy_adresata='$nazwa_nadawcy_adresata', numer_dokumentu_otrzymania='$numer_dokumentu_otrzymania', nazwa_dokumentu_lub_czego_dotyczy='$nazwa_dokumentu_lub_czego_dotyczy', uzytkownik_id='$uzytkownik', kategoria='$typ_umowy', skan='$wgrany_plik' WHERE id=$id_zapisu";
         $result = mysql_query($query);	    
	 mysql_query("UPDATE adnotacje SET adnotacje='$adnotacje' WHERE id_umowy='$numer_kolejny_zapisu';");
	 mysql_query("UPDATE uwagi SET UWAGI='$uwagi' WHERE id_umowy='$numer_kolejny_zapisu';");
         echo ("<script language=\"JavaScript\">alert('Dokument uaktualniono!');</script>");
         mysql_close();
	}
    if (isset($_GET["kat"]) AND ($_GET["kat"]==30)) {	
?>
    <form method="post" action="archiwum.php">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><b>USUŃ DOKUMENT</b></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr height="50">
                 <td align="left" width="250">Numer zapisu dokumentu:</td>
                 <td align="left" width="450"><input type="text" name="numer_kolejny_zapisu" size="50" maxlength="50" class="inputbox"></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><input type="submit" class="button" value="Usuń"></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
	</table>
	<input type="hidden" value="31" name="kat">
    </form>	    	
<?php
	}
    if (isset($_POST["kat"]) AND ($_POST["kat"]==31)) {
        
         $mysql=mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb=mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "DELETE FROM rejestr_umow WHERE numer_kolejny_zapisu='$numer_kolejny_zapisu'";
         $result = mysql_query($query);	    
	 mysql_query("SET NAMES utf8");
	 $query = "DELETE FROM adnotacje WHERE id_umowy='$numer_kolejny_zapisu'";
         $result = mysql_query($query);
	 mysql_query("SET NAMES utf8");
	 $query = "DELETE FROM uwagi WHERE id_umowy='$numer_kolejny_zapisu'";	
         $result = mysql_query($query);	 	    	 
         echo ("<script language=\"JavaScript\">alert('Dokument usuni﻿ęto!');</script>");
         mysql_close();
	}

if (isset($_GET["kat"]) AND ($_GET["kat"]==40)) {	
?>
    <form method="post" action="archiwum.php">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><b>WYDAJ DOKUMENT</b></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr height="50">
                 <td align="left" width="250">Numer zapisu dokumentu:</td>
                 <td align="left" width="450"><input type="text" name="id_umowy" size="50" maxlength="50" class="inputbox"></td>
            </tr>
            <tr height="50">
                 <td align="left" width="250">Imi﻿ę i nazwisko pobierającego:</td>
                 <td align="left" width="450"><input type="text" name="komu_wydany_imie_i_nazwisko" size="50" maxlength="200" class="inputbox"></td>
            </tr>
            <tr height="50">
                 <td align="left" width="250">Stanowisko pobierającego:</td>
                 <td align="left" width="450"><input type="text" name="komu_wydany_stanowisko" size="50" maxlength="200" class="inputbox"></td>
            </tr>
            <tr>
        	 <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><input type="submit" class="button" value="Wydaj"></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
	</table>
	<input type="hidden" value="41" name="kat">
    </form>	    	
<?php
	}
    if (isset($_POST["kat"]) AND ($_POST["kat"]==41)) {
         
         $mysql=mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb=mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "INSERT INTO rejestr_wydanych VALUES (null,'$id_umowy','$komu_wydany_stanowisko',null,'$komu_wydany_imie_i_nazwisko','nie','$uzytkownik')";
         $result = mysql_query($query);	    
         echo ("<script language=\"JavaScript\">alert('Dokument wydano!');</script>");
         mysql_close();
	}					

    if (isset($_GET["kat"]) AND ($_GET["kat"]==50)) {
         $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb = mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "SELECT * FROM rejestr_wydanych WHERE zwrocony='nie'";
	 $result = mysql_query($query);	    
         $row = mysql_num_rows($result);
?>
    <form method="post" action="archiwum.php">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><b>ZWRÓĆ DOKUMENT</b></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
	    <tr>
		<td>
		    <table width="100%" align="center" bordercolor="#000000" cellpadding="0" cellspacing="0" border="0">
			<tr height="50" valign="middle" bgcolor="#f4f4f4">
			    <td width="50" align="center">&nbsp;</td>
			    <td width="70" align="center"><b>Nr zapisu</b></td>
			    <td width="200" align="center"><b>Pobrał</b></td>
			    <td width="130" align="center"><b>Stanowisko</b></td>
			    <td width="70" align="center"><b>Data</b></td>
			    <td width="180" align="center"><b>Wydał</b></td>
			</tr>
<?php
		for ($i=0;$i<$row;$i++):
		    $id = mysql_result($result,$i,"id");
    	            $id_umowy = mysql_result($result,$i,"id_umowy");
	            $komu_wydany_stanowisko = mysql_result($result,$i,"komu_wydany_stanowisko");
	            $komu_wydany_data = mysql_result($result,$i,"komu_wydany_data");
	            $komu_wydany_imie_i_nazwisko = mysql_result($result,$i,"komu_wydany_imie_i_nazwisko");		    
		    $uzytkownik_id = mysql_result($result,$i,"uzytkownik_id");
                    mysql_query("SET NAMES utf8");
		    $query1 = "SELECT * FROM uzytkownicy WHERE id=\"$uzytkownik_id\"";
		    $result1 = mysql_query($query1);
		    $row1 = mysql_fetch_array($result1);	    
		    $nazwisko = $row1['nazwa'];
		    echo ("
			    <tr height=\"40\">
				<td width=\"50\" align=\"center\"><input type=\"radio\" name=\"numer_kolejny_zapisu\" value=\"$id\"></td>
				<td width=\"70\" align=\"center\">$id_umowy</td>
				<td width=\"200\" align=\"\center\">$komu_wydany_imie_i_nazwisko</td>
				<td width=\"130\" align=\"center\">$komu_wydany_stanowisko</td>
				<td width=\"70\" align=\"center\">$komu_wydany_data</td>
				<td width=\"180\" align=\"center\">$nazwisko</td>
			    </tr>
			 ");
                endfor;
		mysql_close();
?>
		    </table>
		</td>
	    </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                 <td colspan="2" align="center"><input type="submit" class="button" value="Przyjmij"></td>
            </tr>
            <tr>
                 <td colspan="2">&nbsp;</td>
            </tr>
	</table>
	<input type="hidden" value="51" name="kat">
    </form>		
<?php
	}
    if (isset($_POST["kat"]) AND ($_POST["kat"]==51)) {
       
	print "rejestr_zwrotow VALUES (null,\"$numer_kolejny_zapisu\",null,\"$uzytkownik\")";
	print "rejestr_wydanych SET zwrocony='tak' WHERE id=\"$numer_kolejny_zapisu\"";
         $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb = mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "INSERT INTO rejestr_zwrotow VALUES (null,\"$numer_kolejny_zapisu\",null,\"$uzytkownik\")";
	 $result = mysql_query($query);	    
         mysql_query("SET NAMES utf8");
	 $query = "UPDATE rejestr_wydanych SET zwrocony='tak' WHERE id=\"$numer_kolejny_zapisu\"";
	 $result = mysql_query($query);
	}
    if (isset($_GET["kat"]) AND ($_GET["kat"]==100)) {
?>
    <form method="post" action="archiwum.php">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><b>WYSZUKAJ DOKUMENT (DOKŁADNIE)</b></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Numer kolejny zapisu:</td>
                     <td align="left" width="450"><input name="numer_kolejny_zapisu" type="text" size="60" maxlength="50" class="inputbox"></td>
		</tr>		
		<tr height="50">     
                     <td align="left" width="250">Nazwa nadawcy:</td>
                     <td align="left" width="450"><textarea name="nazwa_nadawcy_adresata" cols="70" rows="5" class="inputbox"></textarea></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Numer dokumentu otrzymania:</td>
                     <td align="left" width="450"><input type="text" name="numer_dokumentu_otrzymania" size="60" maxlength="100" class="inputbox"></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Nazwa dokumentu lub czego dotyczy:</td>
                     <td align="left" width="450"><textarea name="nazwa_dokumentu_lub_czego_dotyczy" cols="70" rows="5" class="inputbox"></textarea></td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Adnotacje o wysłaniu dokumentu, przekazaniu do archiwum lub nr pozycji teczki tematycznej, w której dokument si﻿ę znajduje:</td>
                     <td align="left" width="450"><input type="text" name="adnotacje" size="60" maxlength="200" class="inputbox"></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><input type="submit" class="button" value="Wyszukaj dokument"></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
        </table>
        <input type="hidden" value="101" name="kat">
    </form>
<?php
    }
    if (isset($_POST["kat"]) AND ($_POST["kat"]==101)) {
      
	if ($numer_kolejny_zapisu=="")
	    {
		$numer_kolejny_zapisu="%";
	    }   
	 $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb = mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "SELECT rejestr_umow.*,adnotacje.adnotacje FROM rejestr_umow,adnotacje WHERE
		   numer_kolejny_zapisu like '$numer_kolejny_zapisu' &&
		   instr(nazwa_nadawcy_adresata,'$nazwa_nadawcy_adresata') &&
		   instr(numer_dokumentu_otrzymania,'$numer_dokumentu_otrzymania') &&
		   instr(nazwa_dokumentu_lub_czego_dotyczy,'$nazwa_dokumentu_lub_czego_dotyczy') &&
		   numer_kolejny_zapisu = id_umowy &&
		   instr(adnotacje,'$adnotacje')
		   ORDER BY numer_kolejny_zapisu+0,data_rejestracji_zapisu ASC
		  "; 
	 $result = mysql_query($query);
	 $row = mysql_num_rows($result);
?>
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr height="50" bgcolor="#f4f4f4">
		    <td width="70" align="center"><b>Numer kolejny zapisu</b></td>
		    <td width="220" align="center"><b>Nazwa adresata/nadawcy</b></td>
		    <td width="160" align="center"><b>Data rejestracji dokumentu</b></td>
		    <td width="220" align="center"><b>Nazwa dokumentu lub czego dotyczy</b></td>
		    <td width="30" align="center"><b>Skan</b></td>
		</tr>
<?php
		for ($i=0;$i<$row;$i++):
		    $id = mysql_result($result,$i,"numer_kolejny_zapisu");
		    $nazwa_adresata_nadawcy = mysql_result($result,$i,"nazwa_nadawcy_adresata");
		    $data_rejestracji_zapisu = mysql_result($result,$i,"data_rejestracji_zapisu");		    
		    $nazwa_dokumentu_lub_czego_dotyczy = mysql_result($result,$i,"nazwa_dokumentu_lub_czego_dotyczy");		    		    
		    $skan = mysql_result($result,$i,"skan");
		    if ( $skan !="") {
			$obraz = '<img src="' . constant('PDF_JPG').'">';
		    }		    		    
		    else {
			$obraz = "";
		    }
		    echo ("
			    <tr height=\"40\" onclick=\"Startgrafika('../archiwum/dokument.php?id=$id')\" style=\"cursor: hand\">
				    <td width=\"70\" align=\"center\">$id</td>
				    <td width=\"220\" align=\"center\">$nazwa_adresata_nadawcy</td>
				    <td width=\"160\" align=\"center\">$data_rejestracji_zapisu</td>
				    <td width=\"220\" align=\"center\">$nazwa_dokumentu_lub_czego_dotyczy</td>
				    <td width=\"30\" align=\"center\">$obraz</td>
			    </tr>
			 ");
                endfor;
		mysql_close();
print "</table>";
}
?>

<?php
    if (isset($_GET["kat"]) AND ($_GET["kat"]==102)) {
         
	 $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb = mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "SELECT numer_kolejny_zapisu,nazwa_nadawcy_adresata,data_rejestracji_zapisu,nazwa_dokumentu_lub_czego_dotyczy,kategoria,skan FROM rejestr_umow ORDER BY id desc LIMIT ". ($strona-1) * 100 .",100"; 
	 $result = mysql_query($query);
	 $row = mysql_num_rows($result);
?>
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr height="50" bgcolor="#f4f4f4">
		    <td width="70" align="left"><b>Numer</b></td>
		    <td width="220" align="center"><b>Nazwa adresata</b></td>
		    <td width="160" align="center"><b>Data rejestracji</b></td>
		    <td width="280" align="center"><b>Nazwa dokumentu</b></td>
		    <td width="30" align="center"><b>Skan</b></td>
		</tr>
<?php
		for ($i=0;$i<$row;$i++):
		    $id = mysql_result($result,$i,"numer_kolejny_zapisu");
		    $nazwa_adresata_nadawcy = mysql_result($result,$i,"nazwa_nadawcy_adresata");
		    $data_rejestracji_zapisu = mysql_result($result,$i,"data_rejestracji_zapisu");		    
		    $nazwa_dokumentu_lub_czego_dotyczy = mysql_result($result,$i,"nazwa_dokumentu_lub_czego_dotyczy");		    		    
		    $skan = mysql_result($result,$i,"skan");
		    if ( $skan !="") {
			$obraz = '<img src="' . constant('PDF_JPG').'">';
		    }		    		    
		    else {
			$obraz = "";
		    }
		    echo ("
			    <tr height=\"40\" onclick=\"Startgrafika('../archiwum/dokument.php?id=$id')\" style=\"cursor: hand\">
				    <td width=\"70\" align=\"center\">$id</td>
				    <td width=\"220\" align=\"center\">$nazwa_adresata_nadawcy</td>
				    <td width=\"160\" align=\"center\">$data_rejestracji_zapisu</td>
				    <td width=\"220\" align=\"left\">$nazwa_dokumentu_lub_czego_dotyczy</td>
				    <td width=\"30\" align=\"center\">$obraz</td>
			    </tr>
			 ");
                endfor;
		
?>
                <div class="wyniki"><?php include '../include/paginacja.php'; 
                
                ?></div>   </table>
<?php include '../include/paginacja.php'; mysql_close();
	}
    if (isset($_GET["kat"]) AND ($_GET["kat"]==110)) {
?>
    <form method="post" action="archiwum.php">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><b>WYSZUKAJ DOKUMENT W/G TYPU UMOWY</b></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr height="50">
                     <td align="left" width="250">Wybierz typ umowy:</td>
                     <td align="left" width="450">
                        <select name="typ_umowy" class="inputbox">
			    <option value="budowy">Budowy</option>
			    <option value="kadry">Kadry</option>
			    <option value="ksiegowosc">Księgowość</option>
			    <option value="place">Płace</option>
			    <option value="zarzad">Zarząd</option>
                        </select>
                     </td>
		</tr>	
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><input type="submit" class="button" value="Wyszukaj dokument"></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
        </table>
        <input type="hidden" value="111" name="kat">
    </form>
<?php
    } 
    if (isset($_POST["kat"]) AND ($_POST["kat"]==111)) {
        
	 $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb = mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "SELECT * FROM rejestr_umow WHERE kategoria='$typ_umowy' ORDER BY numer_kolejny_zapisu+0 ASC"; 
	 $result = mysql_query($query);
	 $row = mysql_num_rows($result);
?>
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr height="50" bgcolor="#f4f4f4">
		    <td width="70" align="center"><b>Numer</b></td>
		    <td width="220" align="center"><b>Nazwa adresata</b></td>
		    <td width="160" align="center"><b>Data rejestracji</b></td>
		    <td width="220" align="center"><b>Nazwa dokumentu</b></td>
		    <td width="30" align="center"><b>Skan</b></td>
		</tr>
<?php
		for ($i=0;$i<$row;$i++):
		    $id = mysql_result($result,$i,"numer_kolejny_zapisu");
		    $nazwa_adresata_nadawcy = mysql_result($result,$i,"nazwa_nadawcy_adresata");
		    $data_rejestracji_zapisu = mysql_result($result,$i,"data_rejestracji_zapisu");		    
		    $nazwa_dokumentu_lub_czego_dotyczy = mysql_result($result,$i,"nazwa_dokumentu_lub_czego_dotyczy");		    		    
		    $skan = mysql_result($result,$i,"skan");
		    if ( $skan !="") {
			$obraz = '<img src="' . constant('PDF_JPG').'">';
		    }		    		    
		    else {
			$obraz = "";
		    }
		    echo ("
			    <tr height=\"40\" onclick=\"Startgrafika('../archiwum/dokument.php?id=$id')\" style=\"cursor: hand\">
				    <td width=\"70\" align=\"center\">$id</td>
				    <td width=\"220\" align=\"center\">$nazwa_adresata_nadawcy</td>
				    <td width=\"160\" align=\"center\">$data_rejestracji_zapisu</td>
				    <td width=\"220\" align=\"center\">$nazwa_dokumentu_lub_czego_dotyczy</td>
				    <td width=\"30\" align=\"center\">$obraz</td>
			    </tr>
			 ");
                endfor;
		mysql_close();
?>
	    </table>
<?php
	}
    if (isset($_GET["kat"]) AND ($_GET["kat"]==112)) {
?>
    <form method="post" action="archiwum.php">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><b>WYSZUKAJ W/G NUMERU ZAPISU</b></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr height="50">
                     <td align="left" width="200">Podaj numer zapisu:</td>
                     <td align="left" width="400"><input name="numer_kolejny_zapisu" type="text" size="50" maxlength="50" class="inputbox"></td>
		</tr>		
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><input type="submit" class="button" value="Wyszukaj dokument"></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
        </table>
        <input type="hidden" value="113" name="kat">
    </form>
<?php
    } 
    if (isset($_POST["kat"]) AND ($_POST["kat"]==113)) {
     
	 $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb = mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "SELECT * FROM rejestr_umow WHERE numer_kolejny_zapisu ='$numer_kolejny_zapisu'"; 
	 $result = mysql_query($query);
	 $row = mysql_num_rows($result);
?>
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr height="50" bgcolor="#f4f4f4">
		    <td width="70" align="center"><b>Numer kolejny zapisu</b></td>
		    <td width="220" align="center"><b>Nazwa adresata</b></td>
		    <td width="160" align="center"><b>Data rejestracji dokumentu</b></td>
		    <td width="220" align="center"><b>Nazwa dokumentu lub czego dotyczy</b></td>
		    <td width="30" align="center"><b>Skan</b></td>
    		</tr>
<?php
		for ($i=0;$i<$row;$i++):
		    $id = mysql_result($result,$i,"numer_kolejny_zapisu");
		    $nazwa_adresata_nadawcy = mysql_result($result,$i,"nazwa_nadawcy_adresata");
		    $data_rejestracji_zapisu = mysql_result($result,$i,"data_rejestracji_zapisu");		    
		    $nazwa_dokumentu_lub_czego_dotyczy = mysql_result($result,$i,"nazwa_dokumentu_lub_czego_dotyczy");		    		    
		    $skan = mysql_result($result,$i,"skan");
		    if ( $skan !="") {
			$obraz = '<img src="' . constant('PDF_JPG').'">';
		    }		    		    
		    else {
			$obraz = "";
		    }
		    echo ("
			    <tr height=\"40\" onclick=\"Startgrafika('../archiwum/dokument.php?id=$id')\" style=\"cursor: hand\">
				    <td width=\"70\" align=\"center\">$id</td>
				    <td width=\"220\" align=\"center\">$nazwa_adresata_nadawcy</td>
				    <td width=\"160\" align=\"center\">$data_rejestracji_zapisu</td>
				    <td width=\"220\" align=\"center\">$nazwa_dokumentu_lub_czego_dotyczy</td>
				    <td width=\"30\" align=\"center\">$obraz</td>
			    </tr>
			 ");
                endfor;
		mysql_close();
?>
	    </table>
<?php
	}	
    if (isset($_GET["kat"]) AND ($_GET["kat"]==120)) {
?>
    <form method="post" action="archiwum.php">
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                     <td colspan="2" align="center"><b>WYSZUKAJ DOKUMENT W/G ROCZNIKA</b></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr height="50">
                     <td align="left" width="200">Podaj rok w formacie (RRRR):</td>
                     <td align="left" width="400"><input name="rok_dokumentu" type="text" size="30" maxlength="4" class="inputbox"></td>
		</tr>		
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" class="button" value="Wyszukaj dokument"></td>
                </tr>
                <tr>
                     <td colspan="2">&nbsp;</td>
                </tr>
        </table>
        <input type="hidden" value="121" name="kat">
    </form>
<?php
    } 
    if (isset($_POST["kat"]) AND ($_POST["kat"]==121)) {
         
	 $mysql = mysql_connect($dbhost, $dbuser, $dbpassword);
         $mysqldb = mysql_select_db($dbarch);
         mysql_query("SET NAMES utf8");
	 $query = "SELECT * FROM rejestr_umow WHERE numer_kolejny_zapisu like '%$rok_dokumentu%' ORDER BY numer_kolejny_zapisu+0 ASC "; 
	 $result = mysql_query($query);
	 $row = mysql_num_rows($result);
?>
        <table width="100%" cellspacing="0" cellpadding="0" align="center" border="0">
                <tr height="50" bgcolor="#f4f4f4">
		    <td width="70" align="center"><b>Numer kolejny zapisu</b></td>
		    <td width="220" align="center"><b>Nazwa adresata/nadawcy</b></td>
		    <td width="160" align="center"><b>Data rejestracji dokumentu</b></td>
		    <td width="220" align="center"><b>Nazwa dokumentu lub czego dotyczy</b></td>
		    <td width="30" align="center"><b>Skan</b></td>
		</tr>
<?php
		for ($i=0;$i<$row;$i++):
		    $id = mysql_result($result,$i,"numer_kolejny_zapisu");
		    $nazwa_adresata_nadawcy = mysql_result($result,$i,"nazwa_nadawcy_adresata");
		    $data_rejestracji_zapisu = mysql_result($result,$i,"data_rejestracji_zapisu");		    
		    $nazwa_dokumentu_lub_czego_dotyczy = mysql_result($result,$i,"nazwa_dokumentu_lub_czego_dotyczy");		    		    
		    $skan = mysql_result($result,$i,"skan");
		    if ( $skan !="") {
			$obraz = '<img src="' . constant('PDF_JPG').'">';
		    }		    		    
		    else {
			$obraz = "";
		    }
		    echo ("
			    <tr height=\"40\" onclick=\"Startgrafika('../archiwum/dokument.php?id=$id')\" style=\"cursor: hand\">
				    <td width=\"70\" align=\"center\">$id</td>
				    <td width=\"220\" align=\"center\">$nazwa_adresata_nadawcy</td>
				    <td width=\"160\" align=\"center\">$data_rejestracji_zapisu</td>
				    <td width=\"220\" align=\"center\">$nazwa_dokumentu_lub_czego_dotyczy</td>
				    <td width=\"30\" align=\"center\">$obraz</td>
			    </tr>
		    	 ");
                endfor;
		mysql_close();

?>
</table>
<?php
	}
?>

	    </td>
	</tr>
</table>
<?php
     }
  else
     {
         echo ( constant('Bug'));
     }
    require("../header.php");
?>