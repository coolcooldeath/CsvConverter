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
/*echo "<table>"; // start a table tag in the HTML

while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
    echo "<tr><td>" . htmlspecialchars($row['name']) . "</td><td>" . htmlspecialchars($row['age']) . "</td></tr>";  //$row['index'] the index here is a field name
}

echo "</table>"; //Close the table in HTML*/


mysqli_close($conn);

