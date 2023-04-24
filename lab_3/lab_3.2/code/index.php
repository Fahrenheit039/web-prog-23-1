<?php
    function redirectToHome(): void
    {
        header('Location: /');
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>site</title>
</head>
<body>
    <div id="form1">
        <form action="index.php" method="post">
<!--            method="post"-->

            <label for="title">Enter Some Text</label>
            <input type="text" name="someTextArea"></input>

            <input type="submit" value="send">
        </form>
        <?php
            $letters = 0;
            $words = 0;
            if (false !== isset($_POST['someTextArea'])) {
                $text = $_POST['someTextArea'];
                $letters = strlen($text);
                $words = count(explode(" ", $text));
            }
        ?>
        <br>
        Words: <?php echo $words ?>
        Letters: <?php echo $letters ?>
        <br>
    </div>
    <br>======================================================================<br><br>
    <div id="form2">
<!--        <php session_start(); ?>-->

        <form action="other_page.php" method="post">
            <label for"title">Data for session:</label>
            <br>
            <label for="surname">Surname:</label>
            <input type="text" name="surname">
            <label for="name">Name:</label>
            <input type="text" name="name">
            <label for="age">Age:</label>
            <input type="text" name="age">
            <input type="submit" value="check_it_on_the_other_page">
        </form>
    </div>
    <br>======================================================================<br><br>
    <div id="form3">

        <form action="other_page2.php" method="post">
            <label for"title">Data for session:</label>
            <br>
            <label for="name">Name:</label>
            <input type="text" name="name">
            <label for="age">Age:</label>
            <input type="text" name="age">
            <label for="salary">Salary:</label>
            <input type="text" name="salary">
            <label for="color">Color:</label>
            <input type="text" name="color">
            <input type="submit" value="check_it_on_the_other_page_2">
        </form>
    </div>
</body>
</html>