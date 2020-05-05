<?php /*a:1:{s:61:"C:\#ThinkPhp\thinkphp5\application\view\view\index\other.html";i:1588705182;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php echo htmlentities($name); ?>

<br>


    模板原样输出 {$name}
    <br>
    模板注释方法 {// $name} {/*$name*/}


<br>

<!--加载外置解析库-->


<span style='color: red;font-size: 15px'>
    外置解析库 - 测试
</span>

</body>
</html>