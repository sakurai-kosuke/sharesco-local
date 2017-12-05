<?php 

$pref = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県');

$age =array('1年生','2年生','3年生','4年生','5年生','6年生','中学生','高校生','大学生','一般');
echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'></head><body>";

if($_POST[name]==""){

	echo '<form action="add_event.php" method="post">';

	echo '<br>開催日:  <select name=year style=" font-size:20px">';
        for($i=date('Y');$i<date('Y')+2;$i++){
		echo '<option value="'.$i.'" >'.$i.'</option>';
        }
        echo '</select> 年 ';
	echo '<select name=mon style=" font-size:20px">';
        for($i=1;$i<13;$i++ ){
		if($i==date('n'))
			echo '<option value="'.$i.'" selected>'.$i.'</option>';
		else 
		     echo '<option value="'.$i.'" >'.$i.'</option>';
        }
        echo '</select>月 ';

	echo '<select name=day style=" font-size:20px">';
        for($i=1;$i<31;$i++){
		if($i==date('j'))
			echo '<option value="'.$i.'" selected>'.$i.'</option>';
		else 
                        echo '<option value="'.$i.'" >'.$i.'</option>';
         }
        echo '</select>日 ';

        echo '<br>開催地:  <select name="pref" style=" font-size:20px">';
        echo '<option value=0 selected>すべて</option>';
        for ($i=0;$i<48;$i++){
                 echo '<option value="'.$pref[$i].'">'.$pref[$i].'</option>';
        }
        echo '</select>';
	
       echo '<br>年齢:  <select name="age" style=" font-size:20px">';
        echo '<option value=0 selected>すべて</option>';
        for ($i=0;$i<11;$i++){
                 echo '<option value="'.$age[$i].'">'.$age[$i].'</option>';
        }
        echo '</select>';

	echo '<br> 大会名: <input type="text" name="name" size="40" style=" font-size:20px">';
       echo '<br> 補足等: <input type="text" name="com_day" size="40" style=" font-size:20px">(複数開催日等)';


   	echo '<br><br><input type="submit" value="送信" style=" font-size:20px">';
} else {
  $mysqli = new mysqli("localhost", "sharesco", "sharesco", "sharesco");
  $mysqli->set_charset("utf8");	    

  $epass=substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 10);

  $sql="insert into event (epass,year,mon,day,pref,age,name,com_day) value ('".$epass."',$_POST[year],$_POST[mon],$_POST[day],'$_POST[pref]','$_POST[age]','$_POST[name]','$_POST[com_day]');";
  $result = $mysqli->query($sql);

//  echo '<meta http-equiv="refresh" content="0;URL=index.php">';
  echo '<b>以下URLを記録してください</b><br>修正可能なURL<br>';  
  echo '修正用URL: <a href=ed/view_event.php?epass='.$epass.'> http://shs.ami-lab.jp/ed/view_event.php?epass='.$epass.'</a><br>';

$result = $mysqli->query("SELECT * from event where epass like '".$epass."' ;" );
$row =  $result->fetch_assoc();


 echo '閲覧のみ可能なURL<br>'; 
  echo '閲覧用URL: <a href=view_event.php?eid='.$row[id].'> http://shs.ami-lab.jp/view_event.php?eid='.$row[id].'</a><br>';

  echo '<br><a href=index.php> ホームに戻る</a>';
}

?>