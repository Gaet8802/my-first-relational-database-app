<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root','');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
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
		 <th>Company type</th>
    </tr>
  ";


  $reponse = $bdd ->prepare("SELECT Company.company_name, Company.company_address, Company.company_phone, Company.VAT_number, Invoices.invoice_number, Invoices.customer_name, Invoices.invoice_date, Invoices.designation
FROM Company, Invoices
WHERE Company.id =invoices.id_company");
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
				<td>" . $donnees['company_type'] . "</td>
        <td>
          <form class='' action='route_company.php' method='post'>
						<input type='submit' name='submitShow' value='Show'>
						<input type='hidden' name='show' value='".$donnees['id_company']."'>
						<input type='hidden' name='hiddenPage' value='customers.php'>
					</form>
          <form class='' action='update-customers.php' method='post'>
						<input type='submit' name='submitEdit' value='Edit'>
						<input type='hidden' name='edit' value='".$donnees['id']."'>
						<input type='hidden' name='hiddenPage' value='customers.php'>
          </form>
          <form class='' action='' method='post'>
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
    <title>Route_company</title>
  </head>
  <body>
    <h1>Your Customers</h1>
    <h3>Customers</h3>
    <a href="#">Index</a>
    <a href="#">Suppliers</a>
    <a href="#">Customers</a>
    <form class="" action="annuaire.php" method="post">
			<input type="submit" name="" value="Add customers">
    </form>
    <table>
	  	<?php showCustomers(); ?>
    </table>
  </body>
</html>
}




?>
