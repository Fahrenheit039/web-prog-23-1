<?php

function redirectToHome(): void
{
    header('Location: /');
    exit();
}

function write_arr($array): void
{
    foreach($array as $i => $v){
//        echo "$i = $v .\n";
        echo "<li><ul>$v</ul></li>";
    }
    echo "<br>";
    return;
}

if (false === isset($_POST['name'], $_POST['age'], $_POST['salary'], $_POST['color'])) {
    redirectToHome();
}

session_start();

$_SESSION["userdata"] = array($_POST['name'], $_POST['age'], $_POST['salary'], $_POST['color']);

if (isset($_SESSION["userdata"]))
{
//    foreach ($_SESSION["userdata"] as list($item)) {
//        echo "[$item] .\n";
//    }
    write_arr($_SESSION["userdata"]);
//    $name = $_SESSION["name"];
//    $age = $_SESSION["age"];
//    echo "Surname: $surname <br> Name: $name <br> Age: $age <br>";

//    echo "Session ID: $_COOKIE['PHPSESSID']";
//        . "<br>" . "Session name:" . $_COOKIE[""];
}
echo session_id() ."<br>";
echo session_name() ."<br>";
//session_destroy();

//Session name:  echo session_name()

//redirectToHome();


