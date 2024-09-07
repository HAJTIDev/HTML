<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="wclassth=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="kurs.css" />
  <link rel="stylesheet" href="wynik.css">
  <title>Kurs</title>
</head>

<body>
  <?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['destroy']))
      session_destroy();
  }
  ?>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(247, 238, 223)">
    <div class="container-fluid">
      <div class="rainbow"><img src="logo.png" alt="logo"></div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="kurs.html">Rozdział 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kurs2.html">Rozdział 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Test sprawdzający</a>
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
  <div class="center">
    <div class="middle">
      <div class="cont">
      <?php
      $data = date('Y-m-d H:i:s');
      $id = $_SESSION['QuestionID'];
      $pkt = $_SESSION['pkt'];
      echo "gratulacje! udało ci się zdobyć " . $pkt * 10 . " % <br>";
      echo $pkt . "/" . "10 punktów";
      $conn = new mysqli('', 'root', '', 'kurs');
      if ($conn->connect_errno) die("Connection failed: {$conn->connect_error}");
      $conn->query("INSERT INTO `answer`(`idUser`, `value`, `DT`) VALUES ('$id','$pkt','$data')");
      ?>
      </div>
    </div>
  </div>
</body>

</html>