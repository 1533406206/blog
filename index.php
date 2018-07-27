<?php
$mysqli = new mysqli('localhost','root','root','blog');
$result = $mysqli->query('show tables');
$TableArray = [];
while($row = mysqli_fetch_assoc($result)){
    array_push($TableArray,$row['Tables_in_blog']);
}
$dataArray = [];
$j=0;
for($i=0; $i<count($TableArray); $i++){
    $result =  $mysqli->query('select * from '.$TableArray[$i]);
    while($rows = mysqli_fetch_assoc($result)){
        $dataArray[$i][$j] = $rows;
        $j++;
    }
    $j=0;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="tatol.css" type="text/css">
    <style>
        .top{
            width:90%;
            padding:20px 0;
            margin: 0px auto;
            text-align: center;
        }
        .content{
            width:90%;
            margin: 0px auto;
        }
        .contentDetail{
            margin: 0px auto 40px;
            width:70%;
            box-shadow:0px 5px 5px #fff;
        }
        .contentTop{
            margin: 5px 10px;
            font-size:18px;
            font-weight: bold;
        }
        .more{
            float:right;
            margin-right:50px;
        }

    </style>
    <title>主页</title>
</head>
<body>
<div class="top">
    <h1>欢迎来到我的博客系统</h1>
    <h2>您可以在这里编写和存储你所有的笔记和代码</h2>
    <h3><a href="Write.php">开始编写</a></h3>
</div>

<div class="content">
    <?php
    function addList($table,$tableName){
        $str = '';
        if(!$table){
            $table = [];
        }
       for($a=0; $a<count($table); $a++){
           // var_export($table);
           @ $str .= '<li><a href="Detail.php?type='.$tableName.'&id='.$table[$a]['id'].'">'.$table[$a]['name'].'</a></li>';
        }
       // echo $str;
        return $str;
    }
    //addList($dataArray[0]);
    for($i=0;$i<count($TableArray);$i++){
        switch ($TableArray[$i]){
            case 'codeofdaytable':
                 $name = '日代码';
                break;
            case 'thinkofdaytable':
                $name = '日总结';
                break;
            case "thinkofweektable":
                $name  = "周总结";
                break;
            case "learnofdaytable":
                $name = '日计划';
                break;
            case "learnofweektable":
                $name = '周计划';
                break;
        }
        echo '<div class="contentDetail">
        <span class="contentTop">'.$name.'</span>
        <a class="more" href="more.php?type='.$TableArray[$i].'">更多</a>
        <hr/>
        <ul>
            '. addList(@$dataArray[$i],$TableArray[$i]).'
        </ul>
        <hr/>
    </div>';
    }
    ?>
</div>

</body>
</html>