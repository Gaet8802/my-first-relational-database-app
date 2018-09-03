<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

function addAnnuaire($value='')
{
	global $bdd;

	$company = $_POST["company"];
	$last_name = $_POST["last_name"];
	$first_name = $_POST["first_name"];
	$phone_number = $_POST["phone_number"];
	$email = $_POST["email"];

	if ($company != "" AND $last_name != "" AND $first_name != "" AND $phone_number !="" AND $email !="") {
		$sql = $bdd->prepare('INSERT INTO customers(company, last_name, first_name, phone_number, email) VALUES(:company, :last_name, :first_name, :phone_number, :email)');
		$sql->execute(array(
			'company' => $company,
			'last_name' => $last_name,
			'first_name' => $first_name,
			'phone_number' => $phone_number,
			'email' => $email
		));
		echo " <p> La facture a été ajoutée avec succès. </p>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajout d'un contact</title>
  <link rel="stylesheet" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css">
  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
</head>
<body>
	<a href="">Déconnexion</a>
	<h1>Ajout d'un contact</h1>
	<a href="">Retour à l'accueil</a>
	<form action="" method="post">
	  <div class="">
	    <label for="company">Company name</label>
			<input type="text" name="company" value="">
	  </div>
		<div>
			<label for="last_name">Last name</label>
			<input type="text" name="last_name" value="">
		</div>
		<div>
			<label for="first_name">First name</label>
			<input type="text" name="first_name" value="">
		</div>
		<div>
			<label for="phone_number">Phone number</label>
			<input type="duration" name="phone_number" value="">
		</div>
		<div>
			<label for="email">Email</label>
			<input type="text" name="email" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php if (isset($_POST["button"])) addAnnuaire(); ?>
</body>
</html>
