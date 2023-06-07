<?php
require __DIR__ . '/vendor/autoload.php';

$client = new Google_Client();
$client->setApplicationName('Google Sheets in PHP');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$range = 'A1:D100';
$data = [
    [
        'Categories',
        'Title',
        'Content',
        'E-mail'
    ]
];

$values = new Google_Service_Sheets_ValueRange([
    'values' => $data
]);

$options = [
    'valueInputOption' => 'RAW'
];

$spreadsheetId = '1_TVcSEEVRLp94lFNTfxGKsB22IpocAQtNnRWrm_XWuk';

$service->spreadsheets_values->update($spreadsheetId, $range, $values, $options);

//$response = $service->spreadsheets_values->get($spreadsheetId, $range);
//var_dump($response->getValues());

if (!is_dir('categories')) {
    mkdir('categories', 0777, true);
} else {
    $permissions = substr(decoct(fileperms('categories')), -3);
    if (0 != strcmp($permissions, '777')){
        chmod('categories', 0777);
    }
}

function arrToStr ($arr, $sep = " ") {
    $str = "";
    foreach ($arr as $elem) {
        $str .= $elem . $sep;
    }
    return $str;
}

function getFiles($dir) {
    $files = array_diff(scandir($dir), ['..', '.']);
    $result = [];
    foreach ($files as $file) {
        $path = $dir . '/'. $file;
        if (is_dir($path)) {
            $result = array_merge($result, getFiles($path));
        } else {
            array_push($result, $path);
        }
    }
    return $result;
}

$files = getFiles('categories');
foreach ($files as $key => $file) { //$files[] = categ/email/title
    if (substr_count($file, '/') != 3) {
        unset($files[$key]);
    }
}
sort($files);

foreach ($files as $key => $file) {
    $files[$key] = substr($file, strlen('categories')+1);
}

//var_dump($files);

function convertArrayToAdArray($array) {
    $adArray = [];
    foreach ($array as $key => $value) {
        $content = file_get_contents('categories/' . $value);
        //var_dump('./'.$value);
        $tmp = preg_split("/\//", $value);
        $adItem = [];
        array_push($adItem, $tmp[0]);
        array_push($adItem, explode('.', $tmp[2])[0]);
        array_push($adItem, $content);
        array_push($adItem, $tmp[1]);
        array_push($adArray, $adItem);
    }
    return $adArray;
}

$adArr = convertArrayToAdArray($files);
// #EndRegion php
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
                <?php
                foreach ($adArr as $keyAdArr => $ad) {
                    $tmpArr = [];
                    foreach ($ad as $value) {
                        array_push($tmpArr, $value);
                    }
                    array_push($data, $tmpArr);
                }
                $values = new Google_Service_Sheets_ValueRange([
                    'values' => $data
                ]);
                $service->spreadsheets_values->update($spreadsheetId, $range, $values, $options);
                if (isset($_POST['btn'])) {
                    switch ($_POST['btn']) {
                        case 'Add': //our button

                            if($_POST['email'] && $_POST['category'] && $_POST['header'] && $_POST['content']) {
                                if (!is_dir('categories/' . $_POST['category'] . '/' . $_POST['email'])) {
                                    mkdir('categories/' . $_POST['category'] . '/' . $_POST['email'], 0777, true);
                                }
                                $fp = fopen('categories/' . $_POST['category'] . '/' . $_POST['email'] . '/' . $_POST['header'] . '.txt', 'w+');
                                fwrite($fp, $_POST['content']);
                                fclose($fp);
                                $tmpArr = [];
                                array_push($tmpArr, $_POST['category']);
                                array_push($tmpArr, $_POST['header']);
                                array_push($tmpArr, $_POST['content']);
                                array_push($tmpArr, $_POST['email']);
                                array_push($data, $tmpArr);
                                $values = new Google_Service_Sheets_ValueRange([
                                    'values' => $data
                                ]);
                                $service->spreadsheets_values->update($spreadsheetId, $range, $values, $options);
                                echo 'you can show it <a href="https://docs.google.com/spreadsheets/d/1_TVcSEEVRLp94lFNTfxGKsB22IpocAQtNnRWrm_XWuk/edit?usp=sharing">here</a>';
                            }
                    }
                }
                ?>
            </div>

        </div>
    </body>
</html>