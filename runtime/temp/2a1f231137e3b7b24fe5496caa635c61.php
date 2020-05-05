<?php /*a:1:{s:65:"C:\#ThinkPhp\thinkphp5\application\view\view\index\condition.html";i:1588666368;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<?php switch($num): case "1": ?>
        1
    <?php break; case "10":case "20":case "30": ?>
        10 | 20 | 30
    <?php break; default: ?> EXM?
<?php endswitch; ?>

<br>

$num = <?php echo htmlentities($num); ?> --

<br>
<?php $num = '10'; $num = $num-1; if(($num) && ($num%10 == 0)): ?>
    $num 为 10 的倍数
<?php else: ?>
    $num 不为 10 的倍数
<?php endif; ?>

<br>

$num = <?php echo htmlentities($num); ?>

$num = <?php echo $num = mt_rand(1,3); ?>

<br>

$num = <?php echo htmlentities($num); ?>

<br>

<?php if(($num % 2 == 0)): ?>
    $num 为 偶数
<?php elseif(($num == 1)): ?>
    $num == 1
<?php else: ?>
    $num 为 奇数
<?php endif; ?>

<br>

<?php $num = '10'; ?>

$num = <?php echo htmlentities($num); ?>

<br>

<?php if(in_array(($num), explode(',',"0,10,20"))): ?>
    $num 在 [0,10,20] 中
<?php endif; ?>

<br>

<?php $_RANGE_VAR_=explode(',',"50,100");if($num>= $_RANGE_VAR_[0] && $num<= $_RANGE_VAR_[1]):?>
    $num 在 50,100 之中
<?php else: ?>
    $num 不在 50,100 之中

<?php endif; ?>

<hr>

<?php if(isset($test)): ?>
    test 已定义
<?php else: ?>
    test 未定义
<?php endif; ?>

</body>
</html>