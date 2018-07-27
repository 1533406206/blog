<?php

$mysqli = new mysqli('localhost','root','root','blog');
$codeOfDayTabel = "create table codeOfDayTable(
                          id int primary key auto_increment,
                          name varchar(100) not null,
                          content text not null,
                          Wtime DateTime not null
);";

$thinkOfDayTable = "create table thinkOfDayTable(
                          id int primary key auto_increment,
                          name varchar(100) not null,
                          content text not null,
                          Wtime DateTime not null
);";
$thinkOfWeekTable = "create table thinkOfWeekTable(
                          id int primary key auto_increment,
                          name varchar(100) not null,
                          content text not null,
                          Wtime DateTime not null
);";
$learnOfDayTable = "create table learnOfDayTable(
                          id int primary key auto_increment,
                          name varchar(100) not null,
                          content text not null,
                          Wtime DateTime not null
);";
$learnOfWeekTable = "create table learnOfWeekTable(
                          id int primary key auto_increment,
                          name varchar(100) not null,
                          content text not null,
                          Wtime DateTime not null
);";

$mysqli->query($codeOfDayTabel);
$mysqli->query($thinkOfDayTable);
$mysqli->query($thinkOfWeekTable);
$mysqli->query($learnOfDayTable);
$mysqli->query($learnOfWeekTable);