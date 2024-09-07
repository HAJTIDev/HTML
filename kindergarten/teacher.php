<?php
session_start();
$conn = mysqli_connect('localhost','root','','kindergarten');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<link rel="stylesheet" href="teacher.css">
	<title>🌞 Kindergarten 🌞</title>
</head>

<body onload="startTime()">
	<nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #fb6a6a;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
				<?php
				if(!empty($_SESSION['id_user'])){
				$id_user = $_SESSION['id_user'];
				$query = mysqli_query($conn,"SELECT name, surname FROM teacher WHERE iduser=$id_user");
				while($row = mysqli_fetch_array($query)){
					$name = $row['name'];
					$surname = $row['surname'];
					echo "Welcome $name $surname";
				}
			}
			?>
		</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="teacher.php"><i
                                class="fa-solid fa-house fa-2xl"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-bell fa-2xl"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="message.html"><i class="fa-solid fa-envelope  fa-2xl"></i></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.html"><button type="button" class="btn btn-outline-dark"><i
                                    class="far fa-user"></i>
                                Log out</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            No new notifications
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
		<div id="clock"></div>
		<div id="container">
			<a href="child.html">
			<div id="left_top">
					<i class="fa-solid fa-children fa-10x"></i>
					<br>
					<br>
					<h1>Children</h1>
			</div>
			</a>
			<a href="plan.html">
				<div id="right_top">
					<i class="fa-solid fa-calendar  fa-10x"></i><br>
					<br>
					<br>
					<h1>Timetable</h1>
				</div>
			</a>
			<div id="space"></div>
			<a href="payment.html">			
				<div id="left_bottom">
					<i class="fa-solid fa-money-check-dollar fa-10x"></i>
					<br>
					<br>
					<h1>Payments</h1>
			</div>
			</a>
			<a href="bus.html">
			<div id="right_bottom">
				<i class="fa-solid fa-bus  fa-10x"></i>
				<br>
				<br>
				<h1>Trips</h1>
			</div>
		</a>
		</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/c7e963bf8a.js" crossorigin="anonymous"></script>
	<script src="clock.js"></script>
</body>

</html>