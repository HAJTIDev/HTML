<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auta auteczka autunia</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header  id="banner">
        <img src="logo.png" id="logo" >
    </header>
    <main>
        <div id="left">
            <form method="post">
                Koszt benzyny: <input type="text" name="a" required><br>
                Średnie zużycie na 100km:<input type="number" name="b" required><br>
                Liczba km:<input type="number" name="c" required><br>
                Stały klient:<input type="checkbox" name='check'><br>
                <input type="submit" value="Policz" id="button" name="submit">
            </form>
            <div id="wynik">
                <?php
                if (!(empty($_POST['a']) || empty($_POST['b']) || empty($_POST['c']))) {
                    $a = $_POST['a'];
                    $b = $_POST['b'];
                    $c = $_POST['c'];
                    $p = 0.9;
                    if($a>0 && $b>0 && $c>0)
                    if (is_numeric($a)) {
                        $end = ($b / 100) * $c;
                        $dz = $a*$end;
                        if (isset($_POST['check'])) $dz *= $p;
 
                        echo "koszt benzyny: ".$a." zł/l"."<br>";
                        echo "średnie zużycie na 100km: ".$b."l"."<br>";
                        echo "liczba km: ".$c."km"."<br>";
                        echo "do zapłaty : ".round($dz,2). "zł";
                    }
                }       
            ?>
            </div>
        </div>
        <div id="right">
           <p> <img src="dostawczak.png" id="img"></p>
           <p> <img src="osobówka.png"id="img"></p>
           <p> <img src="wyścigowe.png"id="img"></p>
        </div>
    </main>
</body>
</html>