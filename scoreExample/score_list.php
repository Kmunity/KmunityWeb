<?
	//Database connect
	$connect=mysql_connect("localhost","jun","1234");

	//Database select
	mysql_select_db("test",$connect);


	if($_GET[mode]=="insert" && $_POST[name]!=""){
		//Data Converting
		$sub1 = (int)$_POST[sub1];
		$sub2 = (int)$_POST[sub2];
		$sub3 = (int)$_POST[sub3];
		$sub4 = (int)$_POST[sub4];
		$sub5 = (int)$_POST[sub5];
	
		$sum=$sub1+$sub2+$sub3+$sub4+$sub5;
		$avg=$sum/5;
		
		$sql="insert into student_score (name,sub1,sub2,sub3,sub4,sub5,sum,avg) values ";
		$sql.="('$_POST[name]',$sub1,$sub2,$sub3,$sub4,$sub5,$sum,$avg);";

		$result=mysql_query($sql,$connect);
	}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<h3>1) 성적입력하기</h3>

<form action="score_list.php?mode=insert" method="post">
<table width="720" border="1" cellpadding="5">
<tr><td>이름 : <input type="text" size="6" name="name">&nbsp;
	과목1 : <input type="text" size="3" name="sub1">&nbsp;
	과목2 : <input type="text" size="3" name="sub2">&nbsp;
	과목3 : <input type="text" size="3" name="sub3">&nbsp;
	과목4 : <input type="text" size="3" name="sub4">&nbsp;
	과목5 : <input type="text" size="3" name="sub5">&nbsp;
	</td>
	<td align="center">
	<input type="submit" value="입력하기">
	</td></tr>
</table>
</form>

<p>
<h3>2) 성적출력하기</h3>
<p><a href="score_list.php?mode=big_first">[성적순 정렬]</a>
<a href="score_list.php?mode=small_first">[성적역순 정렬]</a></p>
<p>
<!-- 제목 표시 시작 -->
<table width="720" border="1" cellpadding="5">
<tr align="center" bgcolor="#CCCCCC">
	<td>번호</td>
	<td>이름</td>
	<td>과목1</td>
	<td>과목2</td>
	<td>과목3</td>
	<td>과목4</td>
	<td>과목5</td>
	<td>합계</td>
	<td>평균</td>
	<td>&nbsp;</td>
</tr>
<!--제목 표시 끝 -->
<?
	// select
	$sql = "select * from student_score";
	if($mode=="big_first")	//성적 내림차순 정렬
		$sql.="order by sum desc";
	else if($mode=="small_first")
		$sql.="order by sum";

	$result = mysql_query($sql);
	$count=1;
	while($row=mysql_fetch_array($result)){
		$avg=round($row[avg],1);

		$num=$row[num];

		echo "<tr align='center'>
			<td>$count</td>
			<td>$row[name]</td>
			<td>$row[sub1]</td>
			<td>$row[sub2]</td>
			<td>$row[sub3]</td>
			<td>$row[sub4]</td>
			<td>$row[sub5]</td>
			<td>$row[sum]</td>
			<td>$avg</td>
			<td><a href='score_delete.php?num=$num'>[삭제]</a></td>
			</tr>";

			$count++;
	}

	mysql_close();
?>
</table>
