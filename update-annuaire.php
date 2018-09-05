<?php

require 'DBconnect.php';

$id = $_GET["id"];

$rep = $bdd->prepare("SELECT * FROM customers WHERE Customer_number='$id'");
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
			<option value='". $donnees['company_name'] ."'>". $donnees['company_name'] ."</option>
		";
	}
}

function updateAnnuaire($value='')
{
	global $bdd;
	global $id;
  $company = $_POST["company"];
	$last_name = $_POST["last_name"];
	$first_name = $_POST["first_name"];
	$phone_number = $_POST["phone_number"];
	$email = $_POST["email"];

	if ($company != "Choose" AND $last_name != "" AND $first_name != "" AND $phone_number != ""AND $email != "") {
		$sql = $bdd->prepare("UPDATE Customers SET company = '$company', last_name = '$last_name', first_name = '$first_name', phone_number = '$phone_number', email = '$email' WHERE Customers.Customer_number = $id ");
      echo $company;
      var_dump($_POST);
    $sql->execute();
    header("Location:annuaire.php");
	} else {
    echo "Champs incomplets";
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
  <?php include 'header.php' ?>
	<h1>Modifier</h1>
	<form action="" method="post">
    <div>
			<label for='company'>Société</label>
			<select name='company'>
				<option value='Choose'>Choose</option>
				<?php optionCompany(); ?>
			</select>
		</div>
		<div>
			<label for="last_name">Last name</label>
			<input type="text" name="last_name" value="<?php echo $donnees['last_name']; ?>">
		</div>
		<div>
			<label for="first_name">First name</label>
			<input type="text" name="first_name" value="<?php echo $donnees['first_name']; ?>">
		</div>
		<div>
			<label for="phone_number">Phone number</label>
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
