<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="weterynarz.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Weterynarz</title>
    </head>
    <body>
    <div id="banner"><h1>GABINET WETERYNARYJNY</h1></div>
    <div id="left">
        <h2>PSY</h2>
        <?php
        $start = mysqli_connect('localhost','root','','weterynarz');
        $query = mysqli_query($start,'SELECT id,imie,wlasciciel FROM zwierzeta where rodzaj=1;');
        while ($row = mysqli_fetch_array($query)) echo $row['id'].' '.$row['imie'].' '.$row['wlasciciel'].'<br>';
        ?>
        <h2>KOTY</h2>
        <?php
        $query = mysqli_query($start,'SELECT id,imie,wlasciciel FROM zwierzeta where rodzaj=2;');
        while ($row = mysqli_fetch_array($query)) echo $row['id'].' '.$row['imie'].' '.$row['wlasciciel'].'<br>';
        echo '<br>'
        ?>
        formularz
        <form method="post">
          <p> Imię: <input type="text" name="name"></p>
           <p>Właściciel <input type="text" name="owner"><br></p>
           <p>Pies <input type="radio" name="animal" value="1">
           Kot <input type="radio" name="animal" value="2"></p>
           <p>rodzaj usługi <select name="service">
            <option value="1">pazury</option>
            <option value="2">mycie</option>
            <option value="3">czesanie</option>
            <option value="4">uszy</option>
           </select></p>
           <p>Telefon <input type="text" min="9" name="phone"></p>
           <p><input type="submit" value="Zapisz"></p>
        </form>
        <?php
            if (isset($_POST['animal']) && isset($_POST['name']) && isset($_POST['owner']) && isset($_POST['service']) && isset($_POST['phone'])){
                $name = $_POST['name'];
                $owner = $_POST['owner'];
                $animal = $_POST['animal'];
                $service = $_POST['service'];
                $phone = $_POST['phone'];
            }


        ?>
    </div>
    <div id="middle">
        <h2>SZCZEGÓŁOWA INFORMACJA OZWIERZĘTACH</h2>
        <?php
        $query = mysqli_query($start,'SELECT imie,telefon,szczepienie,opis FROM `zwierzeta`;');
        while ($row = mysqli_fetch_array($query)) echo 'Pacjent: '.' '.$row['imie'].'<br>'.'telefon właściciela: '.' '.$row['telefon'].', '.'ostatnie szczepienie'. ' '.$row['szczepienie'].', '.'informacje: '.' '.$row['opis'].'<br>'.'<hr>';
        ?>
    </div>
    <div id="right">
        <h2>WETERYNARZ</h2>
       <a href="logo.jpg"> <img src="logo-mini.jpg"></a>
       <p>Krzysztof Nowakowski, lekarz weterynarii</p>
       <h2>GODZINY PRZYJĘĆ</h2>
       <table>
        <tr>
            <td>Poniedziałek</td>
            <td>15:00 - 19:00</td>
        </tr>
        <tr>
            <td>Wtorek</td>
            <td>15:00 - 19:00</td>
        </tr>
       </table>
    </div>
    </body>
</html>