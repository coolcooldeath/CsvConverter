<?php
include 'config.php';
$query = "SELECT * FROM `users` WHERE 1";
$result = mysqli_query($conn,$query);// запрос к базе для отображения в таблице на странице
$jsonNormalize =[];
while($row = mysqli_fetch_array($result)){
    $json[] = $row;// сохранение каждой строки запроса
}


for($i=0;$i<count($json);$i++){
    $jsonNormalize[] = [$json[$i][0],$json[$i][1],$json[$i][2],$json[$i][3]
        ,$json[$i][4],$json[$i][5],$json[$i][6],$json[$i][7],$json[$i][8],$json[$i][9]
        ,$json[$i][10]];
    //лучше способа не придумал, брать чужие не хотел,
    // создание массива только со значениями

}


if($jsonNormalize) {
    echo json_encode($jsonNormalize);// отправление ответа в json
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

