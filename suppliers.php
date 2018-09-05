<?php

require 'DBconnect.php';

function showSuppliers($value='')
{
  global $bdd;

  echo "
    <tr>
     <th>Company name</th>
     <th>Company address</th>
     <th>Country</th>
     <th>VAT number</th>
     <th>Company phone</th>
    </tr>
  ";


  $reponse = $bdd->prepare("SELECT Company.id, Company.company_name, Company.company_address, Company.country, Company.VAT_number, Company.company_phone, Company.company_type
	FROM Company, Company_Type
	WHERE Company.company_type = Company_Type.id AND Company_Type.type_name = 'supplier';");
  $reponse ->execute();

  foreach($reponse as $donnees)
  {
    echo "
      <tr>
        <td>" . $donnees['company_name'] . "</td>
        <td>" . $donnees['company_address'] . "</td>
        <td>" . $donnees['country'] . "</td>
        <td>" . $donnees['VAT_number'] . "</td>
				<td>" . $donnees['company_phone'] . "</td>
        <td>
          <form class='' action='' method='post'>
						<input type='submit' name='submitShow' value='Show'>
						<input type='hidden' name='show' value='".$donnees['id']."'>
						<input type='hidden' name='hiddenPage' value='suppliers.php'>
					</form>
          <form class='' action='update-suppliers.php?id=". $donnees['id']."' method='post'>
						<input type='submit' name='submitEdit' value='Edit'>
						<input type='hidden' name='edit' value='".$donnees['id']."'>
						<input type='hidden' name='hiddenPage' value='suppliers.php'>
          </form>
          <form class='' action='delete-suppliers.php' method='post'>
						<input type='submit' name='submitDelete' value='Delete'>
						<input type='hidden' name='delete' value='".$donnees['id']."'>
						<input type='hidden' name='hiddenPage' value='suppliers.php'>
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
    <title>Suppliers</title>
  </head>
  <body>
    <?php include 'header.php' ?>
    <form class="" action="add-company.php" method="post">
			<input type="submit" name="" value="Add company">
    </form>
    <table>
	  	<?php showSuppliers(); ?>
    </table>
  </body>
</html>
