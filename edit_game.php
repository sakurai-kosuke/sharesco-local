<?php
echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";

$mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
$mysqli->set_charset("utf8");

$result = $mysqli->query("SELECT * from game where id = ".$_GET[mid].";" );
$row =  $result->fetch_assoc();


echo '<form action="edit.php" method="post">';
echo "<table border=0>";
echo "<tr>";

echo "<td width= 200 align =center>";
$result2 = $mysqli->query("SELECT * from team where id = ".$row[t_l].";" );
$row2 =  $result2->fetch_assoc();
echo "<font size = 4 >  ".$row2[name]." </font>";
echo "</td>";

echo "<td width= 50 align =center>";
//echo "<font size = 6 >  ".$row[s_l]." </font>";
//echo '<input type="text" name="s_l" size="4" value='.$row[s_l].' >';

echo '<select name="s_l">';
if ($row[s_l]==NULL)
   echo '<option value="NULL" selected>未対戦</option>';
else 
   echo '<option value="NULL">未対戦</option>';
 
for($i=0;$i<15;$i++){
	if ($row[s_l]!=NULL & $i == $row[s_l] )
        echo '<option value="'.$i.'" selected>'.$i.'</option>';
	else 
	echo '<option value="'.$i.'">'.$i.'</option>';
}
echo '</select>';

echo "</td>";

echo "<td width= 50 align =center>";
echo "<font size = 6 >  - </font>";
echo "</td>";

echo "<td width= 50 align =center>";
//echo "<font size = 6 >  ".$row[s_r]." </font>";
//echo '<input type="text" name="s_r" size="4" value='.$row[s_r].' >';

echo '<select name="s_r">';
if ($row[s_r]==NULL)
   echo '<option value="NULL" selected>未対戦</option>';
else
   echo '<option value="NULL">未対戦</option>';

for($i=0;$i<15;$i++){
        if ($row[s_r]!=NULL & $i == $row[s_r] )
        echo '<option value="'.$i.'" selected>'.$i.'</option>';
        else
        echo '<option value="'.$i.'">'.$i.'</option>';
}
echo '</select>';

echo "</td>";

echo "<td width= 200 align =center>";
$result2 = $mysqli->query("SELECT * from team where id = ".$row[t_r].";" );
$row2 =  $result2->fetch_assoc();
echo "<font size = 4 >  ".$row2[name]." </font>";
echo "</td>";

echo "</tr>";
echo "<tr>";



echo "<td width= 200>";
//echo $row[com_l];
echo '<textarea name="com_l" rows="4" cols="40" >'.$row[com_l].'</textarea>';
echo "</td>";

echo "<td width= 100 align =center>";
echo " ";
echo "</td>";

echo "<td width= 50 align =center>";
echo " ";
echo "</td>";

echo "<td width= 100 align =center>";
echo " ";
echo "</td>";

echo "<td width= 200 >";
//echo $row[com_r];
echo '<textarea name="com_r" rows="4" cols="40" >'.$row[com_r].'</textarea>';
echo "</td>";

echo "</tr>";


echo "</table>";

echo '
<p>
<input type="hidden" name="mid" value="'.$row[id].'">
<input type="hidden" name="lid" value="'.$_GET[lid].'">
<input type="submit" value="送信">
</p>
</form>
';

?>