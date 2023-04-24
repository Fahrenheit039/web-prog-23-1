<?php

function redirectToHome(): void
{
    header('Location: /');
    exit();
}

if (false === isset($_POST['surname'], $_POST['name'], $_POST['age'])) {
    redirectToHome();
}
session_start();
//<?php
//    if (false !== isset($_POST['surname'], $_POST['name'], $_POST['age'])) {
        $_SESSION["surname"] = $_POST['surname'];
        $_SESSION["name"] = $_POST['name'];
        $_SESSION["age"] = $_POST['age'];
//    }

if (isset($_SESSION["surname"], $_SESSION["name"], $_SESSION["age"]))
{
    $surname = $_SESSION["surname"];
    $name = $_SESSION["name"];
    $age = $_SESSION["age"];
    echo "Surname: $surname <br> Name: $name <br> Age: $age <br>";

//    echo "Session ID: $_COOKIE['PHPSESSID']";
//        . "<br>" . "Session name:" . $_COOKIE[""];
}
echo session_id() ."<br>";
echo session_name() ."<br>";
session_destroy();

//Session name:  echo session_name()

//redirectToHome();


