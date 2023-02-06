<?php
session_start();
include_once "config.php";
if(isset($_FILES)) {
    $successFiles = 0;
    $allowedTypes = array('text/csv');
    $uploadDir = "csv_files/";
    $filesCount = count($_FILES['file']['name']);
    for($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);
        $fileChecked[$i] = false;
//        echo $_FILES['file']['name'][$i]." | ".$_FILES['file']['type'][$i]." — ";
        for($j = 0; $j < count($allowedTypes); $j++) {
            if($_FILES['file']['type'][$i] == $allowedTypes[$j]) {
                $fileChecked[$i] = true;
                break;
            }
        }
        if($fileChecked[$i]) {
            $successFiles++;
        } else {
            echo basename($_FILES['file']['name'][$i]) . "- недопустимый формат \n";
        }

    }
    if($successFiles == $filesCount){
for($i = 0; $i < count($_FILES['file']['name']); $i++) {
    if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {
       /* $fileName = $uploadDir . basename($_FILES['file']['name'][$i]);
        $query = <<<eof
        LOAD DATA INFILE '$fileName'
        INTO TABLE tableName
        FIELDS TERMINATED BY '|' OPTIONALLY ENCLOSED BY '"'
        LINES TERMINATED BY '\n'
        (field1,field2,field3,etc) 
        eof;
        mysqli_query($conn, $query);*/


    } else {
        echo basename($_FILES['file']['name'][$i]) . " ошибка загрузки \n";
    }

}
        echo "success";
    }

}
?>
