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
    <!-- css -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/userdb.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
<?php
require_once('funcs.php');



//1.  DB接続します
$pdo = dbconn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table ORDER BY id ASC");
$status = $stmt->execute();

//３．データ表示
$product = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . print_r($error, true));
}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        switch ($result[kanri_flg]){
            case 0:
                $kanri_flg = "管理者";
                break;
            case 1:
                $kanri_flg = "スーパー管理者";
                break;
            }
        
        switch ($result[life_flg]){
            case 0:
                $life_flg = "退社";
                break;
            case 1:
                $life_flg = "入社";
                break;
        }

        $table .= 
        "
        <tr>
            <td>$result[name]</td>
            <td>$result[lid]</td>
            <td>$result[lpw]</td>
            <td>$kanri_flg</td>
            <td>$life_flg</td>
            <td><a href='03-1. update_input.php?id=$result[id]'>更新</td>
            <td><a href='04-1. delete_confirm.php?id=$result[id]'>削除</td>
        </tr>
        ";
    }

}
?>

<h1>登録者情報一覧</h1>
<table class="table" style="width:90%">
    <tr>
        <th>氏名</th>
        <th>ログインID</th>
        <th>ログインパスワード</th>
        <th>管理権限</th>
        <th>ステータス</th>
        <th>更新</th>
        <th>削除</th>
    </tr>
        <?=$table?>
    
</table>
<div class="btn-wrapper">
    <button class="btn topBtn" onclick="location.href='index.php'">トップページへ戻る</button>
</div>
    
</body>
</html>