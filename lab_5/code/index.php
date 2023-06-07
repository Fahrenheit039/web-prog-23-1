<?php
function folder_empty($path): bool
{
    if(count(scandir($path))==2)
        return True;
    else
        return False;
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
    <div id="form">
        <form action="save.php" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" required>


            <label for="category">Category</label>
            <select name="category" required>
                <?php $arrDir = array(); ?>
                <?php $dir = opendir('categories/'); ?>
                <?php while($file = readdir($dir)): ?>
                    <?php $tmp = 'categories/'.$file; ?>
                    <?php if (is_dir($tmp) && $file != '.' && $file != '..'): ?>
                        <?php echo $file."\n"; ?>
                        <?php $arrDir[$tmp] = $file; ?>
                        <option value=<?php echo $tmp ?> > <?php echo $file?> </option>
                    <?php endif ?>
                <?php endwhile; ?>
<!--                --><?php //echo "\n"; print_r($arrDir); ?>
            </select>


            <label for"title">Title</label>
            <input type="text" name="title" required>

            <label for="description">Description</label>
            <textarea name="description" rows="3"></textarea>

            <input type="submit" value="Save">

        </form>
    </div>
    <div id="table">
        <table>
            <thead>
                <th>Category</th>
                <th>Email</th>
                <th>Title</th>
                <th>Description</th>
            </thead>
            <tbody>

                <?php foreach ($arrDir as $item => $value): ?>

                    <?php
                        $directory = './'.$item; // эту строчку я рожал 2 часа. у '' и "" сильно разные смыслы
                        $scanned_directory = array_diff(scandir($directory), array('..', '.'));
//                        print_r($scanned_directory);
                    ?>

                    <?php foreach ($scanned_directory as $anotherEmail): ?>
                        <?php
                            $tmpDir = "";
                            if(is_dir($directory.'/'.$anotherEmail))
                            {
                                $tmpDir = $directory.'/'.$anotherEmail;
                                $scanned_one_more = array_diff(scandir($tmpDir), array('..', '.'));
//                                print_r($scanned_one_more);
                            }
//                            echo $tmpDir ."\n";
                            if (empty($tmpDir)) continue;
                            if (folder_empty($tmpDir)) continue;

                        ?>

                        <?php foreach ($scanned_one_more as $anotherTitle): ?>

                            <?php
                                if (!file_exists($tmpDir.'/'.$anotherTitle))
                                    continue;
                            ?>

                            <tr>
                                <td><?php echo $value ?></td> <!-- Category /-->
                                <td><?php echo $anotherEmail ?></td> <!-- Email /-->
                                <td><?php echo $anotherTitle ?></td> <!-- Title /-->
                                <td><?php echo file_get_contents($tmpDir.'/'.$anotherTitle) ?></td>
                            </tr>

                        <?php endforeach; ?>

                    <?php endforeach; ?>

                <?php endforeach; ?>
            </tbody>

        </table>


    </div>
</body>
</html>