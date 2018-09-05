<?php

require 'DBconnect.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>PHP Login Session</h1>
<div id="login">
<h2>Login Form</h2>
<form action="login.php" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="Username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="Password" type="password">
<input name="submit" type="submit" value=" Login ">

</form>
</div>
</div>
</body>
</html>
