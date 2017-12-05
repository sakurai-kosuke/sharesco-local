<?php
echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";

$mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
$mysqli->set_charset("utf8");

$result = $mysqli->query("SELECT * from event  where id = ".$_GET[eid]." order by id desc;" );
$row =  $result->fetch_assoc();
echo "<a href= view_event.php?eid=".$row[id]."> 大会のページに戻る</a><br><br>";
echo "<font size = 5>". $row[year]."年 ".$row[mon]."月 ".$row[day] ."日 ".$row[name]."  (".$row[age]." ".$row[pref].") </font><br>";

$result = $mysqli->query("SELECT * from league where id = ".$_GET[lid].";" );
$row =  $result->fetch_assoc();
echo "<font size=4 > ".$row[name]."</font>";
$tnum = $row[num]; 
$t_id=array(0,$row[t1],$row[t2],$row[t3],$row[t4],$row[t5],$row[t6],$row[t7],$row[t8],$row[t9]);

for ($i=1;$i<=$tnum;$i++){
    $result = $mysqli->query("SELECT * from team where id = ".$t_id[$i].";" );
    $row =  $result->fetch_assoc();
    $team[$i]=$row[name];
//    print($team[$i]);
}


echo "<table border=1>\n";
echo "<tr><td width=80 align=center>- <br>- </td>";
for ($i=1;$i<=$tnum;$i++){
	echo "<td width=100 align=center >".$team[$i]."</td>";
}
echo "<td></td><td width=100 align=center > </td><td width=60 align=center>勝点</td><td width=60 align=center>得失点差</td><td width=60 align=center>総得点</td><td> </td><td width=60 align=center><b>順位</b></td>";
echo "</tr>";

for ($i=1;$i<=$tnum;$i++){
	echo "<tr>";
	echo "<td align=center width=150>".$team[$i]."</td>";
	for ($j=1;$j<=$tnum;$j++){
		if ($i==$j) echo "<td align= center> - </td>";
		else if ($i<$j) {
		     $mid=$i*10+$j;
		     $result = $mysqli->query("SELECT * from game where l_id = ".$_GET[lid]." and m_id = ".$mid.";" );
    		     $row =  $result->fetch_assoc();
		     if ($row[s_l] != NULL){
  		     	      echo "<td align= center>  <a href = view_game.php?eid=".$_GET[eid]."&mid=".$row[id]."&lid=".$_GET[lid]."> ";
			      if ($row[s_l]>$row[s_r]) echo "〇"; 
			      else if ($row[s_l]==$row[s_r]) echo "△";
			      else  echo "×";
			      echo "<br>".$row[s_l]. " - ".$row[s_r]." </a></td>";
			}
		     else  
		     	   echo "<td align= center> <a href = view_game.php?eid=".$_GET[eid]."&mid=".$row[id]."&lid=".$_GET[lid]."> 未対戦 <br> - </a> </td>";
		     
		} else {
		  $mid=$j*10+$i;$midl=$i*10+$j;
                     $result = $mysqli->query("SELECT * from game where l_id = ".$_GET[lid]." and  m_id = ".$mid.";" );
                     $row =  $result->fetch_assoc();
                     if ($row[s_l] != NULL){
                               echo "<td align= center>   <a href = view_game.php?eid=".$_GET[eid]."&mid=".$row[id]."&lid=".$_GET[lid]."> ";
                              if ($row[s_r]>$row[s_l]) echo "〇";
                              else if ($row[s_r]==$row[s_l]) echo "△";
                              else  echo "×";
                              echo "<br>".$row[s_r]. " - ".$row[s_l]." </a></td>";
                        }
                     else
                           echo "<td align= center> <a href = view_game.php?eid=".$_GET[eid]."&mid=".$row[id]."&lid=".$_GET[lid]."> 未対戦 <br> - </a> </td>";
     		       }
	}

$result2 = $mysqli->query("SELECT * from result where lid=".$_GET[lid]." and tid = ".$t_id[$i].";" );
$row2 =  $result2->fetch_assoc();
	
        echo "<td > </td>";
        echo "<td width=150 align=center> ".$team[$i]."</td>";
 	echo "<td align= center>".$row2[vp]."</td>";
        echo "<td align= center>".$row2[df]."</td>";
        echo "<td align= center>".$row2[po]."</td>";
        echo "<td> </td>";
        echo "<td align= center><b>".$row2[od]."</b></td>";

	echo "</tr>";
}


echo "<table><br>\n";

?>
