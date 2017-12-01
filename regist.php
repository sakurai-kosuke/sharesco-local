<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>アドレス登録</title>
</head>
<body>
    
<?php

header("Content-type: text/html; charset=UTF-8");

$mysqli = new mysqli("localhost", "root", "", "sports");

if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
	exit();
} else {
	$mysqli->set_charset('utf8');
}


$stmt = $mysqli->prepare("INSERT INTO team(name, pref, age) VALUES (?,?,?)");
if ($stmt) {
    $stmt->bind_param('sss', $name, $pref, $age);
    $name = $_POST['name'];
    $pref = $_POST['pref'];
    $age  = $_POST['age'];
    
    $stmt->execute();
} else {
    echo $stmt->errno . $stmt->error;
}

$stmt->close();

?>
<p>登録が完了しました。<br /><a href="index.php">戻る</a></p>
</body>
</html>