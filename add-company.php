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
			<label for="Name">Désignation sociale</label>
			<input type="text" name="name" value="">
		</div>
        <div>
			<label for="adress">Adresse</label>
			<input type="textarea" name="name" value="">
		</div>
        <div>
			<label for="pays">Pays</label>
			<select name="société">
				<option value="">a </option>
				<option value="">b </option>
				<option value="">c </option>
				<option value="">d </option>
				<option value="">e </option>
			</select>
		</div>
	    <div>
			<label for="numéro">Numéro de téléphone</label>
			<input type="text" name="numéro" value="">
		</div>
        <div>
			<label for="numéro">Numéro de TVA</label>
			<input type="text" name="numéro" value="">
		</div>
	    </div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>