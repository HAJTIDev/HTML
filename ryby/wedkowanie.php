<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl2.css">
    <title>Klub wędkowania</title>
</head>

<body>
    <header>
        <h2>Wędkuj z nami!</h2>
    </header>
    <div id="left"><img src="ryba2.jpg" alt="szczupak"></div>
    <div id="right">
        <h3>ryby spokojnego żeru(białe)</h3>
        <?php
        $conn = new mysqli("localhost", "root", "", "wedkowanie");
        if ($conn->connect_error)
            echo "nie połączono do bazy";
        else {
            $querry = $conn->query("SELECT id,nazwa,wystepowanie FROM `ryby` WHERE styl_zycia=2;");
            if (mysqli_num_rows($querry) > 0) {
                while ($row = $querry->fetch_assoc()) {
                    echo $row["id"] . ". " . $row["nazwa"] . " występuje w " . $row["wystepowanie"] . "<br>";
                }
            }

            $conn->close();
        }
        ?>
        <ol>
            <li><a href="https://wedkuje.pl/">Odwiedź także</a></li>
            <li><a href="https://pzw.org.pl/">Polski Związek Wędkarski</a></li>
        </ol>
    </div>
    <footer>
        <p>Stronę wykonała twoja stara</p>
    </footer>
</body>

</html>