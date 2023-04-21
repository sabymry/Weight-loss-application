<?php
    require_once("connection.php");
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>DOIT</title>
</head>
<body background='doit.jpg'link="#fff"vlink="#fff"alink="#fff" >
    <?php
        $email=$_GET['email'];
        $sql ="select * from user where email = '$email'";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_assoc($result);
    ?>
    <font color="#fff">
        <center>
            <h1>DO IT</h1>
            <br><br><br><br>
            <table>
                <thead>
                    <tr>
                        <th>Numele</th>
                        <th>Varsta</th>
                        <th>Inaltime</th>
                        <th>Greutatea ta</th>
                        <th>Greutatea dorita</th>
                        <th>Nivel</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <form action="home.php" method="post">
                        <tr>
                            <td>
                                &#160;&#160;
                                <input type="text" name="varsta" value="<?php echo $row['nume'] ?>" readonly>
                            </td>
                            <td>
                                &#160;&#160;
                                <input type="text" name="varsta" value="<?php echo $row['varsta'] ?>" readonly>
                            </td>
                            <td>    
                                &#160;&#160;
                                <input type="text" name="inaltime"value="<?php echo $row['inaltime']?>"readonly>
                            </td>
                            <td>
                                &#160;&#160;    
                                <input type="text" name="ga" value="<?php echo $row['greutateaA'] ?>"readonly>
                            </td>
                            <td>    
                                &#160;&#160;
                                <input type="text" name="gb" value="<?php echo $row['greutateaB'] ?>"readonly>
                            </td>
                            <td>    
                                &#160;&#160;
                                <input type="text" name="gb" value="<?php echo $row['nivel'] ?>"readonly>
                            </td>
                            <td>
                                &#160;&#160;
                                <input type="submit" name='del' value="Sterge">
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table><br> <br> <br>
            <?php
                if(!isset($_POST['del']))
                {    
            ?>
            <br><br><br>
            <table>
                <thead>
                    <tr>
                        <th>Caloriile&#160;&#160;</th>
                        <th> Zile&#160;&#160;</th>
                        <th>Exercitii</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php
                                if($row['gen']=="M")
                                    $bmr = 88.36+(13.4*$row['greutateaA'])+(4.8*$row['inaltime'])-(5.7*$row['varsta']);
                                else
                                    $bmr = 447.6+(9.2*$row['greutateaA'])+(3.1*$row['inaltime'])-(4.3*$row['varsta']);
                                switch($row['nivel'])
                                {

                                    case "Incepator":
                                        $cal = $bmr*1.2;
                                        break;
                                    case "Mediu":
                                        $cal = $bmr*1.6;
                                        break;
                                    default:
                                        $cal = $bmr*1.8;
                                        break;
                                }
                                echo $cal-350;
                            ?>
                        </td>
                        <td>
                            <?php echo ($row['greutateaA']-$row['greutateaB'])*3.5." de zi"?>
                        </td>
                        <td>
                            &#160;&#160;&#160;
                            <?php
                                if($row['gen']=="M")
                                {
                                    switch($row['nivel'])
                                    {

                                        case "Incepator":
                                            echo"<a href='https://youtu.be/9WMMVQ6Z_Bc'>&#160;&#160;EX1</a>";
                                            break;
                                        case "Mediu":
                                            echo"<a href='https://youtu.be/IeGrTqW5lek'> EX2 </a>";
                                            break;
                                        case "Avansat":
                                            echo"<a href='https://youtu.be/-YpRYNREDV8'> EX3 </a>";
                                            break;
                                    }
                                }
                                else
                                {
                                    switch($row['nivel'])
                                    {
                                        case "Incepator":
                                            echo"<a href='https://youtu.be/UItWltVZZmE'>EX1</a>";
                                            break;
                                        case "Mediu":
                                            echo"<a href='https://youtu.be/TwDp5bZUVxY'>EX2</a>";
                                            break;
                                        case "Avansat":
                                            echo"<a href='https://youtu.be/-YpRYNREDV8'>EX3</a>";
                                            break;
                                    }
                                }
                            ?>
                            &#160;&#160;&#160;
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
                }
                else
                {
                    $del="delete from user where email = '$email' ";
                    mysqli_query($connect,$del);
                }
            ?>
            <br><br><br>
            <button>
                <a href="?out=1">Logout</a>
            </button>    
            <?php
                if(isset($_GET['out']))    
                    header("location:index.php");

            ?>
        </center>
    </font>
</body>
</html>
