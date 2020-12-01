<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=dbalimentatec;charset=utf8','root','');
    $pdo-> setAttribute(PDO ::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $ex){
    echo "<script> alert('error...')</script>";
}