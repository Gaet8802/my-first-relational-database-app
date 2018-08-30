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

<div class="field">
<form action="accueil.php" method="post">
  <label class="label">Nom Prénom</label>
  <div class="control">
    <input class="input" type="text" placeholder="Votre nom ici">
  </div>
</div>
<div class="field">
  <label class="label">Société</label>
  <div class="control">
    <div class="select">
      <select>
        <option>a </option>
        <option>b </option>
      </select>
    </div>
  </div>
</div>
<div class="field">
  <label class="label">Email</label>
  <div class="control has-icons-left has-icons-right">
    <input class="input is-danger" type="email" placeholder="@Email input">
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
  </div>
  <p class="help is-danger">This email is invalid</p>
</div>
<div class="field">
  <div class="control">
    <label class="checkbox">
      <input type="checkbox">
      I agree to the <a href="#">terms and conditions</a>
    </label>
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link">Submit</button>
  </div>
  <div class="control">
    <button class="button is-text">Cancel</button>
  </div>
  </form>
</div>

</body>