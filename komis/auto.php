<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title>Komis samochodowy</title>
        <link rel="stylesheet" href="auto.css">
    </head>
<body>

    <div id="baner">
        <h1>SAMOCHODY</h1>
    </div>

    <div id="lewy">
        <h2>Wykaz samochodów</h2>
       <ul>
        <?php
            $start = mysqli_connect('localhost','root','','komis');
            $query = mysqli_query($start,'SELECT id,marka,model FROM samochody;');
           while ($row = mysqli_fetch_array($query)) echo '<li>'.$row['id'].' '.$row['marka'].' '.$row['model'].'</li>'.'<br>';
        ?>
        </ul>
        <h2>Zamówienia</h2>
        <ul>
        <?php
            $query = mysqli_query($start,'SELECT Samochody_id,Klient FROM zamowienia;');
           while ($row = mysqli_fetch_array($query)) echo '<li>'.$row['Samochody_id'].' '.$row['Klient'].'</li>'.'<br>';
        ?>
        </ul>
        
    </div>

    <div id="prawy">
        <h2>Pełne dane: Fiat</h2>
        <ul>
        <?php
            $query = mysqli_query($start,"SELECT * FROM samochody WHERE marka='Fiat'");
           while ($row = mysqli_fetch_array($query)) echo '<li>'.$row['id'].' / '.$row['model'].' / '.$row['rocznik'].' / '.$row['kolor'].' / '.$row['stan'].' / '.'</li>'.'<br>';
           mysqli_close($start);
        ?>
        </ul>
    </div>

    <div id="stopka">
        <table>
            <tr>
                <td><a href="kwerendy.txt">Kwerendy</td>
                <td>Autor: 00000000000</td>
                <td><img src="auto.png" alt="komis samochodowy"></td>
            </tr>   
        </table>
    </div>

</body>
</html>