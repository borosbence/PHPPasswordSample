<?php
    if (isset($_POST['password_encrypt'])) {
        $password = $_POST['password1'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
    }

    if (isset($_POST['password_decrypt'])) {
        $password = $_POST['password2'];
        $hash = $_POST['hash'];
        if (password_verify($password, $hash)) {
            $pass = "Password match!";
        } else {
            $pass = "Password invalid!";
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
        input{
            display: block;
        }
        input[type="text"], input[type="password"]
        {
            width: 500px;
        }
    </style>
    <body>
        <form action="" method="post">
            <fieldset>
                <legend>Password to encrypt</legend>
                <input type="password" name="password1">
                <input type="submit" name="password_encrypt">
            </fieldset>
        </form>
        <form action="" method="post">
            <fieldset>
                <legend>Password to decrypt</legend>
                <?php
                    if (!empty($hash)) {
                        echo '<input type="text" name="hash" value=' . $hash . '>';
                    }
                ?>
                <input type="password" name="password2">
                <input type="submit" name="password_decrypt">
            </fieldset>
        </form>
        <?php
            if (!empty($hash)) {
                echo $pass;
            }
        ?>
    </body>


