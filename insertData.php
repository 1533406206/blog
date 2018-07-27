<?php
$mysqli = new mysqli('localhost','root','root','blog');

$insertData_CodeOfDayTable = "insert into codeofdaytable(name,content,Wtime) value('草稿','没有什么特殊的内容',now())";
$insertData_LearnOfDayTable = "insert into learnofdaytable(name,content,Wtime) value('草稿','没有什么特殊的内容',now())";
$insertData_LearnOfWeekTable = "insert into learnofweektable(name,content,Wtime) value('草稿','没有什么特殊的内容',now())";
$insertData_ThinkOfDayTable = "insert into thinkofdaytable(name,content,Wtime) value('草稿','没有什么特殊的内容',now())";
$insertData_ThinkOfWeekTable = "insert into thinkofweektable(name,content,Wtime) value('草稿','没有什么特殊的内容',now())";
$mysqli->query($insertData_CodeOfDayTable);
$mysqli->query($insertData_LearnOfDayTable);
$mysqli->query($insertData_LearnOfWeekTable);
$mysqli->query($insertData_ThinkOfDayTable);
$mysqli->query($insertData_ThinkOfWeekTable);