<?php 


echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";

$mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
$mysqli->set_charset("utf8");

if($_POST[name]!=""){
$tmp1="t1,t2,t3,t4,t5,t6,t7,t8,t9";
$tid= array(0,$_POST[t1],$_POST[t2],$_POST[t3],$_POST[t4],$_POST[t5],$_POST[t6],$_POST[t7],$_POST[t8],$_POST[t9]);
$tmp2=$_POST[t1].",".$_POST[t2].",".$_POST[t3].",".$_POST[t4].",".$_POST[t5].",".$_POST[t6].",".$_POST[t7].",".$_POST[t8].",".$_POST[t9];;



echo $sql ="insert into league (name,eid,num,".$tmp1." ) value ('".$_POST[name]."',".$_POST[eid].",".$_POST[tnum].",".$tmp2." );" ;

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


echo '<meta http-equiv="refresh" content="0;URL=view_league.php?lid='.$row[id].'">';
echo '<a href=view_league.php?lid='.$row[id].'> 戻る</a>';





} else   if ($_GET[tnum]>0){
   echo '<form action="add_league.php" method="post">';
   echo '<input type=hidden name = t4  value=0>';
   echo '<input type=hidden name = t5  value=0>';
    echo '<input type=hidden name = t6  value=0>';
   echo '<input type=hidden name = t7  value=0>';
   echo '<input type=hidden name = t8  value=0>';
    echo '<input type=hidden name = t9  value=0>';
 
   echo 'リーグ表名<br><input type="text" name="name" size="40">';

   for ($i=1;$i<=$_GET[tnum];$i++){
      $result = $mysqli->query("SELECT * from team where city like '生駒市';");

       echo '<br>チーム名'.$i.'<br><select name=t'.$i.'>';
	while($row =  $result->fetch_assoc()){

		echo '<option value="'.$row[id].'" >'.$row[name].'</option>';
		}
	echo '</select>';
   }
   echo '<input type=hidden name = tnum  value='.$_GET[tnum].'>';
     echo '<input type=hidden name = eid  value='.$_GET[eid].'>';
      echo '<br><br><input type="submit" value="送信">';


} else {

       echo '<b>リーグ表作成</b><br>チーム数を入力';
       echo '<form action="add_league.php" method="get">';
       echo '<br><select name="tnum">';
       for($i=3;$i<10;$i++){
		echo '<option value="'.$i.'" >'.$i.'</option>';
	}
	echo '</select><br><br>';
	echo '<input type=hidden name = eid  value='.$_GET[eid].'>';
    	echo '<input type="submit" value="送信">';

}
 




?>