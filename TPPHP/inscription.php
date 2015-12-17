<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TP</title>
	<link rel="stylesheet" href="./css/custom.css">
</head>
<body>
	<form action="inscription.php" method="POST" enctype="multipart/form-data">
		<label for="login">Pseudo *:<input type="text" id="login" name="login"/></label>
		<label for="password">Mot de passe *:<input type="password" id="password" name="password"/></label>
		<label for="confirmpassword">Confirmer le Mot de passe *:<input type="password" id="confirmpassword" name="confirmpassword"/></label>
		<label for="firstname">Prenom:<input type="text" id="firstname" name="firstname"/></label>
		<label for="lastname">Nom:<input type="text" id="lastname" name="lastname"/></label>
		<label for="avatar">Avatar:<input type="text" id="avatar" name="avatar"/></label>
		<input type="submit" id="submit" name="submit" value="Connexion"/>
	</form>
<?php 
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8','root','rootmos');
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage() );
	}
	
if (isset($_POST["submit"])){
    if ($_POST["login"] == "" || $_POST["password"] == "" || $_POST["confirmpassword"] == "" ){
 	echo "Les champs avec \"*\" ne doivent pas être vides";
}
}
else {
	$sql = $bdd->query("SELECT * FROM user WHERE login = '".$_POST['login']."'");
	$row = $sql->fetch();
	if ($row == true)	{
		echo "Pseude déja pris";
			}
	else {
		if ($_POST['password'] != $_POST['confirmpassword']) {
			echo "Les mots de passe sont differents !";
			}
			else {
				$hash = password_hash($_POST["password"],PASSWORD_BCRYPT)
				if ($_POST["nom"] == "") {
					$lastname = "NULL";
				} else {
					$lastname = " ".$_POST["nom"]
				}
				if ($_POST["prenom"]== "") {
					$firstname = "NULL";
				} else {
					$firstname = " ".$_POST["prenom"]
				}
				if ($_FILES["avatar"]["tmp_name"]) {
					if ($_FILES["icone"]["error"]) {
						echo "Erreur de Transfert";
					} else {
						$valext = array("jpg", "jpeg", "gif", "png");
						$uptext = strtolower(substr(strrchr($_FILES ["avatar"]["name"], "."), 1));
						if (!in_array($uptext, $valext)) {
							echo "extention incorrecte";
						} else {
							$avatar = md5(uniqid(rand(), true)).".". $upext;
							$nom = "../images".avatar;
							$resultat = move_uploaded_file($_FILES["avatar"]["tmp_name"],$nom);
						}						
					}				 
				}
				else
					$avatar = "avatar.jpg";
				$sqli = $bdd->query("INSERT INTO user (login, password, firstname, lastname, avatar) VALUES ('".$_POST['login']."', '".$hash."', ".$firstname.", ".$lastname.", '".$avatar."')");
				header("Location: login.php?r=".$_POST['login']);
				exit();
			}
		}
	}
?>		
</body>
</html>
