<!DOCTYPE html>
<html lang="pl">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="wclassth=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="input.css">
    <link rel="stylesheet" href="admin.css" />
    <title>Kurs</title>
</head>

<body onload="startTime()">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(247, 238, 223)">
        <div class="container-fluid">
            <div class="rainbow"><img src="logo.png" alt="logo"></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="admin.html"><i class="fa-solid fa-house fa-2xl"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#Modal"><i class="fa-solid fa-bell fa-2xl"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#Modal1"><i class="fa-solid fa-envelope  fa-2xl"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="kurs.html"><button type="submit" name='destroy' class="btn btn-outline-primary">
                                <i class="far fa-user"></i> Wyloguj się</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Powiadomienia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    brak nowych powaidomień
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="ModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel1">Wiadmości</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 style="color:red">W trakcie tworzenia</h2>
                    funkcja niedostepna
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="clock"></div>
    <div class="center">
        <div class="middle">
            <form method="POST">
                <input type="submit" value="dodaj pytanie" name="add_question">
                <input type="submit" value="dodaj użytkownika" name="add_user">
            </form>
            <div id="form">
                <?php
                $conn = new mysqli('', 'root', '', 'kurs');
                if ($conn->connect_errno) die("Connection failed: {$conn->connect_error}");

                if (array_key_exists('add_user', $_POST)) {
                    echo '<form method="POST"> 
            Hasło: <input type="text" name="password" required> <br>
            Email: <input type="email" name="email" required> <br>
            dostęp: <select name="per" required>
                    <option value="user">user</option>
                    <option value="admin">admin</option><br>';
                    echo '</select>
                    <br><input type="submit" value="Dodaj" >
                    </form>';
                }
                if (!empty($_POST["password"]) && !empty($_POST["email"])) {
                    $pass = $_POST["password"];
                    $email = $_POST["email"];
                    $per = $_POST["per"];
                    $result = $conn->query("SELECT email FROM user WHERE email='$email'");
                    if ($result->num_rows == 0) {
                        $sql = "INSERT INTO `user`( `email`, `password`, `permission`) VALUES ('$email','$pass','$per')";
                        if ($conn->query($sql) === TRUE) echo " dodawanie przeszło pomyślnie";
                    } else echo "pod tym mailem już jest konto";
                }


                if (array_key_exists('add_question', $_POST)) {
                    echo '<form method="POST"> 
            Polecenie: <input type="text" name="title" required> <br>
            typ odpowiedzi: <select name="type" required>
                    <option value=0>Tak/Nie</option>
                    <option value=1">ABC</option>
                    </select>
                    <br><input type="submit" value="Przejdź dalej">
                    </form>';
                }

                if (!empty($_POST["title"])) {
                    $_SESSION['title'] = $_POST["title"];
                    $_SESSION['type'] = $_POST["type"];

                    if ($_POST["type"] == 0) {
                        echo '<form method="POST"> 
                    poprawna odpowiedź:
                    <select name="ans" required>
                    <option value="T">Tak</option>
                    <option value="N">Nie</option></select>
                    <br>
                    <br><input type="submit" value="Dodaj" name="d">
                    </form>';
                    }
                    else{
                        echo '<form method="POST"> 
                        Odpowiedź A: <input type="text" name="Ans1" required> <br>
                        Odpowiedź B: <input type="text" name="Ans2" required> <br>
                        Odpowiedź C: <input type="text" name="Ans3" required> <br>
                    poprawna odpowiedź:
                    <select name="ans" required>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    </select><br>
                    <br><input type="submit" value="Dodaj" name="ABC">
                    </form>';
                    }
                }
                if (isset($_POST['ABC'])) {
                    $cor=$_POST['ans'];
                    $A=$_POST['Ans1'];
                    $B=$_POST['Ans2'];
                    $C=$_POST['Ans3'];
                    $title = $_SESSION['title'];
                    $type = $_SESSION['type'];
                    $sql = "INSERT INTO `questions`( `title`, `type`, `ans1`, `ans2`, `ans3`, `correct`) VALUES ('$title','$type','$A','$B','$C','$cor')";
                    if ($conn->query($sql) === TRUE) echo " dodawanie przeszło pomyślnie";
                }
                if (isset($_POST['d'])) {
                    $ans = $_POST['ans'];
                    $title = $_SESSION['title'];
                    $type = $_SESSION['type'];
                    $sql = "INSERT INTO `questions`( `title`, `type`, `ans1`, `ans2`, `ans3`, `correct`) VALUES ('$title','$type',NULL,NULL,NULL,'$ans')";
                    if ($conn->query($sql) === TRUE) echo " dodawanie przeszło pomyślnie";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </div>
    <script src="clock.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c7e963bf8a.js" crossorigin="anonymous"></script>
</body>

</html>