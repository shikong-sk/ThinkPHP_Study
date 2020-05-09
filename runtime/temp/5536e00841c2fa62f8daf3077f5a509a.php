<?php /*a:1:{s:61:"C:\#ThinkPhp\thinkphp5\application\page\view\index\index.html";i:1589051368;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="1">
    <tr>
        <th>学号</th>
        <th>姓名</th>
        <th>性别</th>
        <th>院系</th>
        <th>专业</th>
        <th>班级编号</th>
        <th>座号</th>
    </tr>

    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$obj): $mod = ($i % 2 );++$i;?>
    <tr>
        <td><?php echo htmlentities($obj['studentId']); ?></td>
        <td><?php echo htmlentities($obj['studentName']); ?></td>
        <td><?php echo htmlentities($obj['gender']); ?></td>
        <td><?php echo htmlentities($obj['departmentName']); ?></td>
        <td><?php echo htmlentities($obj['majorName']); ?></td>
        <td><?php echo htmlentities($obj['classId']); ?></td>
        <td><?php echo htmlentities($obj['seat']); ?></td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</table>

<style>
    .pagination,.pager{
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .pagination li,.pager li{
        display: inline-block;
        padding: 10px;
    }
</style>

<?php echo $data; ?>
<hr>

</body>
</html>