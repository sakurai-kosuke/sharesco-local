<?php
//echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";

$mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
$mysqli->set_charset("utf8");

$sql="update game set s_l = ".$_POST[s_l]." , s_r = ".$_POST[s_r]."  , com_l = '".$_POST[com_l]."' , com_r = '".$_POST[com_r]."' where id =".$_POST[mid].";";
$result = $mysqli->query($sql);
//$row =  $result->fetch_assoc();


/// result

$mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
$mysqli->set_charset("utf8");

$result = $mysqli->query("SELECT * from league where id = ".$_POST[lid].";" );
$row =  $result->fetch_assoc();
$tnum = $row[num];
$t_id=array(0,$row[t1],$row[t2],$row[t3],$row[t4],$row[t5],$row[t6],$row[t7],$row[t8],$row[t9]);

for ($i=1;$i<=$tnum;$i++){

    $vp=0;$df=0;$po=0;
    if ($result = $mysqli->query("SELECT * from game  where l_id= ".$_POST[lid]." and t_l = ".$t_id[$i].";" )){
       while ($row =  $result->fetch_assoc()){
       	     if ($row[s_l]!=NULL){
             	if ($row[s_l]>$row[s_r]) $vp+=3;
		else if ($row[s_l]==$row[s_r]) $vp+=1;
		$df += $row[s_l]- $row[s_r];
		$po += $row[s_l];
        	}
       }
    }
    if ($result = $mysqli->query("SELECT * from game  where l_id= ".$_POST[lid]." and t_r = ".$t_id[$i].";" )){
       while ($row =  $result->fetch_assoc()){
             if ($row[s_l]!=NULL){
                if ($row[s_l]<$row[s_r]) $vp+=3;
                else if ($row[s_l]==$row[s_r]) $vp+=1;
                $df += $row[s_r]- $row[s_l];
                $po += $row[s_r];
 
                }
       }
    }

//    echo "update result set vp = ".$vp." ,  df = ".$df." , po = ".$po." where tid=".$t_id[$i]." and lid = ".$_POST[lid].";";    

    $result = $mysqli->query("update result set vp = ".$vp." ,  df = ".$df." , po = ".$po." where tid=".$t_id[$i]." and lid = ".$_POST[lid].";" );

//    echo $i." dd ". $vp." ".$df." ".$po."<br>";
}

//	echo "select *  from result  where lid = ".$_POST[lid]." order by desc vp, desc df, desc po ;";
   $result = $mysqli->query("select *  from result  where lid = ".$_POST[lid]." order by vp desc , df desc ,  po desc ;" );
   for  ($i=1;$i<=$tnum;$i++){
   	$row =  $result->fetch_assoc();
 	$result2 = $mysqli->query("update result set od = ".$i." where tid=".$row[tid]." and lid = ".$_POST[lid].";" );
  
 	 echo $row[tid]."<br>";
   }




echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";
//echo '<meta http-equiv="refresh" content="0;URL=view_game.php?mid='.$_POST[mid].'&lid='.$_POST[lid].'">';
echo '<a href=view_game.php?mid='.$_POST[mid].'&lid='.$_POST[lid].'> 戻る</a>';


?>