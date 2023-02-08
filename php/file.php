<?php
include 'config.php';
ini_set('error_reporting', E_ALL);
if(isset($_FILES)) {
    $successFiles = 0;
    $allowedTypes = array('text/csv');
    $uploadDir = "csv_files/";

    $path = "";
    $pieces = explode("/", $_SERVER['SCRIPT_FILENAME']);
    for($i=0;$i<count($pieces)-1;$i++)
        $path = $path . $pieces[$i] ."/";



    $filesCount = count($_FILES['file']['name']);
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);
        $fileChecked[$i] = false;
        for ($j = 0; $j < count($allowedTypes); $j++) {
            if ($_FILES['file']['type'][$i] == $allowedTypes[$j]) {
                $fileChecked[$i] = true;
                break;
            }
        }
        if ($fileChecked[$i]&&move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {
            $successFiles++;
        } else {
            echo basename($_FILES['file']['name'][$i]) . "- недопустимый формат \n";
        }

    }


    if ($successFiles == $filesCount) {
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $fileName = $path . "csv_files/" . basename($_FILES['file']['name'][$i]);
            $query = "LOAD DATA INFILE '$fileName'
                 INTO TABLE departments 
                 FIELDS TERMINATED BY ';' 
                 LINES TERMINATED BY '\n' 
                 IGNORE 1 LINES";

           if(mysqli_query($conn,$query))
               echo "true";
           else
               echo mysqli_error($conn) . "\n";
        }
    }
}
?>
