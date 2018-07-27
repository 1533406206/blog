<?php
//判断如果请求没有带参数，就跳会主页
if(@$_REQUEST['id']==''){
    @header('Location:index.php');
}
/*根据请求参数查询数据
 * $_REQUEST['type']  要查询的表
 * $_REQUEST['id']    要查询的id
 * 返回一条数据
 */
$mysqli = new mysqli('localhost','root','root','blog');
$result = $mysqli->query('select * from '.$_REQUEST['type']." where id=".$_REQUEST['id']);
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    <link rel="stylesheet" href="tatol.css">
    <style>
        .top{
            width:90%;
            margin:0px auto;
            text-align: center;
        }
        .content{
            width:80%;
            margin:50px auto;
        }
    </style>
</head>
<body>
<div class="top">
    <h1><?php echo $row['name'];?></h1>
    撰稿时间：<i><?php echo $row['Wtime'];?></i>
</div>
<div class="content"><?php echo $row['content'];?></div>
</body>
</html>

