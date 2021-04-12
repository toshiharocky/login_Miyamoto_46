<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<?php
session_start();
$kanri_flg = "";
$life_flg = "";

switch ($_SESSION['kanri_flg']){
    case 0:
        $kanri_flg = "管理者";
        break;
    case 1:
        $kanri_flg = "スーパー管理者";
        break;
    }

switch ($_SESSION['life_flg']){
    case 0:
        $life_flg = "退社";
        break;
    case 1:
        $life_flg = "入社";
        break;
}

?>

<body>
    <h1>登録が完了しました</h1>
    <table id="table">
        <tr>
            <td class='table_left'>氏名</td>
            <td class='table_left'><?=$_SESSION['name']?></td>
        </tr>
        <tr>
            <td class='table_left'>ログインID</td>
            <td class='table_left'><?=$_SESSION['lid']?></td>
        </tr>
        <tr>
            <td class='table_left'>ログインパスワード</td>
            <td class='table_left'>セキュリティ上非表示</td>
        </tr>
        <tr>
            <td class='table_left'>管理権限</td>
            <td class='table_left'><?=$kanri_flg?></td>
        </tr>
        <tr>
            <td class='table_left'>ステータス</td>
            <td class='table_left'><?=$life_flg?></td>
        </tr>
    </table>
   
<div class="btn-wrapper">
    <button class="btn topBtn" onclick="location.href='index.php'">トップページへ戻る</button>
</div>
 
</body>
</html>