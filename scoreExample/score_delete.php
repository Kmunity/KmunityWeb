<?
	$connect = mysql_connect("localhost","jun","1234");
	mysql_select_db("test",$connect);

	$sql="delete from student_score where num=$_GET[num]";

	mysql_query($sql,$connect);

	mysql_close($connect);

	//Back to score_list.php
	Header("Location:score_list.php");
?>
