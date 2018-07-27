<?php
$mysqli = new mysqli("localhost",'root','root','blog');
$query = 'insert into '.$_POST['table'].
    '(`name`,`content`,`Wtime`) values('.'"'.
    $_POST['title'].'"'.','
    .'"'.$_POST['content'].'"'.','
    .'now());';

//var_export($_POST);
if($mysqli->query($query)){
    echo "ok";
    header("Location:index.php");
}else{
    echo $query;
}