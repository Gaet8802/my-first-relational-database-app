<?php

require 'DBconnect.php';

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
    header("Location:customers.php");
	}else {
    echo "Champs incomplets";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<title>Modifier une société</title>
</head>
<body>
	<?php include 'header.php' ?>
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
