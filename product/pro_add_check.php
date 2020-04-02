<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ろくまる農園</title>
</head>
<body>
<?php
//fomeでpostを使い取得した値を関数にいれる
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou=$_FILES['gazou'];//画像を受け取る
//↑には画像の色んな情報が入っている取り出し方$pro_gazou['size']画像のサイズ　$pro_gazou['tmp_name']仮にアップロードされている画像本体の場所と名前 $$pro_gazou['name']ファイル名

//入力データに安全対策を施す
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

if($pro_gazou['size'] > 0){
	if($pro_gazou['size'] > 1000000){
		print'画像が大きすぎます';
	}else{
		move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);//画像フォルダにアップロード(A,B) AをBに移動
		/*ディレクトリ移動
		.同じフォルダ
		..一段上のフォルダ
		/フォルダの区切り
		*/
		print'<img src="./gazou/'.$pro_gazou['name'].'">';
		print'<br/>';
	}
}

//入力エラーの処理を返す
if($pro_name==''||preg_match('/\A[0-9]+\z/',$pro_price)==0||$pro_gazou['size']>1000000){
	print'<fome>';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'</fomr>';
}else{
	print'上記の商品を追加します。<br/>';
	print'<form method="post" action="pro_add_done.php">';
	print'<input type="hidden" name="name" value="'.$pro_name.'">';
	print'<input type="hidden" name="price" value="'.$pro_price.'">';
	print'<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
	print'<br/>';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'<input type="submit" value="OK">';
	print'</fome>';
}

?>
</body>
</html>