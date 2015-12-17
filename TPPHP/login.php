<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TP</title>
	<link rel="stylesheet" href="custom.css">
</head>
<body>
	<form action="login.php" method="POST">
		<p id="message">
		    <?php
			if (isset($_POST["submit"])){
			    if ($_POST["login"] == "" || $_POST["password"] == ""){
		        	echo "Les champs ne doivent pas être vides";
				}
				else {
				    echo verify_login($_POST["login"], $_POST["password"]);
				}
			}
			?>
		</p>
		<label for="login">Login:
			<input type="text" id="login" name="login"/>
		</label>
		<label for="password">Password:
			<input type="password" id="password" name="password"/>
		</label>
		<input type="submit" id="submit" name="submit" value="Connexion"/>
	</form>
</body>
</html>
<?php
function verify_login($login, $password){
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=tp_php;charset=utf8', 'root', 'rootmos');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	$req = $bdd->prepare('SELECT id, login, password FROM user WHERE login = ?');
	$req->execute(array($login));
	$user = $req->fetch();
	if (!$user){
		return ("Le login n'existe pas");
	}
	else {
		if ($user['password'] != $password){
			return ("Login ou mot de passe incorrect");
		}
		else {
			session_start();
			// $req = $bdd->prepare('UPDATE user SET last_login = ? WHERE id = ?');
			// $req->execute(array(date('Y-m-d H:i:s'), $user['id']));
			$_SESSION["user_id"] = $user['id'];
			header("Location:profil.php");
		}
	}
	$req->closeCursor();
}
?>
