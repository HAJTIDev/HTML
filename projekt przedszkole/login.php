<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form method="POST">
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Hasło" required>
            <input type="submit" name="submit" value="Wyślij">
        </form>
        <?php
        if (!empty($_POST['login']) && !empty($_POST['password']))
        {
        var_dump($_POST);
        }
        ?>
    </div>
</body>
</html>