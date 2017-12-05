<?php
$mysqli = new mysqli("localhost", "jockrock", "", "sharesco");

if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	exit();
} else {
	$mysqli->set_charset('utf8');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>シェアスコ 試合結果共有サービス</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
試合結果共有サービス<br>
<font size="6">シェアスコ</font><br>
<a href="mail.html" method="post">大会を作成する</a>
<a href="add_team.php" method="post">チームを登録する</a>
<form action="index.php" method="post">
    <br>
    <label>チーム名<br>
    <input type="text" name="name"/></label>
    <br>
    都道府県<br>
    <select name="pref">
        <option value=""></option>
        <option value="北海道">北海道</option>
        <option value="青森県">青森県</option>
        <option value="岩手県">岩手県</option>
        <option value="宮城県">宮城県</option>
        <option value="秋田県">秋田県</option>
        <option value="山形県">山形県</option>
        <option value="福島県">福島県</option>
        <option value="茨城県">茨城県</option>
        <option value="栃木県">栃木県</option>
        <option value="群馬県">群馬県</option>
        <option value="埼玉県">埼玉県</option>
        <option value="千葉県">千葉県</option>
        <option value="東京都">東京都</option>
        <option value="神奈川県">神奈川県</option>
        <option value="新潟県">新潟県</option>
        <option value="富山県">富山県</option>
        <option value="石川県">石川県</option>
        <option value="福井県">福井県</option>
        <option value="山梨県">山梨県</option>
        <option value="長野県">長野県</option>
        <option value="岐阜県">岐阜県</option>
        <option value="静岡県">静岡県</option>
        <option value="愛知県">愛知県</option>
        <option value="三重県">三重県</option>
        <option value="滋賀県">滋賀県</option>
        <option value="京都府">京都府</option>
        <option value="大阪府">大阪府</option>
        <option value="兵庫県">兵庫県</option>
        <option value="奈良県">奈良県</option>
        <option value="和歌山県">和歌山県</option>
        <option value="鳥取県">鳥取県</option>
        <option value="島根県">島根県</option>
        <option value="岡山県">岡山県</option>
        <option value="広島県">広島県</option>
        <option value="山口県">山口県</option>
        <option value="徳島県">徳島県</option>
        <option value="香川県">香川県</option>
        <option value="愛媛県">愛媛県</option>
        <option value="高知県">高知県</option>
        <option value="福岡県">福岡県</option>
        <option value="佐賀県">佐賀県</option>
        <option value="長崎県">長崎県</option>
        <option value="熊本県">熊本県</option>
        <option value="大分県">大分県</option>
        <option value="宮崎県">宮崎県</option>
        <option value="鹿児島県">鹿児島県</option>
        <option value="沖縄県">沖縄県</option>
    </select>
    <br>
    年代<br>
    <select name="age">
        <option value="" selected></option>
        <option value="1年生">1年生</option>
        <option value="2年生">2年生</option>
        <option value="3年生">3年生</option>
        <option value="4年生">4年生</option>
        <option value="5年生">5年生</option>
        <option value="6年生">6年生</option>
        <option value="中学生">中学生</option>
        <option value="高校生">高校生</option>
        <option value="大学生">大学生</option>
        <option value="一般">一般</option>
    </select>
    <br>
    <input type="submit" value="検索"/>
    
</form>
</body>
    
</html>
