<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>验证并设置密码</h2>
		<div>
			请访问如下地址进行账号验证并且设置密码：<br />
            {{ URL::to('user/reset_password', array($token)) }} 
		</div>
	</body>
</html>