<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TP</title>
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<p>
<?php 
session_start();
$_SESSION=array();
session_destroy();
header("location: login.php" ) ;
	$bdd = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', 'rootmos');

 ?>
	</p>
</body>
</html>