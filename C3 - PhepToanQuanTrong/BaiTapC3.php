<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a = 12;

    if ($a >= 0 && $a % 2 === 0) {
        ++$a;
    }
    ?>
    <p>
        Kết quả số nguyên dương chẵn là: <?php echo $a ?> 
    </p>
</body>

</html>