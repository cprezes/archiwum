<?php
require_once ('../stale.php');
require_once ('baza.php');
require_once ('../footer.php');


$root_serwera = ( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http' ) . '://' . $_SERVER['HTTP_HOST'] . "/" . explode("/", $_SERVER['PHP_SELF'])[1] . "/";

if (!(Session::get("admin_logged"))) {
    die;
}
If ((isset($_REQUEST['1'])) and ( !(empty($_REQUEST['1'])))) {
    Session::set("EditDB", $_REQUEST['1']);
}
if (empty(Session::get("EditDB"))) {
    die;
}
?>
<html>
    <head>
        <title>Licencje</title>
        <style>

            .current-row{background-color:#B24926;color:#FFF;}
            .current-col{background-color:#1b1b1b;color:#FFF;}
            .tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
            .tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
            .tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
        </style>
        <script data-cfasync="false" type="text/javascript" data-pagespeed-no-defer src="nanoajax.min.js" async></script>

        <script language="javascript" >

            function saveToDatabase(element, id) {
                nanoajax.ajax({
                    url: "<?php echo $root_serwera; ?>admin/saveedit.php",
                    method: 'POST',
                    body: 'fildID=' + id + '&editval=' + element.innerHTML
                },
                        function (header, resp) {
                            element.innerHTML = resp.trim();
                        });
            }
            ;
        </script> 
    </script>




    <?php
    require 'tabGen.php';
    $prg = new tabGen();

    $link = mysql_connect(dbhost, dbuser, dbpassword);
    mysql_set_charset('utf8', $link);
    mysql_select_db(Session::get("EditDB"));
    $res = mysql_query("SELECT * from uzytkownicy");
    $prg->mysql_resource = $res;
    echo "<h1> Baza => " . Session::get("EditDB") . "</h1>";
    echo "<p><b>Arkusz użytkowników jest edytowalny nie trzeba zatwierdzać zmian.</b> Użytkowników nie można usuwać więc poprostu zmień nazwę lub hasło</p>";

    $prg->generateTable();

    echo ' <a href="saveedit.php?nowy"> <INPUT TYPE="button" VALUE="Dodaj nowego użytkownika" style="float: right;"></a>';
    