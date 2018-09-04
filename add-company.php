<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

function addCompany($value='')
{
	global $bdd;

	$company_name = $_POST["company_name"];
	$company_address = $_POST["company_address"];
	$country = $_POST["country"];
	$VAT_number = $_POST["VAT_number"];
	$company_phone = $_POST["company_phone"];
	$company_type = $_POST["company_type"];

	if ($company_name != "" AND $company_address != "" AND $country != "" AND $VAT_number !="" AND $company_phone !="") {
		$sql = $bdd->prepare('INSERT INTO company(company_name, company_address, country, VAT_number, company_phone, company_type) VALUES(:company_name, :company_address, :country, :VAT_number, :company_phone, :company_type)');
		$sql->execute(array(
			'company_name' => $company_name,
			'company_address' => $company_address,
			'country' => $country,
			'VAT_number' => $VAT_number,
			'company_phone' => $company_phone,
			'company_type' => $company_type
		));

		// $sql = $bdd->query("INSERT INTO `company` (`company_name`, `company_address`, `country`, `VAT_number`, `company_phone`, `company_type`) VALUES
		// ('$company_name', '$company_address', '$country', '$VAT_number', '$company_phone', '$company_type')");

		if ($company_type == '0') {
			header("Location:suppliers.php");
		} else {
			header("Location:customers.php");
		}
	}else {
    echo "Champs incomplets";
  }
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Ajout d'une scoiété</title>
		<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
	</head>
	<body>
		<a href="log-in-form.php">Déconnexion</a>
		<h1>Ajout d'une société</h1>
	  <a href="accueil.php">Retour à l'accueil</a>
		<form action="" method="post">
			<div>
				<label for="company_name">Désignation sociale</label>
				<input type="text" name="company_name" value="">
			</div>
	    <div>
				<label for="company_address">Adresse</label>
				<input type="textarea" name="company_address" value="">
			</div>
			<div>
				<label for="country">Pays</label>
				<input type="text" name="country" value="">
			</div>
	    <div>
				<label for="VAT_number">Numéro de TVA</label>
				<input type="text" name="VAT_number" value="">
			</div>
			<div>
				<label for="company_phone">Numéro de téléphone</label>
				<input type="text" name="company_phone" value="">
			</div>
			<div>
				<label for="company_type">Type de company</label>
				<select class="" name="company_type">
					<option value="0">Fournisseur</option>
					<option value="1">Client</option>
				</select>
			</div>
		    </div>
			<button type="submit" name="button">Envoyer</button>
		</form>
		<?php if (isset($_POST["button"])) addCompany(); ?>
	</body>
</html>
