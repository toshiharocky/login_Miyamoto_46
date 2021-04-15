<?php

//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値を受け取る
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//1.  DB接続します
require_once('funcs.php');
$pdo = dbconn();

//2. データ登録SQL作成
// gs_user_tableに、IDとWPがあるか確認する。
$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE lid = :lid AND lpw = :lpw');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入
//if(password_verify($lpw, $val['lpw'])){ //* PasswordがHash化の場合はこっちのIFを使う
if( $val['id'] != '' ){    //id情報が空欄でなければ
    //Login成功時
    $_SESSION['chk_ssid']  = session_id();
    $_SESSION['u_kanri_flg'] = $val['kanri_flg'];
    $_SESSION['u_life_flg'] = $val['life_flg'];
    $_SESSION['uname']      = $val['name'];
    $_SESSION['u_lid']      = $val['lid'];
    $_SESSION['u_lpw']      = $val['lpw'];
    header('Location: index.php');
}else{
    //Login失敗時(Logout経由)
    header('Location: login.php');
}

// exit();
