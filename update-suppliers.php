<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

$id = $_GET["id"];

$rep = $bdd->prepare("SELECT * FROM company WHERE id='$id'");
$rep->execute();

$donnees = $rep->fetch();

function updateCustomers($value='')
{
	global $bdd;
	global $id;
	$company_name = $_POST["company_name"];
	$company_address = $_POST["company_address"];
	$country = $_POST["country"];
	$VAT_number = $_POST["VAT_number"];
	$company_phone = $_POST["company_phone"];

	if ($company_name != "" AND $company_address != "" AND $country != ""AND $VAT_number != "" AND $company_phone != "") {

		$sql = $bdd->prepare("UPDATE company SET company_name='$company_name', company_address='$company_address', country='$country', VAT_number='$VAT_number', company_phone='$company_phone' WHERE id='$id'");
		$sql->execute();
    header("Location:suppliers.php");
	}else {
    echo "Champs incomplets";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une société</title>
</head>
<body>
  <a href="log-in-form.php">Déconnexion</a>
  <a href="accueil.php">Retour à l'accueil</a>	<h1>Modifier</h1>
	<form action="" method="post">
		<div>
			<label for="company_name">Company name</label>
			<input type="text" name="company_name" value="<?php echo $donnees['company_name']; ?>">
		</div>
		<div>
			<label for="company_address">Company address</label>
			<input type="text" name="company_address" value="<?php echo $donnees['company_address']; ?>">
		</div>
		<div>
			<label for="country">Country</label>
			<input type="duration" name="country" value="<?php echo $donnees['country']; ?>">
		</div>
		<div>
			<label for="VAT_number">VAT number</label>
			<input type="text" name="VAT_number" value="<?php echo $donnees['VAT_number']; ?>">
		</div>
    <div>
			<label for="company_phone">Company phone</label>
			<input type="text" name="company_phone" value="<?php echo $donnees['company_phone']; ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php if (isset($_POST["button"])) updateCustomers(); ?>
</body>
</html>
