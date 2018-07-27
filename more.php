<?php
if(@$_REQUEST['type'] == ''){
    @header('Location:index.php');
}
$mysqli = new mysqli('localhost','root','root','blog');
$reuslt =  $mysqli->query("select * from ".$_REQUEST['type']);
$dataArray = [];
$i = 0;
while($row = mysqli_fetch_assoc($reuslt)){
    array_push($dataArray,$row);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>more</title>
    <link rel="stylesheet" href="tatol.css">
    <style>
        .top{
            width:80%;
            text-align: center;
            font-size: 50px;
            margin:0px auto;
            padding:20px;
        }
        .content{
            width:80%;
            margin:0px auto;
            text-align: left;

        }
        ul{
            list-style: none;
            border:1px solid red;
        }
        ul li{
            margin:10px 0px;
            padding:10px;
        }
        ul li:first-child{
            font_size:60px;
        }
        .first_child{
            font-size: 20px;
            font_weight:bold;
        }
        li span{
            float:right;
        }
    </style>
</head>
<body>
<div class="top"><?php
        switch($_REQUEST['type']){
                    case 'codeofdaytable':
                            echo "日代码";
                        break;
                    case 'thinkofdaytable':
                            echo "日总结";
                         break;
                    case "thinkofweektable":
                            echo "周总结";
                        break;
                    case "learnofdaytable":
                            echo "日计划";
                        break;
                    case "learnofweektable":
                            echo "周计划";
                        break;

        }
    ?>
</div>
<div class="content">
    <?php
        for($i=0; $i<count($dataArray); $i++){
             echo "<ul>
                <li class='first_child'>".$dataArray[$i]['name']."<span>撰写时间：".$dataArray[$i]['Wtime']."</span></li>
                <li>".$dataArray[$i]['content']."</li>
                
                   </ul>";
        }
    ?>
</div>
</body>
</html>
