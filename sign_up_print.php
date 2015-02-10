<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?
	$phone = $_POST['phone1']."-".$_POST['phone2']."-".$_POST['phone3'];
	echo "아이디 : ".$_POST['id']."<br>";
	echo "이름 : ".$_POST['name']."<br>";
	echo "비밀번호 : ".$_POST['password']."<br>";
	echo "비밀번호 확인 : ".$_POST['password_confirm']."<br>";
	echo "성별 : ".$_POST['gender']."<br>";
	echo "핸드폰 : $phone<br>";
	echo "자기소개 : ".$_POST['intro']."<br>";
	echo "제목(hidden type에서 전달) : ".$_POST['title']."<br>";
?>
</body>
</html>
