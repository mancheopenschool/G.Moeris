<html>
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TP</title>
</head>
<body>
<img src="../<?php echo $user ['avatar']?>">

<p>
	<?php 
	if (firstname == "") {
		echo "Prenom : Ne donne pas l'information"
	}
	else {
		echo "Prenom :" . $firstname
	}
 ?>
</p>
<p>
	<?php 
	if (lastname == "") {
		echo "Nom : Ne donne pas l'information"
	}
	else {
		echo "Nom :" . $lastname
	}
 ?>
</p>
<p>
	<?php 
		echo "Pseudo :" . $user

 ?>
</p>
</body>
</html>