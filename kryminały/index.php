<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="crime.css">
    <title>Books by Mróz</title>
</head>
<body>
    <div id="container">
        <div id="banner">
            POLSKIE KRYMINAŁY
        </div>
        <div id="left">
            <img src="book_1.jpg" alt="book_1"><br>
            <img src="book_2.jpg" alt="book_2"><br>
            <img src="book_3.jpg" alt="book_3"><br>
            <img src="book_4.jpg" alt="book_4">
        </div>
        <div id="middle">
            <h1>JOANNA CHYŁKA</h1>
            <p>Interesują Cię prawnicze zagrywki? Czasem skupiasz się na opowieści, 
                w której na pierwszym planie toczy się rozprawa sądowa? 
                Na pewno polubisz Joannę Chyłkę, bezwzględną prawniczkę, 
                która nigdy nie cofnie się przed niczym, 
                a na jej drodze stają coraz to nowsze wyzwania.</p>
            <p>Sprawy, z jakimi mierzy się Joanna Chyłka, są bardzo różne. 
                Zdarza jej się bronić syna milionera, oskarżonego o zabójstwo dwóch osób, rodziców, 
                oskarżonych o zabójstwo córki, robotnika, podejrzewanego o zamordowanie swojej 
                rodziny w celu uzyskania polisy ubezpieczeniowej. Każda z tych spraw jest nieco inna 
                i pokazuje różne oblicza głównej bohaterki</p>
            <h1>WIKTOR FROST</h1>
            <p>
                Akcja powieści rozpoczyna się w niebanalnym miejscu, jakim jest 
                polski Giewont. Na miejscu zbrodni pojawia się komisarz Forst, dla którego od 
                początku ta sprawa wygląda dziwnie..
            </p>
            <h3>Wybierz interesującą Cię książkę:</h3>
            <form method="post">
                <select name='list'>
                <?php 
                    $conn = new mysqli('','root','','crime');
                    $result = $conn->query("SELECT Tytul FROM ksiazka");
                    if($result ->num_rows){
                        while($row = $result->fetch_assoc()){
                            echo "<option>".$row['Tytul'].'</option>';
                        }
                    }
                ?>
                </select>
                <input type="submit" value="Wybierz" name='buton'>
            </form>
            <?php 
                if(isset($_POST['list'])){
                    $book=$_POST['list'];
                    echo "<h4>"."Tytuł:"."</h4>";
                    echo $book."<br>";
                    $result = $conn->query("SELECT * FROM ksiazka where Tytul like '$book'");
                    echo "<h4>"."Cena za sztukę:"."</h4>";
                    $row = $result->fetch_assoc();
                    echo $row['Cena']." zł"."<br>";
                    echo "<h4>"."Opis:"."</h4>";
                    echo $row['Opis']."<br>";
                }
                $conn->close();
            ?>
        </div>
        <div id="right">
            <img src="book1.jpg" alt="book1"><br>
            <img src="book2.jpg" alt="book2"><br>
            <img src="book3.jpg" alt="book3"><br>
            <img src="book4.jpg" alt="book4">
        </div>

    </div>
</body>
</html>