<?php
    $connect=mysqli_connect('localhost','appuser','debian','Informatii');
    if(!$connect)
        die(mysqli_connect_error());
    $createTable="CREATE TABLE IF NOT EXISTS user(
        nume varchar(100) NOT NULL,
        varsta int NOT NULL,
        inaltime float NOT NULL ,
        gen varchar(2) NOT NULL,
        greutateaA float NOT NULL,
        greutateaB float NOT NULL,
        nivel varchar(25) NOT NULL,
        email varchar(100) NOT NULL,
        password varchar(100) NOT NULL,
        PRIMARY KEY (email) )";
        mysqli_query($connect,$createTable);
?>
