<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h2> 회원가입</h2>
<form name="sign_up" method="post" action="sign_up_print.php">
<input type="hidden" name="title" value="회원가입양식">
<table border="1" width="640" cellspacing="1" cellpadding="4">
<tr>
	<td align="right">* 아이디:</td>
	<td><input type="text" size="15" maxlength="12" name="id" value="guest"/></td>
</tr>
<tr>
	<td align="right">* 이름:</td>
	<td><input type="text" size="15" maxlength="12" name="name"/></td>
</tr>
<tr>
	<td align="right">* 비밀번호:</td>
	<td><input type="password" size="15" maxlength="12" name="password">
</tr>
<tr>
	<td align="right">* 비밀번호 확인:</td>
	<td><input type="password" size="15" maxlength="12" name="password_confirm"></td>
<tr>
	<td align="right">성별:</td>
	<td><input type="radio" name="gender" value="M" checked>남자
		<input type="radio" name="gender" value="F">여자</td>
</tr>
<tr>
	<td align="right">핸드폰:</td>
	<td><select name="phone1">
		<option>선택</option>
		<option value="010">010</option>
		<option value="011">011</option>
		<option value="019">019</option>
		</select>-
		<input type="text" size="5" maxlength="4" name="phone2">-
		<input type="text" size="5" maxlength="4" name="phone3"></td>
</tr>
<tr>
	<td align="right">자기소개:</td>
	<td><textarea name="intro" rows="5" cols="60"></textarea></td>
</tr>
</table>
<br/>
<table border="0" width="640">
<tr><td align="center">
	<input type="submit" value="확인">
	<input type="reset" value="다시작성"></td>
</tr>
</table>
</form>
</body>
</html>
