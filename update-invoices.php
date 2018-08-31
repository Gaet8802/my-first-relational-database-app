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

$rep = $bdd->prepare("SELECT * FROM invoices WHERE invoice_number='$id'");
$rep->execute();

$donnees = $rep->fetch();

function updateInvoices($value='')
{
	global $bdd;
	global $id;
	$invoice_date = $_POST["invoice_date"];
	$designation = $_POST["designation"];

	if ($invoice_date != NULL AND $designation != "") {

		$sql = $bdd->prepare("UPDATE invoices SET invoice_date='$invoice_date', designation='$designation' WHERE id='$id'");
		$sql->execute();
    header("Location:".$_POST['hiddenPage']."");
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
	<a href="accueil.php">Retour à l'accueil.</a>
	<h1>Modifier</h1>
	<form action="" method="post">
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
