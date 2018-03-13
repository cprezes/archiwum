<?php
require ('../stale.php');
Session::set("proba", 1);
require_once ('../footer.php');
if (!(Session::get("admin_logged"))) {
    die;
}
?>
<p><h1 style="text-align:center;">Wybierz bazę do edycji </h1>
<h1 style="text-align:center;"><a href="edytuj.php?1=<?php echo dbumowy; ?>"><?php echo dbumowy; ?></h1>
<h1 style="text-align:center;"><a href="edytuj.php?1=<?php echo dbarch; ?>"><?php echo dbarch; ?></h1>
<h1 style="text-align:center;"><a href="edytuj.php?1=<?php echo dbpieczecie; ?>"><?php echo dbpieczecie; ?></h1>




