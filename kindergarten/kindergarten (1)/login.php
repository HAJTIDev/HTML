<?php
session_start();
?>
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
            Email: <input type="text" name="email">
            Password: <input type="text" name="password">
            <input type="submit" value="Submit" name="submit">
        </form>
        <?php
            $conn = mysqli_connect('localhost','root','','kindergarten');
            if(isset($_POST['password']) && isset($_POST['email'])){
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $query = mysqli_query($conn,"SELECT password FROM user WHERE email='$email'");
                $row = mysqli_fetch_array($query);
                $password = $row['password'];
                echo $password;
                if ($pass == $password){
                    echo $password;
                    $query = mysqli_query($conn,"SELECT id,permission FROM user WHERE email='$email'");
                    $row = mysqli_fetch_array($query);
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['permission'] = $row['permission'];
                    $_SESSION['conn'] = $conn;
                    if($_SESSION["permission"]=="teacher"){
                        echo "teacher";
                    }
                    elseif($_SESSION["permission"]=="admin"){
                        echo "admin";
                    }
                    else{
                        echo "Wrong Permission";
                    }
                }
            }
        ?>
    </div>
</body>
</html>