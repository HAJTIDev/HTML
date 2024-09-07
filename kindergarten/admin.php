<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div>
        <form method="POST">
            <input type="submit" value="Add child" name="add_child">
            <input type="submit" value="Add group" name="add_group">
            <input type="submit" value="Add teacher" name="add_teacher">
            <input type="submit" value="Add class" name="add_class">
        </form>
        <div id="operation">
            <?php
                
                    $conn = mysqli_connect('localhost','root','','kindergarten');
                    if(array_key_exists('add_child', $_POST)){
                        $query = mysqli_query($conn,"SELECT id_group, symbol, name, surname FROM groups JOIN teacher ON idteacher=id_teacher;");
                        echo '<form method="POST"> 
                        Name: <input type="text" name="name" onKeyDown="not_number()"> <br>
                        Surname: <input type="text" name="surname" onKeyDown="not_number()"> <br>
                        PESEL: <input type="text" name="pesel" pattern="[0-9]{11}" required>  <br>
                        Parent phone number: <input type="text" name="phone" pattern="[0-9]{9}" required> <br>
                        Group (optional): <select name="id_group"> <br>';
                        echo "<option value=''>None</option>";
                        while($row = mysqli_fetch_array($query)){
                            $id_group = $row['id_group'];
                            $symbol = $row['symbol'];
                            $name = $row['name'];
                            $surname = $row['surname'];
                            echo "<option value='$id_group'>Group: $id_group $symbol | Supervising teacher: $name $surname</option>";
                        }
                        echo '</select>
                        <input type="submit" value="Submit" name="add_child_c">
                        </form>';
                    }
                    if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['pesel']) && !empty($_POST['phone']) && array_key_exists('add_child_c', $_POST)){
                        $name = $_POST['name'];
                        $surname = $_POST['surname'];
                        $pesel = $_POST['pesel'];
                        $phone = $_POST['phone'];
                        $id_group = $_POST['id_group'];
                        echo "$name $surname $pesel $phone $id_group";
                        if ($id_group == ""){
                            mysqli_query($conn,"INSERT INTO unassigned_child (name,surname,PESEL,phone) VALUES ('$name', '$surname', '$pesel', '$phone')");
                        }
                        else{
                            mysqli_query($conn,"INSERT INTO child (name,surname,PESEL,phone,idgroup) VALUES ('$name', '$surname', '$pesel', '$phone', $id_group)");
                        }
                        echo '<script type="text/javascript">
                        document.getElementById("operation").innerHTML = "";
                        </script>';
                    }
                    
                    if(array_key_exists('add_group', $_POST)){
                        $query = mysqli_query($conn,"SELECT name, surname, id_teacher FROM teacher WHERE id_teacher NOT IN (SELECT idteacher FROM groups);");
                        echo '<form method="POST"> 
                        Symbol: <input type="text" name="symbol"> <br>
                        <select name="teacher">';
                        while($row = mysqli_fetch_array($query)){
                            $idteacher = $row['id_teacher'];
                            $name = $row['name'];
                            $surname = $row['surname'];
                            echo "<hr> <option value='$idteacher'>$name $surname</option><br>";
                        }
                        $query = mysqli_query($conn,"SELECT idnew, name, surname, PESEL FROM unassigned_child");
                        echo '<br></select> Unasigned childs: <br>';
                        while($row = mysqli_fetch_array($query)){
                            $idnew = $row['idnew'];
                            $name = $row['name'];
                            $surname = $row['surname'];
                            $pesel = $row['PESEL'];
                            echo "<hr> <input type='checkbox' value='YES' name=$idnew> $name $surname $pesel <br>";
                        }
                        echo '<input type="submit" value="Submit" name="add_group_c">
                        </form>';
                    }    
                    if(!empty($_POST['symbol']) && !empty($_POST['teacher']) && array_key_exists('add_group_c', $_POST)){
                        $symbol = $_POST['symbol'];
                        $idteacher = $_POST['teacher'];
                        mysqli_query($conn,"INSERT INTO groups (symbol,idteacher) VALUES ('$symbol', $idteacher)");
                        $query = mysqli_query($conn,"SELECT id_group FROM groups WHERE idteacher='$idteacher'");
                        while($row = mysqli_fetch_array($query)){
                            $idgroup = $row['id_group'];
                        }
                        $query = mysqli_query($conn,"SELECT idnew FROM unassigned_child");
                        while($row = mysqli_fetch_array($query)){
                            $idnew = $row['idnew'];
                            if (isset($_POST[$idnew])){
                                $query1 = mysqli_query($conn,"SELECT name, surname, PESEL, phone FROM unassigned_child WHERE idnew=$idnew");
                                while($row = mysqli_fetch_array($query1)){
                                    $name = $row['name'];
                                    $surname = $row['surname'];
                                    $pesel = $row['PESEL'];
                                    $phone = $row['phone'];
                                }
                                mysqli_query($conn,"DELETE FROM unassigned_child WHERE idnew='$idnew'");
                                mysqli_query($conn,"INSERT INTO child (name,surname,PESEL,phone,idgroup) VALUES ('$name', '$surname', '$pesel', '$phone', $idgroup)");
                            }
                        }
                        echo '<script type="text/javascript">
                        document.getElementById("operation").innerHTML = "";
                        </script>';
                    }
                    if(array_key_exists('add_teacher', $_POST)){
                        echo '<form method="POST"> 
                        Name: <input type="text" name="name"> <br>
                        Surname: <input type="text" name="surname"> <br>
                        Phone number: <input type="text" name="phone" pattern="[0-9]{9}" required>  <br>
                        <h3>Creating account:</h3> <br>
                        Email: <input type="text" name="email"> <br>
                        Password: <input type="text" name="password"> <br>
                        <input type="submit" value="Submit" name="add_teacher_c">
                        </form>';
                    }
                    if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['phone']) && !empty($_POST['email']) && !empty($_POST['password']) && array_key_exists('add_teacher_c', $_POST)){
                        $name = $_POST['name'];
                        $surname = $_POST['surname'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        mysqli_query($conn,"INSERT INTO user (email,password,permission) VALUES ('$email','$password','teacher')");
                        $id = $conn->insert_id;
                        mysqli_query($conn,"INSERT INTO teacher (name,surname,phone,iduser) VALUES ('$name','$surname','$phone',$id)");
                        echo '<script type="text/javascript">
                        document.getElementById("operation").innerHTML = "";
                        </script>';
                    }
                    if(array_key_exists('add_class', $_POST)){
                        echo '<form method="POST">
                        Teacher: <select>';
                        $query = mysqli_query($conn,"SELECT name, surname, id_teacher FROM teacher");
                        while($row = mysqli_fetch_array($query)){
                            $idteacher = $row['id_teacher'];
                            $name = $row['name'];
                            $surname = $row['surname'];
                            echo "<option value='$idteacher'>$name $surname</option><br>";
                        }
                        echo '</select>
                        <br>Subject: <select>';
                        $query = mysqli_query($conn,"SELECT subject, id_subject FROM subjects");
                        while($row = mysqli_fetch_array($query)){
                            $id = $row['id_subject'];
                            $subject = $row['subject'];
                            echo "<option value='$id'>$subject</option><br>";
                        }
                        echo '</select>';
                        $query = mysqli_query($conn,"SELECT id_group FROM groups");
                        while($row = mysqli_fetch_array($query)){
                            $id = $row['id_group'];
                            $query1 = mysqli_query($conn,"SELECT name,surname FROM child WHERE id_group");
                        }
                        echo '<br> Groups: <br>';
                        while(){
                            
                            $name = $row['name'];
                            $surname = $row['surname'];
                            $pesel = $row['PESEL'];
                            echo "<hr> <input type='checkbox' value='YES' name=$idnew> $name $surname $pesel <br>";
                        }
                        echo '<input type="submit" value="Submit" name="add_class_c">
                        </form>';
                    }
            ?>
        </div>
    </div>
</body>
<script>
function clear_div() {
    document.getElementById("operation").innerHTML = "";
}
</script>
</html>