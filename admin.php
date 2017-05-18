<?php
require ('stale.php');
require_once ('footer.php');

if (Session::get("admin_logged")) {

    echo '<h1 style="text-align:center"><a href=" ' . URL . 'admin/">Zalogowano</br> Kliknij i przejdź  do konsoli</a>';
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='content-type' content='text/html;charset=utf-8' />
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="container">
            <h3 class="text-center"><center>Login</h3>
            <?php
            if (Session::get("proba") > 3) {
                echo "<div>Wszystkie próby wykorzystane spróbuj ponownie kiedy indziej.</div>";
                die;
            }

            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                if ($username === admin_user && $password === admin_pass) {
                    Session::set("admin_logged", true);

                    echo '<h1 style="text-align:center"><a href=" ' . URL . 'admin/">Zalogowano</br> Kliknij i przejdź do konsoli</a>';
                    die();
                } {
                    if (empty(Session::get("proba"))) {
                        Session::set("proba", 1);
                    } else {
                        $tmp = intval(Session::get("proba"));
                        Session::set("proba", $tmp + 1);
                    }
                    // echo intval(Session::get("proba"));

                    echo Bug;
                }
            }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Login:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Hasło:</label>
                    <input type="password" class="form-control" id="pwd" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Login</button>
            </form>
        </div>
    </body>
</html>