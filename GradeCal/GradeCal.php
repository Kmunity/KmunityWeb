<?
	#Database Connect
	$connect=mysql_connect("localhost","jun","1234");
	mysql_select_db("test",$connect);

	#Data Convert
	if($_GET[mode]=="insert" && $_POST[name] != ""){
		$gradeToPoint = ["A+" => 4.5,
						"A" => 4.0,
						"B+" => 3.5,
						"B" => 3.0,
						"C+" => 2.5,
						"C" => 2.0,
						"D+" => 1.5,
						"D" => 1.0,
						"P" => 0.0];

		$name = $_POST[name];
		$sub = $_POST[sub];
		$grade = $_POST[grade];
		$point = (float)$gradeToPoint[$grade];
	
		#Data Insert
		$sql="insert into grade values ('$name',$sub,'$grade',$point)";

		$result = mysql_query($sql);

		mysql_close();
	}
	else if($_GET[mode]=="delete"){
		$sql="delete from grade where name='$_GET[name]'";
		mysql_query($sql);

		mysql_close($connect);
		Header("Location:GradeCal.php");
	}
	else if($_GET[mode]=="deleteAll"){
		$sql="delete from grade";
		mysql_query($sql);
		mysql_close();
	}
?>
<!--학점입력-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<h1>Grade Calculation System</h1>
<form action="GradeCal.php?mode=insert" method="post">
<table width="400"border="1" cellpadding="5"><tr>
	<td>과목명:<input type="text" size="6" name="name"/></td>
	<td>학점:<select name="sub">
			<option value="3">3</option>
			<option value="2">2</option>
			<option value="1">1</option>
			</select></td>
	<td>성적:<select name="grade">
			<option value="A+">A+</option>
			<option value="A">A</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="D+">D+</option>
			<option value="D">D</option>
			<option value="P">P</option>
			</select></td>
	<td><input type="submit" value="추가하기"/></td>		
</tr></table>	
</form>
<table width="400"border="1" cellpadding="5">
<tr align="center" bgcolor="#CCCCCC">
	<td>번호</td>
	<td>과목명</td>
	<td>학점</td>
	<td>평가</td>
	<td cellpadding="0"><a href="GradeCal.php?mode=deleteAll">[전체삭제]</a></td>
<tr/>
<!--데이터베이스출력-->
<?
	#Database Connect
	$connect = mysql_connect("localhost","jun","1234");
	mysql_select_db("test",$connect);

	#Show Data
	$sql="select * from grade";
	$result=mysql_query($sql);

	$count=1;
	(float)$total=0.0;
	$sum=0;

	while($row=mysql_fetch_array($result)){
		echo "<tr align='center'>";
		echo "<td>$count</td>";
		echo "<td>$row[name]</td>";
		echo "<td>$row[sub]</td>";
		echo "<td>$row[grade]</td>";
		echo "<td><a href='GradeCal.php?mode=delete&name=$row[name]'>[삭제]</a></td>";
		echo "</tr>";
		$count++;
		$sum+=(int)$row[sub];
		$total+=$row[sub]*(float)$row[point];
	}
	echo "<tr align='center'>";
	echo "<td>총계</td>";
	echo "<td>$total</td>";
	echo "<td>평점</td>";
	if($sum != 0)
		$total = round($total / $sum, 2) ;
	echo "<td colspan='2'>$total</td></tr>";

	mysql_close();
?>
</table>
