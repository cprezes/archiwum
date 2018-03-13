<?php
require_once 'stale.php';
Session::init();

header("Content-type: text/html; charset=utf-8");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Archiwum CPrezes - Start</title>
        <script language="javascript" type="text/javascript">
            <!--
                function Start(page)
            {
                var szerokosc = 450
                var wysokosc = 160
                var xx
                var yy
                xx = (screen.width - 400) / 2
                yy = (screen.height - 300) / 2
                var option = "width=" + szerokosc + ",height=" + wysokosc + ",left=" + xx + ",top=" + yy + ",scrollbars=no";
                window.open(page, "_blank", option);
            }
            function Startlista(page)
            {
                var szerokosc = 520
                var wysokosc = 400
                var xx
                var yy
                xx = (screen.width - 520) / 2
                yy = (screen.height - 400) / 2
                var option = "width=" + szerokosc + ",height=" + wysokosc + ",left=" + xx + ",top=" + yy + ",scrollbars=yes";
                window.open(page, "_blank", option);
            }
            function Startgrafika(page)
            {
                var szerokosc = 720
                var wysokosc = 570
                var xx
                var yy
                xx = (screen.width - 720) / 2
                yy = (screen.height - 550) / 2
                var option = "width=" + szerokosc + ",height=" + wysokosc + ",left=" + xx + ",top=" + yy + ",scrollbars=yes";
                window.open(page, "_blank", option);
            }
            function drukuj()
            {
                window.print()
            }
            //-->
        </script>
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css">
    </head>

    <BODY vLink=#666666 aLink=#666666 link=#666666 leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">

        <TABLE class="center" cellSpacing=0 cellPadding=0 width=960  border=0 style="box-shadow: 0px 0px 30px #888888;"  >

            <TBODY>
                <TR>
                    <TD></TD>
                    <TD><div class="logo" ><img  src="<?php echo URL; ?>images/logo.png" /></div>
                        <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                            <TBODY>
                                <TR>
                                    <TD>
                                        <TABLE height=105 cellSpacing=0 cellPadding=0 width="100%" border=0><TBODY>
                                                <TR>
                                                    <TD colspan="2" width="248">

                                                    </TD>
                                                    <TD vAlign=bottom width=82 background="<?php echo URL; ?>images/bg1.gif">
                                                        <DIV align=center>
                                                            <a class="l1" href="<?php echo URL; ?>">
                                                                <font color="#0E2873" face="Tahoma" size="2">
                                                                <span style="text-decoration: none ;  " ><b>Start</b></span></font></a>
                                                            <BR>
                                                            <IMG height=10 src="<?php echo URL; ?>images/space.gif" width=10><BR></DIV></TD>
                                                    <TD vAlign=bottom width=82 background="<?php echo URL; ?>images/bg1.gif"><DIV align=center>
                                                            <A class=l1 href=" <?php
                                                            if ((!empty(Session::get("Nazwa_bazy"))) And ( Session::get("Nazwa_bazy") == "Umowy")) {
                                                                echo constant("URL") . Session::get("Gdzie_jestem");
                                                            } else {
                                                                echo URL . "umowy/";
                                                            }
                                                            ?>">

                                                                <font color="#0E2873" size="2" face="Arial">
                                                                <span style="text-decoration: none"><b>Umowy</b></span></font></A><BR><IMG height=10 src="
                                                                                                                                       <?php echo URL; ?>images/space.gif" width=10></DIV></TD>
                                                    <TD vAlign=bottom width=82 background="<?php echo URL; ?>images/bg1.gif"><DIV align=left>
                                                            <A class=l1 href="<?php
                                                            if ((!empty(Session::get("Nazwa_bazy"))) And ( Session::get("Nazwa_bazy") == "Archiwum")) {
                                                                echo constant("URL") . Session::get("Gdzie_jestem");
                                                            } else {
                                                                echo URL . "archiwum/";
                                                            }
                                                            ?>">
                                                                <font color="#0E2873" size="2" face="Arial">
                                                                <span style="text-decoration: none"><b>Archiwum</b><br></span></font></A>
                                                            <IMG src="<?php echo URL; ?>images/space.gif" width=10><BR></DIV></TD>


                                                    <TD vAlign=bottom width=82 background="<?php echo URL; ?>images/bg1.gif"><DIV align=left>
                                                            <A class=l1 href="<?php
                                                            if ((!empty(Session::get("Nazwa_bazy"))) And ( Session::get("Nazwa_bazy") == "Pieczecie")) {
                                                                echo constant("URL") . Session::get("Gdzie_jestem");
                                                            } else {
                                                                echo URL . "pieczecie/";
                                                            }
                                                            ?>">
                                                                <font color="#0E2873" size="2" face="Arial">
                                                                <span style="text-decoration: none"><b>Pieczęcie</b><br></span></font></A>
                                                            <IMG src="<?php echo URL; ?>images/space.gif" width=10><BR></DIV></TD>

                                                </TR></TBODY></TABLE></TD></TR>
                                <TR>
                                    <TD bgColor=#0E2873><IMG height=10 src="<?php echo URL; ?>images/space.gif"
                                                             width=10></TD></TR>
                                <TR>
                                    <TD>
                                        <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                                            <TBODY><center>


                                                <img border="0" src="<?php echo URL; ?>images/loop.gif" width="960" height="140" style="box-shadow: 0px 0px 15px #888888;">
                                            </center> </TBODY></TABLE></TD></TR>
                <TR>
                    <TD bgColor=#959595><?php
                        if (!empty(Session::get("zalogowano"))) {
                            echo '<div class="zalogowany">' . Session::get("zalogowano") . '<a href= ' . constant("URL") . 'wyloguj.php> Wyloguj się.</a> </div>';
                        
                            
                        }
                        ?>
                        <IMG height=10
                             src="<?php echo URL; ?>images/space.gif"
                             width=10></TD></TR>
                <TR>
                    <TD bgColor=#0E2873 height="10"><IMG height=3
                                                         src="<?php echo URL; ?>images/space.gif"
                                                         width=10></TD></TR>
                <TR>
                    <TD>
                        <TABLE cellSpacing=0 cellPadding=8 width="100%" border=0>
                            <TBODY>
                                <TR>
                                    <TD vAlign=top width="23%" bgColor=#f4f4f4 style="box-shadow: 0px 0px 15px #888888;">
                                    </TD></TR></TBODY></TABLE></TD></TR>
                <tr valign="top">
                    <td>
