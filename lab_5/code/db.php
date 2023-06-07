<?php

//$mysqli = new mysqli('db', 'root', 123, 'web');
//
//if (mysqli_connect_errno()) {
//    printf('error code: %s', mysqli_connect_error());
//    exit;
//}
//
//$mysqli->query('INSERT INTO ad (email) VALUES ("qwert@qwert.com")');
//
//if ($result = $mysqli->query('SELECT * from ad')) {
//    print("Emails \n");
//
//    while($row = $result->fetch_assoc()) {
//        printf("%s \n", $row['email']);
//    }
//
//    $result->close();
//}
//$mysqli->close();

$host = 'db';
$db = 'web';
$user = 'root';
$pass = '123';
$dsn = "mysql:host=$host;dbname=$db";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt); //connect object
$stmt = $pdo->query('SELECT * FROM `ad`');
?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>site</title>
    <body>
        <div class="ad">
            <div class="form">
                <form action="" method="POST" class="adForm">
                    <div class="nameContainer">Email: <input type="text" name="email"></div>
                    <div class="surnameContainer">Category: <input type="text" name="category"></div>
                    <div class="ageContainer">Title: <input type="text" name="header"></div>
                    <div class="ageContainer">Content: <input type="text" name="content">
                    </div>
                    <input name="btn" type="submit" value="Add">
                </form>
            </div>
            <div class="adField">
                <div class="adItem">
                    <div class="idHeader">ID</div>
                    <div class="categoryHeader">Category</div>
                    <div class="headerHeader">Title</div>
                    <div class="textHeader">Text</div>
                    <div class="emailHeader">Email</div>
                    <div class="addTimeHeader">dataTime</div>
                </div>
                <?php
                while ($arrayOfRows = $stmt->fetch()) {
                    $tmpStr = '<div class="adItem">';
                    foreach ($arrayOfRows as $numOfRow => $row) {
                        $tmpStr .= "<div>" . $row . "</div>";
                    }
                    $tmpStr .= '</div>';
                    echo $tmpStr;
                }
                if (isset($_POST['btn'])) {
                    switch ($_POST['btn']) {
                        case 'Add':
                            if($_POST['email'] && $_POST['category'] && $_POST['header'] && $_POST['content']) {
                                $stmt = $pdo->prepare('INSERT ad (category, title, description, email) VALUES (:category, :title, :description, :email)');
                                $stmt->execute(array('category' => $_POST['category'], 'title' => $_POST['header'], 'description' => $_POST['content'], 'email' => $_POST['email']));
                            }
                    }
                }
                ?>

            </div>

        </div>
    </body>
</html>


