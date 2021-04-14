<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="inventory.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>



<?php
// <!-- funcs.phpの読み込み -->
    require_once("funcs.php");

// 前ページからの変数の受け取り
    session_start();
    $model_num = $_SESSION['model_num'];
    
?>

<h1>商品ID<?=$model_num?>を削除しました</h1>
<div class="btn-wrapper">
    <a href="index.php" class="link">トップページへ戻る</a>
</div>

</body>
</html>
