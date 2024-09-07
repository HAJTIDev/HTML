<?php
session_start();
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
	<link rel="stylesheet" href="style.css">
	<title>🌞 Kindergarten 🌞</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #b4dbf8;">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">🌞 Kindergarten 🌞</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Ghoto Gallery</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">About us</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
				</ul>
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
							data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="far fa-user"></i>
							Log in</button>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
		<div class="offcanvas-header">
			<h5 class="offcanvas-title" id="offcanvasRightLabel"><strong>Log in</strong></h5>
			<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<form method="post">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">email</label>
					<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
				</div>
				<br>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Passowrd</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password">
				</div>
				<button type="submit" class="btn btn-primary"><strong>Login</strong></button>
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
                    $query = mysqli_query($conn,"SELECT user_id,permission FROM user WHERE email='$email'");
                    $row = mysqli_fetch_array($query);
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['permission'] = $row['permission'];
                    $_SESSION['conn'] = $conn;
                    if($_SESSION["permission"]=="teacher"){
						var_dump($_POST)
                    }
                    elseif($_SESSION["permission"]=="admin"){
                        var_dump($_POST)
                    }
                    else{
                        echo "Wrong Permission";
                    }
                }
            }
        ?>
		</div>
	</div>
	</div>
	<div class="body">
		<div class="banner">
			big logo tu
			<div class="slideshow-container">

				<div class="mySlides fade">
					<img src="img 1.jpg">
				</div>

				<div class="mySlides fade">
					<img src="img 2.jpg">
				</div>

				<div class="mySlides fade">
					<img src="img 3.jpg">
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<br>
			<div class="section">
				<table>
					<tr>
						<td><a href="news.html">
								<h1>Home</h1>
							</a></td>
						<td><a href="news.html">
								<h1>Contact</h1>
							</a></td>
						<td><a href="news.html">
								<h1>NEWS</h1>
							</a></td>
						<td><a href="news.html">
								<h1>Registration</h1>
							</a></td>
						<td><a href="news.html">
								<h1>Team</h1>
							</a></td>
						<td><a href="menu.html">
								<h1>Back to login</h1>
							</a></td>
					</tr>
				</table>
			</div>
			<br>
			<div class="back">
				<div class="info">
					dsad
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/c26cd2166c.js"></script>
	<script src="script.js">

	</script>

</body>

</html>