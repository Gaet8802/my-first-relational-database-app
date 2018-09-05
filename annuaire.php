<?php

require 'DBconnect.php';

function showPeople($value='')
{
  global $bdd;

  echo "
    <tr>
		<th scope='col'>Company</th>
     <th scope='col'>Last name</th>
     <th scope='col'>First name</th>
     <th scope='col'>Phone number</th>
     <th scope='col'>Email</th>
    </tr>
  ";

  $reponse = $bdd->prepare('SELECT * FROM customers');
  $reponse ->execute();

  foreach($reponse as $donnees)
  {
    echo "
      <tr>
				<td>" . $donnees['company'] . "</td>
        <td>" . $donnees['last_name'] . "</td>
        <td>" . $donnees['first_name'] . "</td>
        <td>" . $donnees['phone_number'] . "</td>
        <td>" . $donnees['email'] . "</td>
        <td>
          <form class='' action='' method='post'>
            <input type='submit' class='btn btn-warning m-1 text-white' name='submitShow' value='Show'>
            <input type='hidden' class='btn btn-warning m-1 text-white' name='show' value='".$donnees['Customer_number']."'>
            <input type='hidden' class='btn btn-warning m-1 text-white' name='hiddenPage' value='annuaire.php'>
          </form>
          <form class='' action='update-annuaire.php?id=". $donnees['Customer_number']."' method='post'>
            <input type='submit' class='btn btn-warning m-1 text-white' name='submitEdit' value='Edit'>
            <input type='hidden' class='btn btn-warning m-1 text-white' name='edit' value='".$donnees['Customer_number']."'>
            <input type='hidden' class='btn btn-warning m-1 text-white' name='hiddenPage' value='annuaire.php'>
          </form>
          <form class='' action='delete-annuaire.php' method='post'>
						<input type='submit' class='btn btn-warning m-1 text-white' name='submitDelete' value='Delete'>
						<input type='hidden' class='btn btn-warning m-1 text-white' name='delete' value='".$donnees['Customer_number']."'>
						<input type='hidden' class='btn btn-warning m-1 text-white' name='hiddenPage' value='annuaire.php'>
          </form>
        </td>
      </tr>
    ";
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <title>Annuaire</title>
  </head>
  <body>
		<?php include 'header.php' ?>
    <form class="col-sm" action="add-contact-bulma.php" method="post">
      <input type="submit" class="btn btn-success mt-4 mb-1" name="submit" value="Ajouter un contact">
    </form>
    <table class="table table-bordered">
	  	<?php showPeople(); ?>
    </table>
  </body>
</html>
