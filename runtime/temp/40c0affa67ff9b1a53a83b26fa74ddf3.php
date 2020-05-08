<?php /*a:1:{s:63:"C:\#ThinkPhp\thinkphp5\application\verify\view\index\token.html";i:1588963621;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="./checkToken"method="post">
    <input type="hidden" name="__token__" value="<?php echo htmlentities(app('request')->token()); ?>">
    <input type="text" name="user">
    <input type="submit" value="提交">
</form>
</body>
</html>