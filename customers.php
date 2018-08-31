<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=utf8', 'root', '');
}
catch(Exception $e)
{
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

  $reponse = $bdd->prepare('SELECT * FROM company');
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
          <form class='' action='' method='post'>
            <button type='button' values=".$donnees['id']." name='show'>Show</button>
          </form>
          <form class='' action='' method='post'>
            <button type='button' values=".$donnees['id']." name='edit'>Edit</button>
          </form>
          <form class='' action='' method='post'>
            <button type='button' values=".$donnees['id']." name='delete'>Delete</button>
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
    <title>Customers</title>
  </head>
  <body>
    <h1>Your Customers</h1>
    <h3>Customers</h3>
    <a href="#">Index</a>
    <a href="#">Suppliers</a>
    <a href="#">Customers</a>
    <form class="" action="" method="post">
      <button type="button" name="button">Add customers</button>
    </form>
    <table>
	  	<?php showCustomers(); ?>
    </table>
  </body>
</html>
