<!DOCTYPE html>
<html lang="pl">

<head>
	<title>Test</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="test.css">
</head>

<body>
	<div class="center">
		<div class="middle">
			<?php
			session_start();

			if ($_SERVER['REQUEST_METHOD'] == "GET") {
				$_SESSION['QuestionID'] = 1;
				$_SESSION['pkt'] = 0;
			}

			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				if (array_key_exists('Answer', $_POST)) {
					if ($_POST['Answer'] == $_POST['correct']) $_SESSION['pkt']++;
					$_SESSION['QuestionID']++;
				} else {
					echo '<footer>';
					echo ' odpowiedź musi być podana';
					echo '</footer>';
				}
			}

			$conn = new mysqli('', 'root', '', 'kurs');
			if ($conn->connect_errno)
				die("Connection failed: {$conn->connect_error}");
			?>

			<?php
			if ($_SESSION['QuestionID'] == 11) header("Location: wyniki.php");
			$result = $conn->query("SELECT * FROM questions WHERE id = {$_SESSION['QuestionID']}");
			if ($result->num_rows) {
				echo '<div class="quest">';
				echo "<form method='post'>";
				$row = $result->fetch_assoc();
				echo "<h3>{$_SESSION['QuestionID']}. {$row['title']}</h3><br>";
				echo '<div class="ans">';
				switch ($row['type']) {
					case 0:
						echo "<input type='radio' id='tak' name='Answer' value='T' class='question'><label for='tak'>Tak</label><br>";
						echo "<input type='radio' id='nie' name='Answer' value='N' class='question'><label for='nie'>Nie</label><br>";
						break;

					case 1:
						echo "A:<input type='radio' id='AnsA' name='Answer' value='A' class='question'><label for='AnsA'>{$row['ans1']}</label><br>";
						echo "B:<input type='radio' id='AnsB' name='Answer' value='B' class='question'><label for='AnsB'>{$row['ans2']}</label><br>";
						echo "C:<input type='radio' id='AnsC' name='Answer' value='C' class='question'><label for='AnsC'>{$row['ans3']}</label><br>";
						break;

					default:
						break;
				}
				echo "<div>";
				echo "<input type='hidden' name='correct' value='{$row['correct']}'>";
				echo "</div>";
			}
			if ($_SESSION['QuestionID'] == 10) echo "<input type='submit'class='button' value='Zakończ'>";
			else echo "<input type='submit'class='button' value='Dalej' >";
			echo "</form>";
			echo "</div>";
			$conn->close();
			?>
		</div>
	</div>
	<form>
	</form>
</body>

</html>