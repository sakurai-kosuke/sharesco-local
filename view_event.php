<?php

echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";


$mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
$mysqli->set_charset("utf8");

$result = $mysqli->query("SELECT * from event  where id = ".$_GET[eid]." order by id desc;" );
$row =  $result->fetch_assoc();
echo "<a href=index.php> トップに戻る</a><br><br>";

echo "<font size = 5>". $row[year]."年 ".$row[mon]."月 ".$row[day] ."日 ".$row[name]."  (".$row[age]." ".$row[pref].") </font><br>".$row[com_day]." <br><br>";

echo "<ul>";
if($result = $mysqli->query("SELECT * from league where cat = 3 and eid like '".$_GET[eid]. "' order by id desc;" )){
           while($row =  $result->fetch_assoc()){
                      if($result2 = $mysqli->query("SELECT * from game where l_id = ".$row[id]." ;" )){
                           $row2 =  $result2->fetch_assoc();
                           echo "<li><a href=view_game.php?eid=".$_GET[eid]."&mid=".$row2[id]."> ". $row[name]."</a></li>" ;
                      }
           }
}
echo "</ul>";

echo "<ul>";
$result = $mysqli->query("SELECT * from league where cat = 1 and  eid = ".$_GET[eid]. " order by id desc;" );
while($row =  $result->fetch_assoc()){
 
	   echo "<li><a href=view_league.php?eid=".$row[eid]."&lid=".$row[id]."> ". $row[name]."</a><il>" ;

}
echo "</ul>";

//echo "<br><br><a href=add_league.php?eid=".$_GET[eid]."> あらたにリーグ表を作成する</a><br><br>";



?>
