<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$id = $_POST["edit"];

$rep = $bdd->prepare("SELECT * FROM customers WHERE Customer_number='$id'");
$rep->execute();

$donnees = $rep->fetch();

function updateAnnuaire($value='')
{
	global $bdd;
	global $id;
	$last_name = $_POST["last_name"];
	$first_name = $_POST["first_name"];
	$phone_number = $_POST["phone_number"];
	$email = $_POST["email"];

	if ($last_name != "" AND $first_name != "" AND $phone_number != ""AND $email != "") {

		$sql = $bdd->prepare("UPDATE company SET last_name='$last_name', first_name='$first_name', phone_number='$phone_number', email='$email' WHERE Customer_number='$id'");
		$sql->execute();
    header("Location:".$_POST['hiddenPage']."");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier l'annuaire</title>
</head>
<body>
	<a href="accueil.php">Retour à l'accueil.</a>
	<h1>Modifier</h1>
	<form action="" method="post">
		<div>
			<label for="last_name">Last name</label>
			<input type="text" name="last_name" value="<?php echo $donnees['last_name']; ?>">
		</div>
		<div>
			<label for="first_name">First name</label>
			<input type="text" name="first_name" value="<?php echo $donnees['first_name']; ?>">
		</div>
		<div>
			<label for="phone_number">Hpone number</label>
			<input type="duration" name="phone_number" value="<?php echo $donnees['phone_number']; ?>">
		</div>
		<div>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $donnees['email']; ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php if (isset($_POST["button"])) updateAnnuaire(); ?>
</body>
</html>
