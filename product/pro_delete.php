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
//スタッフリストから渡されたスタッフコードを取得
$pro_code=$_GET['procode'];
//データベースへ接続処理 //dbname="(データベース名)"
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';//ユーザーネーム
$password="";//パスワード
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//SQLによるレコードの参照
$sql='SELECT name FROM mst_product WHERE code=?';//スタッフコードで絞り込んでいます。
$stmt=$dbh->prepare($sql);//準備する命令
$data[]=$pro_code;//？に値を代入する。
$stmt->execute($data);//SQL文で指令を出すための命令です。//$data

//参照した結果を処理
$rec =$stmt->fetch(PDO::FETCH_ASSOC);//$recの中にデータを入れる。
$pro_name=$rec['name'];

//データベースからの切断
$dbh=null;
}catch(Exception $e){
	//データベースに障害があるとこちらが動く。
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();//強制終了の命令。
}

?>

商品削除<br/>
<br/>
商品コード<br/>
<?php print $pro_code;?>
<br/>
商品名<br/>
<?php print$pro_name;?>
<br/>
この商品を削除してよろしいですか？<br/>
<br/>
<form method="post" action="pro_delete_done.php">
	<input type="hidden" name="code" value="<?php print $pro_code;?>">
	<input type="button" onclick="history.back()" value="戻る">
	<input type="submit" value="OK">
</form>

</body>
</html>