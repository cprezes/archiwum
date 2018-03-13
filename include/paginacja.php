<?php

$query = "SELECT COUNT(*) as rows  FROM rejestr_umow ";
$result = mysql_query($query);

$rows = mysql_fetch_assoc($result);

$ilosc = ( floatval($rows["rows"]));
$stron = (intval($ilosc / 100)) + 1;
echo "(Dokumnetów $ilosc. Stron " . $stron . ")";


if ($strona <> 1) {
    print(" [<a href = '" . $adres_tmp . 102 . "&strona=1 '>Pierwsza</a>]... ");
}




for ($i = -10; $i < 10; $i++) {
    $tmp22 = $strona + $i;
    if (($tmp22 > 0) and ( $tmp22 <= $stron) and ( $i <> 0 )) {
        echo (" <a href='" . $adres_tmp . "102&strona=$tmp22'> [$tmp22] </a>");
    } elseif ($i == 0) {
        echo "<b> $tmp22 </b>";
    }
}





if ($strona <> $stron) {
    print(" ...[<a href = '" . $adres_tmp . 102 . "&strona=" . $stron . "'>Ostatnia</a>]");
}