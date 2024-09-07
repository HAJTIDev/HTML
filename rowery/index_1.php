<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wypożyczalnia Rowerów</title>
</head>
<body>
    <div id="container">
        <div id="banner">
           <h1> Wypożyczalnia Rowerów Bike.pl</h1>
        </div>
        <div id="left">
            <img src="rower1.png" alt="czerwony rower" class="bikes">
            <img src="rower2.png" alt="niebieski rower" class="bikes">
            <img src="rower3.png" alt="żółty rower" class="bikes">
        </div>
        <div id="right">
            <div id="popup">
                <img src="schemat.png" usemap="#image-map" id="bike" alt="duży rower">

                <map name="image-map">
                    <area target="" alt="Koło" title="Koło" href="" coords="200,381,198" shape="circle">
                    <area target="" alt="Koło" title="Koło" href="" coords="796,380,200" shape="circle">
                    <area target="" alt="Pedał" title="Pedał" href="" coords="409,400,566,446" shape="rect">
                    <area target="" alt="Siodełko" title="Siodełko" href="" coords="237,28,427,94" shape="rect">
                    <area target="" alt="Kierownica" title="Kierownica" href="" coords="611,2,739,84" shape="rect">
                    <area target="" alt="Rama" title="Rama" href="" coords="238,98,726,182" shape="rect">
                    <area target="" alt="Rama" title="Rama" href="" coords="354,182,625,249" shape="rect">
                    <area target="" alt="rama" title="rama" href="" coords="392,249,589,363" shape="rect">
                </map>
            </div>
            <div id="form">
                <fieldset>
                    <legend>Dane Użytkownika</legend>
                    <form method="post">
                        <table>
                            <tr>
                            <td>
                                <label for="name">Imię:</label>
                            </td>
                            <td>
                                <label for="surname">Nazwisko:</label>
                            </td>
                            <td>
                                <label for="Pesel">PESEL:</label>
                            </td>
                            </tr>
                        <tr>
                            <td>
                                <input type="text" name="name">
                            </td>
                            <td>
                                <input type="text" name="surname">
                            </td>
                            <td>
                                <input type="number" name="Pesel">
                            </td>
                        </tr>
                </table>
                <input type="submit" value="Wypożycz" id="button"> 
                </fieldset>
                <fieldset>
                    <legend>Dane roweru</legend>
                    <table>
                        <tr>
                            <td><label for="data_w">Data wypożyczenia:</label></td>
                            <td><label for="data_o">Data oddania:</label></td>
                        </tr>
                        <tr>
                            <td><input type="date" name="data_w"></td>
                            <td><input type="date" name="data_o"></td>
                        </tr>
                    </table>
                </form>
                <?php

                $val=FALSE;
                $currentDate = date('Y-m-d');

                function peselValidate($pesel){
                    $sum = 0;
                    $weights = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3, 1); 

                    foreach (str_split($pesel) as $position => $digit) $sum += $digit * $weights[$position];

                    return substr($sum % 10, -1, 1) == 0;
                }
                    $conn=new mysqli('','root','','rowery');
                        if(!(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['Pesel'])|| empty($_POST['data_w'])|| empty($_POST['data_o']))){

                            $name=$_POST['name'];
                            $surname=$_POST['surname'];

                            if(strlen($_POST['Pesel'])==11){

                                $pesel=$_POST['Pesel'];

                                $data= StrToTime($_POST['data_w']);
                                $data2= StrToTime($_POST['data_o']);
                                $sec_day = 60 * 60 * 24;
                                $days = Floor ($data/$sec_day);
                                $days2=Floor (StrToTime($currentDate)/$sec_day);
                                $days3=Floor ($data2/$sec_day);
                                if($days>=$days2 && $days3>=$days2){
                                $data_w=$_POST['data_w'];
                                $data_o=$_POST['data_o'];
                                
                                    if(peselValidate($pesel)===TRUE){
                                    $sql="SELECT * FROM `klienci` WHERE `Pesel`=$pesel";

                                    $result=$conn->query($sql);

                                    if ($result->num_rows == 0) {

                                        $sql2="INSERT INTO `klienci`(`ID`, `Imię`, `Nazwisko`, `Pesel`) VALUES ('','$name','$surname','$pesel')";
                                            if ($conn->query($sql2) === TRUE){
                                                $result=$conn->query("SELECT max(Id) as Id FROM klienci");
                                                $row=$result->fetch_assoc();
                                                $id=$row['Id'];
                                                $sql3="INSERT INTO `wypożyczenia`(`ID_wypożyczenia`, `ID_klienta`, `Data wypożyczenia`, `Data oddania`) VALUES ('','$id','$data_w','$data_o')";
                                                if ($conn->query($sql3) === TRUE)
                                                echo "dodawanie przeszło pomyślnie";
                                                $val=TRUE;

                                            }else echo "coś poszło nie tak";
                                        }

                                        else{

                                            $result2= $conn->query("SELECT ID as Id FROM `klienci` WHERE `Pesel`=$pesel");
                                            $row=$result2->fetch_assoc();
                                            $id2=$row['Id'];
                                            $sql4="INSERT INTO `wypożyczenia`(`ID_wypożyczenia`, `ID_klienta`, `Data wypożyczenia`, `Data oddania`) VALUES ('','$id2','$data_w','$data_o')";
                                            if ($conn->query($sql4) === TRUE) {
                                                echo "dodawanie przeszło pomyślnie";
                                                $val=TRUE;

                                            }else echo "coś poszło nie tak";
                                        }
                                    
                                    } else echo "zły pesel";
                                } else echo "złe daty";
                                } else echo "zły pesel";
                            
                            }
                    ?>
                </fieldset>
                <div id="info">
                    <?php 
                    if ($val===TRUE){

                        if(!(empty($_POST['data_w']) || empty($_POST['data_o']))){

                            $sec_w = StrToTime($data_w);
                            $sec_o = StrToTime($data_o);
                            $sec_between = $sec_o - $sec_w;
                            if ($sec_between<0) echo "złe daty";
                            $sec_day = 60 * 60 * 24;
                            $days = Floor ($sec_between/$sec_day);
                            if($days==0) $days=1;
                            $price=$days*20;
                            echo "koszt wypożyczenia od ".$data_w." do ".$data_o." wynosi ".$price."zł";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>