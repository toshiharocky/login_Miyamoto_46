<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トップページ</title>
    <!-- css -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="inventory.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php
    session_start();
    require_once('funcs.php');
    $pdo = dbconn();
    // ログイン中の場合は「ログインID」+「ログアウト」ボタンを、ログインしていない場合は「ログイン」ボタンを表示
    if($_SESSION['chk_ssid'] != session_id()){
       $login = 
       "<a href='login.php'>ログイン</a>";
    }else {
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
        $uname = $_SESSION['uname'];
        switch($_SESSION['u_kanri_flg']){
            case '0':
                $kanri_flg = "管理者";
                break;
            case '1':
                $kanri_flg = "スーパー管理者";
                break;
        }
        switch($_SESSION['u_life_flg']){
            case '0':
                $life_flg = "退社";
                break;
            case '1':
                $life_flg = "入社";
                break;
        }
        // var_dump($_SESSION);
        // ログインしている場合はユーザーIDとログアウトボタンを表示
        $login .=
        "<p>こんにちは $uname さん</p>
        <p>（ $kanri_flg / $life_flg )</p>
        <a href='logout.php'>ログアウト</a>";
    }

?>

<header>
    <h1>トップページ</h1>
    <div id="login">
        <?=$login?>
    </div>
</header>
<h2>*：スーパー管理者のみアクセス可</h2>
<div class="top-page">
    <div class="top-wrapper">
        <div class="options">
            <p class="tp"><a href="06-1. register product info.php">商品個別登録</a></p>
            <p class="tp"><a href="06-4. register product lump select.php">商品一括登録*</a></p>
        </div>
    </div>
    <div class="top-wrapper">
        <div class="options">
            <p class="tp"><a href="02. current inventory.php">在庫一覧</a></p>
            <p class="tp"><a href="07-1. choice category.php">商品情報更新*</a></p>
        </div>
    </div>
    <div class="top-wrapper">
        <div class="options">
            <p class="tp"><a href="03-1. order.php">発注登録</a></p>
            <p class="tp"><a href="03-6. order update select.php">発注内容修正</a></p>
            <p class="tp"><a href="04-1. delivery.php">納品登録</a></p>
        </div>
    </div>
    <div class="top-wrapper">
        <div class="options">
            <p class="tp"><a href="08-1. move product category.php">移動登録</a></p>
            <p class="tp"><a href="05-1. choice used product category.php">使用登録</a></p>
        </div>
    </div>
    <div class="top-wrapper">
        <div class="options">
            <p class="tp"><a href="09-1. choice category of delete product.php">商品削除*</a></p>
        </div>
    </div>
    <div class="top-wrapper">
        <div class="options">
            <p class="tp"><a href="99-1. insert_input.php">ユーザー登録*</a></p>
            <p class="tp"><a href="99. user_select.php">ユーザー一覧（更新/削除）*</a></p>
        </div>
    </div>
</div>

    


</body>
</html>