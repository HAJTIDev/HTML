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
  <link rel="stylesheet" href="login.css">
  <title>🌞 Kindergarten 🌞</title>
</head>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Sing up</h2>
                <p class="text-white-50 mb-5">Please enter your email and password</p>
                <form method="post">
                  <div class="form-outline form-white mb-4">
                    <input type="email" id="typeEmailX" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="typeEmailX">Email</label>
                  </div>
                  <div class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="typePasswordX">Password</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="group" value="Admin">
                    <label class="form-check-label" for="inlineRadio1">Admin</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="group" value="Teacher">
                    <label class="form-check-label" for="inlineRadio2">Teacher</label>
                  </div>
                  <br>
                  <br>
                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                </form>
                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <?php
			$conn = mysqli_connect('localhost','root','','kindergarten');
			if(isset($_POST['password']) && isset($_POST['password']) && isset($_POST['group'])){
			if(!empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['group'])){
				$email = $_POST['email'];
				$pass = $_POST['password'];
        $group = $_POST['group'];
				$query = mysqli_query($conn,"INSERT INTO `user`( `permission`, `email`, `password`) VALUES ('$group','$email','$pass')");
        echo "<script type='text/javascript'>alert('registration was successful');</script>";
        header('Location: admin.html');
			}
			}
		?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>