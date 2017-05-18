<?php
if (session_status()==1){ die();}
?>
<br>
<center>
<form action="index.php" class="principal" method="post">
    <div class="login">
    <table>  <tr>
            <td></td>
        </tr>
        <tr>
            <td><strong>Nazwa użytkownika:</strong></td>
            <td><input type="text" class="inputbox_b" name="user" size="25"></td>
        </tr>
        <tr>
            <td ></td>
        </tr>
        <tr>
            <td><strong>Hasło:</strong></td>
            <td><input type="password"class="inputbox_b" name="pass" size="25"></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td><input type="submit" class="button" value="Zaloguj się"></td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table></div>
</form>   <br>

