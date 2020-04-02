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

//データベースへ接続処理 //dbname="(データベース名)"
$dsn='mysql:dbname=shop;host=localhost;charset=utf8';
$user='root';//ユーザーネーム
$password="";//パスワード
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//SQLによるレコードの参照
$sql='SELECT code,name,price FROM mst_product WHERE 1';//スタッフ名前とスタッフコードを全部頂戴というSQL
$stmt=$dbh->prepare($sql);//準備する命令
$stmt->execute();//SQL文で指令を出すための命令です。//命令が終わった時点で$stmtにはすべてのデータが入っている。

//データベースからの切断
$dbh=null;

print'商品一覧<br/><br/>';
print'<form method="post" action="pro_branch.php">';//修正画面に飛べるように

while(true){
	$rec = $stmt->fetch(PDO::FETCH_ASSOC); //$stmtから1レコードづつ$recに取り出している
	if($rec==false){
		break;
	}
	print'<input type="radio" name="procode" value="'.$rec['code'].'">';
	print$rec['name'].'---';
	print$rec['price'].'円';
	print'<br/>';
}
print'<input type="submit" name="disp" value="参照">';
print'<input type="submit" name="add" value="追加">';
print'<input type="submit" name="edit" value="修正">';
print'<input type="submit" name="delete" value="削除">';
print'</form>';

}catch(Exception $e){
	//データベースに障害があるとこちらが動く。
	print'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();//強制終了の命令。
}

?>

</body>
</html>