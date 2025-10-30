<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>入力内容の確認｜メール送信フォーム</title>
<link href="css/php.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
</head>
<body>
<div id="php" style="margin: 0 auto;">
<?php
/*******************************
 データの受け取り
*******************************/
$namae		= $_POST["namae"];		//お名前
$mailaddress	= $_POST["mailaddress"];	//メールアドレス
$denwa      = $_POST["denwa"];      //電話番号
$naiyou		= $_POST["naiyou"];		//お問合せ内容

//危険な文字列を入力された場合にそのまま利用しない対策
$namae		= htmlspecialchars($namae, ENT_QUOTES);
$mailaddress	= htmlspecialchars($mailaddress, ENT_QUOTES);
$denwa		= htmlspecialchars($denwa, ENT_QUOTES);
$naiyou		= htmlspecialchars($naiyou, ENT_QUOTES);

/*******************************
 未入力チェック
*******************************/
$errmsg = '';	//エラーメッセージを空にしておく
if ($namae == '') {
	$errmsg = $errmsg.'<p>お名前が入力されていません。</p>';
}
if ($mailaddress == '') {
	$errmsg = $errmsg.'<p>メールアドレスが入力されていません。</p>';
}
if ($denwa == '') {
	$errmsg = $errmsg.'<p>電話番号が入力されていません。</p>';
}
if ($naiyou == '') {
	$errmsg = $errmsg.'<p>お問合せ内容が入力されていません。</p>';
}


/*******************************
 入力内容の確認
*******************************/
if ($errmsg != '') {
	//エラーメッセージが空ではない場合には、エラーメッセージを表示する
	echo $errmsg;

	//[前のページへ戻る]ボタンを表示する
	echo '<form method="post" action="index.php#contact">';
	echo '<input type="hidden" name="namae" value="'.$namae.'">';
	echo '<input type="hidden" name="mailaddress" value="'.$mailaddress.'">';
	echo '<input type="hidden" name="denwa" value="'.$denwa.'">';
	echo '<input type="hidden" name="naiyou" value="'.$naiyou.'">';
	echo '<input type="submit" name="backbtn" value="前のページへ戻る">';
	echo '</form>';
} else {
	//エラーメッセージが空の場合には、入力された内容を画面表示する
	echo '<h3>入力内容を確認します</h3>';
	echo '<dl>';
	echo '<dt>【お名前】</dt><dd>'.$namae.'</dd>';
	echo '<dt>【メールアドレス】</dt><dd>'.$mailaddress.'</dd>';
	echo '<dt>【電話番号】</dt><dd>'.$denwa.'</dd>';
	echo '<dt>【お問合せ内容】</dt><dd>'.nl2br($naiyou).'</dd>';
	echo '</dl>';

	//[上記内容で送信する]ボタンを表示する
	echo '<form method="post" action="mailpost.php">';
	echo '<input type="hidden" name="namae" value="'.$namae.'">';
	echo '<input type="hidden" name="mailaddress" value="'.$mailaddress.'">';
	echo '<input type="hidden" name="denwa" value="'.$denwa.'">';
	echo '<input type="hidden" name="naiyou" value="'.$naiyou.'">';
	echo '<input type="submit" name="okbtn" value="上記内容で送信する">';
	echo '</form>';
}
?>
</div>
</body>
</html>