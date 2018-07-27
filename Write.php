<?php
//查询数据苦中的表的数量，生成导航目录
$mysqli = new mysqli('localhost','root','root','blog');
$result = $mysqli->query('show tables');
$TableArray = [];
while($row = mysqli_fetch_assoc($result)){
    array_push($TableArray,$row['Tables_in_blog']);
}
//var_export($TableArray);
/*
 * 此函数生成编写文章选择列表
 * @param $TableArray array 有多少张表就生成多少项
 * return string
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Write</title>
    <link rel="stylesheet" href="tatol.css" type="text/css">
    <style>
        .top{
            width:90%;
            margin: 0 auto;
            text-align: center;
        }
        .content{
            width:90%;
            margin: 20px auto;
            text-align: center;
        }
        ul{
            width:80%;
            list-style: none;
            overflow: hidden;
            margin:20px auto;
        }
        ul li{
            float:left;
            margin:0px 20px;
            padding:10px 20px;
            text-align: left;
            background: blue;
        }
        ul li:hover{
            cursor: pointer;
        }
        .contentDetail{
            width:80%;
            margin:0px auto;
            box-sizing: border-box;
        }
        .content input{
            width:40%;
            height:30px;
            margin:10px;
        }
        .content textarea{
            width:100%;
            height:300px;
            font-size:20px;
            margin:10px;
        }
        #handle{
            width:20%;
            height:50px;
            font-size:26px;
            font-weight:bold;
        }
    </style>

</head>
<body>
<div class="top"><h1>编写页面</h1></div>
<div class="content">
    <ul>
        <?php
        function addNav($TableArray){
            $str = '';
            for ($i = 0; $i < count($TableArray); $i++) {
                switch($TableArray[$i]){
                    case 'codeofdaytable':
                        $str .= '<li key="' . $i . '" onclick="viewTxt(this)" table="' . $TableArray[$i] .'">' . "日代码" . '</li>';
                        break;
                    case 'thinkofdaytable':
                        $str .= '<li key="' . $i . '" onclick="viewTxt(this)" table="' . $TableArray[$i] .'">' . "日总结" . '</li>';
                        break;
                    case "thinkofweektable":
                        $str .= '<li key="' . $i . '" onclick="viewTxt(this)" table="' . $TableArray[$i] .'">' . "周总结" . '</li>';
                        break;
                    case "learnofdaytable":
                        $str .= '<li key="' . $i . '" onclick="viewTxt(this)" table="' . $TableArray[$i] .'">' . "日计划" . '</li>';
                        break;
                    case "learnofweektable":
                        $str .= '<li key="' . $i . '" onclick="viewTxt(this)" table="' . $TableArray[$i] .'">' . "周计划" . '</li>';
                        break;
                }
            }
            return $str;
        }
        echo addNav($TableArray);
        ?>
<!--        <li key="1" onclick="viewTxt(this)">编写目录</li>-->
<!--        <li key="2" onclick="viewTxt(this)">编写目录</li>-->
<!--        <li key="3" onclick="viewTxt(this)">编写目录</li>-->
<!--        <li key="4" onclick="viewTxt(this)">编写目录</li>-->
<!--        <li key="5" onclick="viewTxt(this)">编写目录</li>-->
<!--        <li key="6" onclick="viewTxt(this)">编写目录</li>-->
<!--        <li key="7" onclick="viewTxt(this)">编写目录</li>-->
<!--        <li key="8" onclick="viewTxt(this)">编写目录</li>-->
    </ul>
<!--    <form action="form.php" class="contentDetail">-->
<!--        标题：<input class="title" type="text"/>-->
<!--              <br/>-->
<!--        内容：<br/>-->
<!--            <textarea name="" id="" cols="30" rows="10"></textarea>-->
<!--            <input id="handle" type="submit" value="保存"/>-->
<!--            <input id="handle" type="reset" value="重置"/>-->
<!--    </form>-->

</div>

</body>
<script>
    var content = document.getElementsByClassName('content')[0];
    var ul = document.getElementsByTagName('ul')[0];
    //console.log(ul);
    function viewTxt(e){
        console.log(e.innerHTML);
        console.log(e.getAttribute('key'));

        content.innerHTML = '    <ul>\n'  +
            ul.innerHTML +
            '    </ul>\n' +
            '    <form class="contentDetail" method="post" action="form.php">\n' +
               '<input name="table" value="'+e.getAttribute("table")+'" hidden>'  +
            '        标题：<input class="title" type="text" name="title"><br/>\n' +
            '        内容：<br/><textarea name="content" id="'+ e.getAttribute('key')+ '" cols="30" rows="10"></textarea>\n' +
            '            <button id="handle" type="submit">保存</button>\n' +
            '            <input id="handle" type="reset" value="重置"/>\n' +
            '    </form>'
    };
   // var li = document.getElementsByTagName('li');

   //  function addTxtToContent(str,that){
   //
   //      console.log(this)
   //
   //
   //      content.innerHTML = '<ul>\n' +
   //          '        <li key="1">编写目录</li>\n' +
   //          '        <li key="2">编写目录</li>\n' +
   //          '        <li key="3">编写目录</li>\n' +
   //          '        <li key="4">编写目录</li>\n' +
   //          '        <li key="5">编写目录</li>\n' +
   //          '        <li key="6">编写目录</li>\n' +
   //          '        <li key="7">编写目录</li>\n' +
   //          '        <li key="8">编写目录</li>\n' +
   //          '    </ul>\n' +
   //          '    <div class="contentDetail">\n' +
   //          '        标题：<input class="title" type="text"><br/>\n' +
   //          '        内容：<br/><textarea name="" id="" cols="30" rows="10"></textarea></div>\n' +
   //          '            <input id="handle" type="submit" value="保存"/>\n' +
   //          '            <input id="handle" type="reset" value="重置"/>\n' +
   //          '    </div>';
   //  }
   // // console.log(li);
   //  for(var i=0; i<li.length;i++) {
   //
   //      (function () {
   //          var that = this;
   //
   //              var clic = function(i){
   //              console.log(that);
   //
   //              console.log(i.target.getAttribute('key'));
   //              if(i.target.getAttribute('key') == '1'){
   //
   //                      //addTxtToContent(1,that);
   //                      //that.clic.call(this);
   //                      //console.log(this)
   //              }else if(i.target.getAttribute('key') == '2'){
   //                      addTxtToContent(2);
   //              }
   //          }
   //          li[i].onclick = clic;
   //      })(i);
   //
   //  }
</script>
</html>