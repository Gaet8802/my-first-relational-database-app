<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajout d'une facture</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="">Déconnexion</a>
	<h1>Ajout d'une facture</h1>
    <a href="">Retour à l'accueil</a>
    <h3>Création d'une facture</h3>
	<form action="" method="post">
		<div>
			<label for="Numéro">Numéro de la facture</label>
			<input type="text" name="name" value="">
		</div>
        <div>
			<label for="Date">Date de la facture</label>
			<input type="text" name="name" placeholder="00/00/00">
		</div>
        <div>
			<label for="société">Société</label>
			<select name="société">
				<option value="">a </option>
				<option value="">b </option>
				<option value="">c </option>
				<option value="">d </option>
				<option value="">e </option>
			</select>
		</div>
	    <div>
			<label for="Objet de la facture">Objet de la facture</label>
			<input type="textarea" name="commentaires" value="">
		</div>
	    </div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>