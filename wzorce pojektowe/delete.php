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
                <input type="submit" value="usuń pytanie" name="del_question">
                <input type="submit" value="usuń użytkownika" name="del_user">
                <input type="submit" value="usuń wynik" name="del_ans">
            </form>
            <div id="form">
                <?php
                $conn = new mysqli('', 'root', '', 'kurs');
                if ($conn->connect_errno) die("Connection failed: {$conn->connect_error}");
                if(array_key_exists('del_question', $_POST)){
                    $result = $conn->query("SELECT * FROM questions");
                    while($row = $result -> fetch_assoc()) {
                        $id=$row['id'];
                        $title=$row['title'];
                        $type=$row['type'];
                        $cor=$row['correct'];
                        $a='';
                        $b='';
                        $c='';
                        if($type==1){
                            $a=$row['ans1'];
                            $b=$row['ans2'];
                            $c=$row['ans3'];
                        }
                        echo $id.". ".$title.". ".$type.". ".$a.". ".$b.". ".$c.". "." ".$cor." <form method='POST'>"."<input type='submit' value='usuń Pytanie' name='$id'>"." </form>"."<br>";
                    }
                }
                else if(array_key_exists('del_user', $_POST)){
                    $result = $conn->query("SELECT * FROM user");
                    while($row = $result -> fetch_assoc()) {
                        $id=$row['id'];
                        $email=$row['email'];
                        $pass=$row['password'];
                        $per=$row['permission'];

                        echo $id.". ".$email.". ".$pass.". ".$per.". "." <form method='POST'>"."<input type='submit' value='usuń Użytkownika' name='$id'>"." </form>"."<br>";
                    }
                }

                else if(array_key_exists('del_ans', $_POST)){
                    $result = $conn->query("SELECT * FROM `answer`");
                    while($row = $result -> fetch_assoc()) {
                        $id=$row['id'];
                        $ids=$row['idUser'];
                        $val=$row['value'];
                        $DT=$row['DT'];

                        echo $id.". ".$ids.". ".$val.". ".$DT.". "." <form method='POST'>"."<input type='submit' value='usuń Wynik' name='$id'>"." </form>"."<br>";
                    }
                }

                if(in_array("usuń Pytanie",$_POST)){
                    $ids=array_key_first($_POST);
                    $sql = "DELETE FROM `questions` WHERE id=$ids";
                        if ($conn->query($sql) === TRUE) echo "usunięto pomyślnie";
                }
                if(in_array("usuń Wynik",$_POST)){
                    $ids=array_key_first($_POST);
                    $sql = "DELETE FROM `answer` WHERE id=$ids";
                        if ($conn->query($sql) === TRUE) echo "usunięto pomyślnie";
                }
                if(in_array("usuń Użytkownika",$_POST)){
                    $ids=array_key_first($_POST);
                    $sql = "DELETE FROM `user` WHERE id=$ids";
                        if ($conn->query($sql) === TRUE) echo "usunięto pomyślnie";
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