<?php
    require_once('connection.php');
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>DOIT</title>
</head>
<body background='doit.jpg' link="white" vlink="white" alink="white" >
    <font color="#fff">
        <center>
            <h1>DO IT</h1>
            <form action="register.php" method='post'>
                <input type="text"name="nume"placeholder="Nume si prenume"autocomplete='off'><br><br>
                <input type="text"name="varsta"placeholder="Varsta"autocomplete='off'><br><br>
                <input type="text"name="inaltime"placeholder="Inaltime"autocomplete='off'><br><br>
                <input type="text"name="ga"placeholder="Greutatea"autocomplete='off'><br><br>
                <input type="text"name="gb"placeholder="Greutatea ta"autocomplete='off'><br><br>
                <label>Gen</label>
                <select name="gen" >
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                </select>
                <label >Nivel</label>
                <select name="nivel" >
                    <option value="Incepator">Incepator</option>
                    <option value="Mediu">Mediu</option>
                    <option value="Avansat">Avansat</option>
                </select><br><br>
                <input type="email"name="email"placeHolder="Email"autocomplete='off'><br><br>
                <input type="password" name="password"placeHolder="Password"><br><br>
                <input type="submit" name='register' value="Register">
            </form>
            <p>You have an account? <a href="index.php">Log in</a></p>
        </center>
    </font>
</body>
</html>
<?php
if(isset($_POST['register']))
{
    $nume=$_POST['nume'];
    $varsta=$_POST['varsta'];
    $inaltime=$_POST['inaltime'];
    $ga=$_POST['ga'];
    $gb=$_POST['gb'];
    $gen=$_POST['gen'];
    $nivel=$_POST['nivel'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="INSERT INTO user(nume,varsta,inaltime,greutateaA,greutateaB,gen,nivel,email,password) VALUES('$nume','$varsta',$inaltime,$ga,$gb,'$gen','$nivel','$email','$password');";
    $result=mysqli_query($connect,$sql);   
    if($result)
        header("location:index.php");
    else
        header("location:register.php");
}
?>
