<?php

echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";


$mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
$mysqli->set_charset("utf8");

$tmp1="t1,t2,t3,t4,t5,t6,t7,t8,t9";
$tid= array(0,$_POST[t1],$_POST[t2],$_POST[t3],$_POST[t4],$_POST[t5],$_POST[t6],$_POST[t7],$_POST[t8],$_POST[t9]);
$tmp2=$_POST[t1].",".$_POST[t2].",".$_POST[t3].",".$_POST[t4].",".$_POST[t5].",".$_POST[t6].",".$_POST[t7].",".$_POST[t8].",".$_POST[t9];;



echo $sql ="insert into league (name,num,".$tmp1." ) value ('".$_POST[name]."',".$_POST[tnum].",".$tmp2." );" ;

$result = $mysqli->query($sql);

$result = $mysqli->query("SELECT * from league order by id desc ;" );
$row =  $result->fetch_assoc();


for ($i=1;$i<=$_POST[tnum];$i++ ){
    for ($j=$i+1;$j<=$_POST[tnum];$j++){
    	$mid=$i*10+$j;
    	$sql ="insert into game (l_id,m_id, t_l,t_r) value ('".$row[id]."',".$mid.",".$tid[$i].",".$tid[$j]." );" ;
	$result = $mysqli->query($sql);
		

    }
}
for ($i=1;$i<=$_POST[tnum];$i++ ){
        $sql ="insert into result (lid,tid) value ('".$row[id]."',".$tid[$i]." );" ;
        $result = $mysqli->query($sql);
}


echo '<meta http-equiv="refresh" content="0;URL=view.php?lid='.$row[id].'">';
echo '<a href=view.php?lid='.$row[id].'> 戻る</a>';

?>