<?php
$mysqli = new mysqli('localhost','root','root','blog');
$result = $mysqli->query('show tables');
$TableArray = [];
while($row = mysqli_fetch_assoc($result)){
    array_push($TableArray,$row['Tables_in_blog']);
}
for($i=0; $i<count($TableArray); $i++){
    $mysqli->query("drop table ".$TableArray[$i]);
}
