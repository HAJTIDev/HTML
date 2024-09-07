<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl3.css">
    <title>Video On Demand</title>
</head>

<body>
    <div id="banner1">
        <h1>Internetowa wypożyczalnia filmów</h1>
    </div>
    <div id="banner2">
        <table>
            <tr>
                <td>Kryminał</td>
                <td>Horror</td>
                <td>Przygodowa</td>
            </tr>
            <tr>
                <td>20</td>
                <td>30</td>
                <td>20</td>
            </tr>
        </table>
    </div>
    <div id="polecane">
        <h3>Polecamy</h3>
        <?php
        $conn = new mysqli('', 'root', '', 'dane3');

        $result = $conn->query("SELECT id,nazwa,opis,zdjecie FROM produkty WHERE id in (18,22,23,25)");
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='skrypt'>" .
                    "<h4>" . $row['id'] . " " . $row['nazwa'] . "</h4>" .
                    "<img src={$row['zdjecie']} alt='film'>" .
                    "<br>" . "<p>" . $row['opis'] . "</p>" .
                    "</div>";
            }
        }

        ?>
    </div>

    <div id="fantastyczne">
        <h3>Filmy fantastyczne</h3>
        <?php
        $result = $conn->query("SELECT id,nazwa,opis,zdjecie FROM produkty WHERE Rodzaje_id=12;");
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='skrypt'>" .
                    "<h4>" . $row['id'] . " " . $row['nazwa'] . "</h4>" .
                    "<img src={$row['zdjecie']} alt='film'>" .
                    "<br>" . "<p>" . $row['opis'] . "</p>" .
                    "</div>";
            }
        }
        ?>
    </div>
    <footer>

        <form method="post">
            usuń film nr:<input type="number" name="num">
            <input type="submit" value="Usuń film">
        </form>
        Stronę wykonał: <a href="mailto:ja@poczta.com">.......</a>
        <?php
        if (isset($_POST['num'])) {
            $numer = $_POST['num'];
            $result = $conn->query("DELETE from rodzaje where id=$numer;");
        }
        $conn->close();
        ?>
    </footer>
</body>

</html>