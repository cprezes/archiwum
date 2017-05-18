<?php
require ( '../stale.php');
//include_once ("../footer.php");
include_once ("../include/data.php");
//header("Content-type: text/html; charset=utf-8");


if (isset($_SESSION['uzytkownik']) > 0) {
     if (!(Session::get('plik')==$_GET['plik'])) die();
     $nazwaPliku = (Session::get('plikNazwa'));
     if (!($nazwaPliku==$_GET['nazwa'])) die();
    $path = KATALOG_UMOWY;
    $fullPath = $path.$_GET['plik'];
    


  if (file_exists($fullPath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($nazwaPliku.".pdf").'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fullPath));
    readfile($fullPath);
    exit;
}
//    if (file_exists ($fullPath) and $fd = fopen ($fullPath, "r")) {
//	$fsize = filesize($fullPath);
//	$path_parts = pathinfo($fullPath);
//	$ext = strtolower($path_parts["extension"]);
//	switch ($ext) {
//	    case "pdf":
//	    header("Content-type: application/pdf");
//	    header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
//	    break;
//	    default;
//	    header("Content-type: application/pdf");
//	    header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
//	}
//	header("Content-length: $fsize");
//	header("Cache-control: private");
//	while(!feof($fd)) {
//	    $buffer = fread($fd, 2048);
//	echo $buffer;
//	}
//	fclose ($fd);
//	exit;
//    }
//    else {
//        print "Brak pliku!";
//        exit;
//    }
}

  else
     {
         echo ( constant('Bug'));
     }
