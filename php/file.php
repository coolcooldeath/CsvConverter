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
    // получение пути к файлу



    $filesCount = count($_FILES['file']['name']);
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
        $uploadFile[$i] = $uploadDir . basename($_FILES['file']['name'][$i]);
        $fileChecked[$i] = false;
        for ($j = 0; $j < count($allowedTypes); $j++) { // проверка файла на соответствие типу
            if ($_FILES['file']['type'][$i] == $allowedTypes[$j]) {
                $fileChecked[$i] = true;
                break;
            }
        }
        if ($fileChecked[$i]&&move_uploaded_file($_FILES['file']['tmp_name'][$i], $uploadFile[$i])) {// сохранение в папку

            if(isDepartmentFile($uploadFile[$i])||isUserFile($uploadFile[$i])){// проверка на соответсвие структуре файла
                $successFiles++;
            }
            else
                echo "Структура файлов неверна";
        } else {
            echo basename($_FILES['file']['name'][$i]) . "- недопустимый формат \n";
        }




    }

    $filesInDb=0;
    if ($successFiles == $filesCount) {
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $fileName = $path . "csv_files/" . basename($_FILES['file']['name'][$i]);


            if(isDepartmentFile($fileName)){
                print_r(isDepartmentFile($fileName)); //загружаю данные в бд указав разделитель ;
                // первую строку игнорируем, строку с именанми столбцов
                $query = "LOAD DATA INFILE '$fileName' 
                 INTO TABLE departments 
                 FIELDS TERMINATED BY ';' 
                 LINES TERMINATED BY '\n' 
                 IGNORE 1 LINES";

                if(mysqli_query($conn,$query))
                    $filesInDb++;
                else
                    echo mysqli_error($conn) . "\n";
            }

            if(isUserFile($fileName)){
                $query = "LOAD DATA INFILE '$fileName'
                 INTO TABLE users
                 FIELDS TERMINATED BY ';' 
                 LINES TERMINATED BY '\n' 
                 IGNORE 1 LINES";

                if(mysqli_query($conn,$query))
                    $filesInDb++;
                else
                    echo mysqli_error($conn) . "\n";
            }

        }
    }
    echo "Uploaded " . $filesInDb . " files";
}

function isUserFile($fileName){ // проверяю имена столбцов на соответсвие

    $fileContentArray= explode(";",file_get_contents($fileName));

    $passwordStr = substr($fileContentArray[10],0,8);
    if($fileContentArray[0]=="XML_ID"&&$fileContentArray[1]="LAST_NAME"&&$fileContentArray[2]="NAME"
    &&$fileContentArray[3]=="SECOND_NAME" &&$fileContentArray[4]=="DEPARTMENT" &&$fileContentArray[5]=="WORK_POSITION"
                &&$fileContentArray[6]=="EMAIL" &&$fileContentArray[7]=="MOBILE_PHONE" &&$fileContentArray[8]=="PHONE"
                &&$fileContentArray[9]=="LOGIN" && $passwordStr=="PASSWORD")
        return true;
    else
        return false;

}

function isDepartmentFile($fileName){ // проверяю имена столбцов на соответсвие
    $fileContentArray= explode(";",file_get_contents($fileName));
   $departmentStr = substr($fileContentArray[2],0,15);
    if($fileContentArray[0]=="XML_ID"&&$fileContentArray[1]=="PARENT_XML_ID"&&$departmentStr=="NAME_DEPARTMENT")
        return true;
    else
        return false;


}
?>
