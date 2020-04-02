<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ろくまる農園</title>
</head>
<body>
<?php
//データベースサーバーの障害対策　エラートラップ
try{
//fomeから値を取得
$pro_code=$_POST['code'];
//データベースへ接続処理 //dbname="(データベース名)"
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';//ユーザーネーム
$password="";//パスワード
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


//SQLによるレコードの追加
//入れたいデータは？で表現
$sql='DELETE FROM mst_product WHERE code=?';
$stmt=$dbh->prepare($sql);//準備する命令
$data[]=$pro_code;
$stmt->execute($data);//SQL文で指令を出すための命令です。
//データベースからの切断
$dbh=null;
}catch(Exception $e){
	//データベースに障害があるとこちらが動く。
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();//強制終了の命令。
}

?>
削除しました。<br/>
<br/>
<a href="pro_list.php">戻る</a>
</body>
</html>