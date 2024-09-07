<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        $counter = true;
        echo "<table>";
        $conn = new mysqli('localhost', 'root', '', 'sport');
        $result = $conn->query('SELECT s.imie,s.nazwisko,d.nazwa FROM wyniki w inner join sportowiec s on w.sportowiec_id=s.id inner join dyscyplina d on w.dyscyplina_id=d.id where month(w.dataUstanowienia)=10 and day(w.dataUstanowienia) BETWEEN 6 and 7;');
        if ($result->num_rows) {
            while ($row = $result->fetch_assoc()) {
                if ($counter == true) {
                    echo "<tr>" . "<th>" . "imie" . "</th>" .
                        "<th>" . "nazwisko" . "</t\h>" .
                        "<th>" . "nazwa" . "</td\h>" . "</tr>";
                } else {
                    echo "<tr>" . "<td>" . $row["imie"] . "</td>" .
                        "<td>" . $row["nazwisko"] . "</td>" .
                        "<td>" . $row["nazwa"] . "</td>" . "</tr>";
                }
                $counter=false;
            }
        }
        echo "</table>";
        $conn->close()
        ?>
    </div>
</body>

</html>