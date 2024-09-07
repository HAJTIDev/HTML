<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="zad5.css">
</head>

<body>
    <header class="one"><img src="zad5.png" alt="logo lotnisko"></header>
    <header class="two">
        <h1>Przyloty</h1>
    </header>
    <header class="three">
        <h3>przydatne linki</h3>
        <a href="kwerendy.txt" target="_blank">Pobierz...</a>
    </header>
    <div id="container">
        <table>
            <tr>
                <td>czas</td>
                <td>kierunek</td>
                <td>numer rejsu</td>
                <td>status</td>
            </tr>
            <?php
            $conn = new mysqli('', 'root', '', 'egzamin');
            $result = $conn->query('select czas,kierunek,nr_rejsu, status_lotu from przyloty order by czas');
            if ($result->num_rows) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>" . "<td>" . $row["czas"] . "</td>" .
                        "<td>" . $row["kierunek"] . "</td>" .
                        "<td>" . $row["nr_rejsu"] . "</td>" .
                        "<td>" . $row["status_lotu"] . "</td>" . "</tr>";
                }
            }
            ?>
        </table>
    </div>
    <footer class="fot_one">
        <p>
            <?php
            $cookie_name = "lastVisit";
            $cookie_value = time();
            $cookie_duration = 2 * 60 * 60;

            if (!isset($_COOKIE[$cookie_name])) {
                setcookie($cookie_name, $cookie_value, time() + $cookie_duration, "/");
                echo "<strong>Dzień dobry! Strona lotniska używa ciasteczek</strong>";
            } else {
                $lastVisit = $_COOKIE[$cookie_name];
                $timeDifference = ($cookie_value - $lastVisit) / (60 * 60);
                if ($timeDifference < 2) {
                    echo "<em>Witaj ponownie na stronie lotniska</em>";
                } else {
                    setcookie($cookie_name, $cookie_value, time() + $cookie_duration, "/");
                    echo "<strong>Dzień dobry! Strona lotniska używa ciasteczek</strong>";
                }
            }
            ?>
        </p>
    </footer>
    <footer class="fot_two">Autor:.....</footer>
</body>

</html>