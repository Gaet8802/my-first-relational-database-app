<?php

require 'DBconnect.php';

$id = $_GET["id"];

$rep = $bdd->prepare("SELECT * FROM invoices WHERE invoice_number='$id'");
$rep->execute();

$donnees = $rep->fetch();

function optionCompany($value='')
{
	global $bdd;
	$reponse = $bdd->prepare('SELECT * FROM company');
	$reponse ->execute();

	foreach($reponse as $donnees)
	{
		echo "
			<option value='". $donnees['id'] ."'>". $donnees['company_name'] ."</option>
		";
	}
}

function optionCustomer($value='')
{
	global $bdd;
	$reponse = $bdd->prepare('SELECT * FROM customers');
	$reponse ->execute();

	foreach($reponse as $donnees)
	{
		echo "
			<option value='". $donnees['last_name'] ."'>". $donnees['last_name'] ."</option>
		";
	}
}

function updateInvoices($value='')
{
	global $bdd;
	global $id;
  $id_company = $_POST['id_company'];
  $customer_name = $_POST['customer_name'];
	$invoice_date = $_POST["invoice_date"];
	$designation = $_POST["designation"];

	if ($invoice_date != NULL AND $customer_name != "Choose" AND $id_company != "Choose" AND $designation != "") {

		$sql = $bdd->prepare(
      "UPDATE invoices
      SET id_company='$id_company', customer_name='$customer_name', invoice_date='$invoice_date', designation='$designation'
      WHERE invoice_number='$id'");
		$sql->execute();
    header("Location:invoices.php");
	}else {
    echo "Champs incomplets";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une facture</title>
</head>
<body>
  <a href="logout.php">Déconnexion</a>
  <a href="accueil.php">Retour à l'accueil</a>
	<h1>Modifier</h1>
	<form action="" method="post">
    <div>
			<label for='id_company'>Société</label>
			<select name='id_company'>
				<option value='Choose'>Choose</option>
				<?php optionCompany(); ?>
			</select>
		</div>
    <div>
			<label for='customer_name'>Nom du client</label>
			<select name='customer_name'>
				<option value='Choose'>Choose</option>
				<?php optionCustomer(); ?>
			</select>
		</div>
		<div>
			<label for="invoice_date">Invoice date</label>
			<input type="date" name="invoice_date" value="<?php echo $donnees['invoice_date']; ?>">
		</div>
		<div>
			<label for="designation">Designation</label>
			<input type="text" name="designation" value="<?php echo $donnees['designation']; ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php if (isset($_POST["button"])) updateInvoices(); ?>
</body>
</html>
