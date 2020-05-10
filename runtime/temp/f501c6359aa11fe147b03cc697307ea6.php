<?php /*a:1:{s:63:"C:\#ThinkPhp\thinkphp5\application\upload\view\index\index.html";i:1589091925;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
单文件上传
<form action="./upload" method="post" enctype="multipart/form-data">
    <input type="hidden" name="__token__" value="<?php echo htmlentities(app('request')->token()); ?>">
    <input type="file" name="image">
    <input type="submit" value="提交">
</form>


多文件上传
<form action="./uploads" method="post" enctype="multipart/form-data">
    <input type="hidden" name="__token__" value="<?php echo htmlentities(app('request')->token()); ?>">
    <input type="file" name="image[]">
    <br>
    <input type="file" name="image[]">
    <br>
    <input type="file" name="image[]">
    <br>
    <input type="submit" value="提交">
</form>
</body>
</html>