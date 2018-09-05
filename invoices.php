<?php

require 'DBconnect.php';

function showInvoices($value='')
{
  global $bdd;

  echo "
    <tr>
		<th>Company</th>
		<th>Nom du client</th>
     <th>Invoice date</th>
     <th>Designation</th>
    </tr>
  ";

  $reponse = $bdd->prepare('SELECT Invoices.invoice_number,Invoices.id_company,Invoices.customer_name,Invoices.invoice_date,Invoices.designation, company.company_name
FROM invoices, company
WHERE id_company = company.id');
  $reponse ->execute();

  foreach($reponse as $donnees)
  {
    echo "
      <tr>
				<td>" . $donnees['company_name'] . "</td>
				<td>" . $donnees['customer_name'] . "</td>
        <td>" . $donnees['invoice_date'] . "</td>
        <td>" . $donnees['designation'] . "</td>
        <td>
          <form class='' action='' method='post'>
            <input type='submit' class='btn btn-warning m-1 text-white' name='submitShow' value='Show'>
						<input type='hidden' class='btn btn-warning m-1 text-white' name='show' value='".$donnees['invoice_number']."'>
						<input type='hidden' class='btn btn-warning m-1 text-white' name='hiddenPage' value='invoices.php'>
					</form>
          <form class='' action='update-invoices.php?id=". $donnees['invoice_number']."' method='post'>
            <input type='submit' class='btn btn-warning m-1 text-white' name='submitEdit' value='Edit'>
            <input type='hidden' class='btn btn-warning m-1 text-white' name='edit' value='".$donnees['invoice_number']."'>
            <input type='hidden' class='btn btn-warning m-1 text-white' name='hiddenPage' value='invoices.php'>
          </form>
          <form class='' action='delete-invoices.php' method='post'>
            <input type='submit' class='btn btn-warning m-1 text-white' name='submitDelete' value='Delete'>
            <input type='hidden' class='btn btn-warning m-1 text-white' name='delete' value='".$donnees['invoice_number']."'>
            <input type='hidden' class='btn btn-warning m-1 text-white' name='hiddenPage' value='invoices.php'>
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
    <title>Factures</title>
  </head>
  <body>
		<?php include 'header.php' ?>
    <form class="col-sm" action="add-factures.php" method="post">
			<input type="submit" class="btn btn-success mt-4 mb-1" name="submit" value="Ajouter une facture">
    </form>
    <table class="table table-bordered">
	  	<?php showInvoices(); ?>
    </table>
  </body>
</html>
