<?php
echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";

$mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
$mysqli->set_charset("utf8");

$result = $mysqli->query("SELECT * from game where id = ".$_GET[mid].";" );
$row =  $result->fetch_assoc();

//echo "<br><a href=view_league.php?eid=".$_GET[eid]."&lid=".$_GET[lid]."> リーグ表に戻る</a><br><br>";


if($_GET[lid]!="" ){ 
                  echo "<br><a href=view_league.php?eid=".$_GET[eid]."&lid=".$_GET[lid]."> リーグ表に戻る</a><br><br>";
} else {
       $result2 = $mysqli->query("SELECT * from event where id ='".$_GET[eid]."';" );
       $row2 =  $result2->fetch_assoc();
       echo "<br><a href=view_event.php?eid=".$_GET[eid]."&eid=".$row2[id]."> 大会に戻る</a><br><br>";
}



echo "<table border=0>";
echo "<tr>";

echo "<td width= 0 align =center>";
$result2 = $mysqli->query("SELECT * from team where id = ".$row[t_l].";" );
$row2 =  $result2->fetch_assoc();
echo "<font size = 4 >  ".$row2[name]." </font>";
echo "</td>";


echo "<td width= 0 align =center> ";
echo "</td>";


echo "<td width=0  align=center>";
$result2 = $mysqli->query("SELECT * from team where id = ".$row[t_r].";" );
$row2 =  $result2->fetch_assoc();
echo "<font size = 4 >  ".$row2[name]." </font>";
echo "</td>";

echo "</tr>";


echo "<tr>";

echo "<td width= 0 align =center>";
echo "<font size = 10 >  ".$row[s_l]." </font>";
echo "</td>";

echo "<td width= 0 align =center>";
echo "<font size = 6 >  - </font>";
echo "</td>";

echo "<td width=0 align =center>";
echo "<font size = 10 >  ".$row[s_r]." </font>";
echo "</td>";

echo "</tr>";




echo "<tr>";
echo "<td width= 0>";
echo $row[com_l];
echo "</td>";

echo "<td width= 100 align =center>";
echo " ";
echo "</td>";

echo "<td width= 100> ";
echo $row[com_r];
echo "</td>";

echo "</tr>";


echo "</table>";


//echo "<br><a href=edit_game.php?mid=".$_GET[mid]."&lid=".$_GET[lid]."> 編集する</a>"; 


?>