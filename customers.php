<?php

require 'DBconnect.php';

function showCustomers($value='')
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
	WHERE Company.company_type = Company_Type.id AND Company_Type.type_name = 'Customer';");
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
						<input type='hidden' name='hiddenPage' value='customers.php'>
					</form>
          <form class='' action='update-customers.php?id=". $donnees['id']."' method='post'>
						<input type='submit' name='submitEdit' value='Edit'>
						<input type='hidden' name='edit' value='".$donnees['id']."'>
						<input type='hidden' name='hiddenPage' value='customers.php'>
          </form>
          <form class='' action='delete-customers.php' method='post'>
						<input type='submit' name='submitDelete' value='Delete'>
						<input type='hidden' name='delete' value='".$donnees['id']."'>
						<input type='hidden' name='hiddenPage' value='customers.php'>
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
    <title>Société</title>
  </head>
  <body>
		<?php include 'header.php' ?>
    <form class="" action="add-company.php" method="post">
			<input type="submit" name="" value="Add Company">
    </form>
    <table>
	  	<?php showCustomers(); ?>
    </table>
  </body>
</html>
