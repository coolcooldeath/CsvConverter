<?php
include 'config.php';
$query = "SELECT `XML_ID`, `PARENT_XML_ID`, `NAME_DEPARTMENT` FROM `departments` WHERE 1";
$result = mysqli_query($conn,$query);
$jsonNormalize =[];
while($row = mysqli_fetch_array($result)){
    $json[] = $row;
}


for($i=0;$i<count($json);$i++){
    $jsonNormalize[] = [$json[$i][0],$json[$i][1],$json[$i][2]];

}


if($jsonNormalize) {
    echo json_encode($jsonNormalize);
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);

