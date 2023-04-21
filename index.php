<?php
    require_once('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DOIT</title>
</head>
<body background='doit.jpg'link="#fff"vlink="#fff"alink="#fff">
    <font color="#fff">
        <center>
            <br><br><br><br><br>
            <h1>DO IT</h1>
            <form action="index.php" method="POST">
                <input type="email" name='email' placeholder='Email'autocomplete='off' required>
                <br><br>
                <input type="password" name='password' placeholder='password' autocomplete='off' required>
                <br><br>
                <input type="submit" name='log' value="Log in">
            </form>
        <p> You don't have an account? <a href="register.php"> Register</a></p> 
        <br>
        <br>
        <?php
                if(isset($_POST['log']))
                {
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $sql="select email, password from user;";
                    $result=mysqli_query($connect,$sql);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        if($email==$row['email'] &&  $password==$row['password'])
                        {    
                            header("location:home.php?email=$email");
                            break;

                        }
                    }
                }
            ?>
        </center>
    </font>
</body>
</html>
