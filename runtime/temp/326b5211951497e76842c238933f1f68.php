<?php /*a:1:{s:60:"C:\#ThinkPhp\thinkphp5\application\view\view\index\code.html";i:1589126436;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<!--<div><?php echo captcha_img(); ?></div>-->

<br>

<!--<div><img src="<?php echo captcha_src(); ?>" alt="captcha"></div>-->
<div><img src="../../code/index/show" alt="captcha"></div>

<!--<form action="../../code" method="post">-->
<form action="../../code/index/check" method="post">
    <input type="text" name="code">
    <input type="submit" value="提交">
</form>

</body>
</html>