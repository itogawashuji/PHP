<?php
//参照ボタンが押された
if(isset($_POST['disp'])==true){
	//staffcodeが未選択の場合staff_ng.phpに飛ばす。
	if(isset($_POST['procode'])==false){
		header('Location:pro_ng.php');
		exit();
	}
	$pro_code=$_POST['procode'];
	header('Location:pro_disp.php?procode='.$pro_code);
	exit();                           //離脱
}

if(isset($_POST['add'])==true){
		//listでaddが押された場合の処理
		header('Location:pro_add.php');
		exit();
}
//isset()とは？本当の空値を判断（空値('')でもあればtrueを返す。
//未定義　完全なからー＞falseを返す。
if(isset($_POST['edit'])==true){
	//staffcodeが未選択の場合staff_ng.phpに飛ばす。
	if(isset($_POST['procode'])==false){
		header('Location:pro_ng.php');
		exit();
	}
	//print'修正ボタンが押された';
	$pro_code=$_POST['procode'];
	//指定したPHPファイルへ飛ばす//fromを使わないやり方header('Location:~~~')命令
	//URLパラメータを利用したGETによる値の送信 ↓書き方 (?~'.変数
	header('Location:pro_edit.php?procode='.$pro_code);
	exit();                           //離脱
}
if(isset($_POST['delete'])==true){
	//staffcodeが未選択の場合staff_ng.phpに飛ばす。
	if(isset($_POST['procode'])==false){
		header('Location:pro_ng.php');
		exit();
	}
	$pro_code=$_POST['procode'];
	//print'削除ボタンが押された';
	header('Location:pro_delete.php?procode='.$pro_code);
	exit();
}

?>