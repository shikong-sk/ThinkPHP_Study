<?php /*a:5:{s:61:"C:\#ThinkPhp\thinkphp5\application\view\view\index\block.html";i:1588696223;s:79:"C:\#ThinkPhp\thinkphp5\application\view\view\..\..\view\view\public\layout.html";i:1588696208;s:63:"C:\#ThinkPhp\thinkphp5\application\view\view\public\header.html";i:1588695488;s:60:"C:\#ThinkPhp\thinkphp5\application\view\view\public\nav.html";i:1588692695;s:63:"C:\#ThinkPhp\thinkphp5\application\view\view\public\footer.html";i:1588691821;}*/ ?>
LayOut
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php if(!(empty($title) || (($title instanceof \think\Collection || $title instanceof \think\Paginator ) && $title->isEmpty()))): ?><?php echo htmlentities($title); ?><?php endif; ?></title>
    <meta name="keywords" content='<?php if(!(empty($keywords) || (($keywords instanceof \think\Collection || $keywords instanceof \think\Paginator ) && $keywords->isEmpty()))): ?><?php echo htmlentities($keywords); ?><?php endif; ?>'>

<!--    <link rel="stylesheet" type="text/css" href="../../static/css/test.css" />-->
    <link rel="stylesheet" type="text/css" href="../../static/css/test.css" />
</head>
<body>

头部
<hr>内容部分





主体

<hr>

尾部

</body>
</html>