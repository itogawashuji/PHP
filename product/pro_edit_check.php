<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ろくまる農園</title>
</head>
<body>
<?php
//fomeでpostを使い取得した値を関数にいれる
$pro_code=$_POST['code'];
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
//入力データに安全対策を施す
$pro_code=htmlspecialchars($pro_code,ENT_QUOTES,'UTF-8');
$pro_name=htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price=htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

if($pro_name==''){
	print'商品名が入力されていません<br/>';
}else{
	print'商品名';
	print$pro_name;
	print'<br/>';
}
//価格がキチンと入力されているか確認する
if(preg_match('/\A[0-9]+\z/',$pro_price)==0){
	print'価格をきちんと入力して下さい<br/>';
}else{
	print'価格：';
	print$pro_price;
	print'円<br/>';
}

//入力エラーの処理を返す
if($pro_name==''||preg_match('/\A[0-9]+\z/',$pro_price)==0){
	print'<fome>';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'</fomr>';
}else{
	print'上記のように変更します。<br/>';
	print'<form method="post" action="pro_edit_done.php">';
	print'<input type="hidden" name="code" value="'.$pro_code.'">';
	print'<input type="hidden" name="name" value="'.$pro_name.'">';
	print'<input type="hidden" name="price" value="'.$pro_price.'">';
	print'<br/>';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'<input type="submit" value="OK">';
	print'</fome>';
}

?>
</body>
</html>