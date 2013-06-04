<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>重置密码</h2>
		<div>
			访问这里重置密码： {{ URL::to('user/reset_password', array($token)) }} 。
		</div>
	</body>
</html>