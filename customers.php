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
     <th>Last name</th>
     <th>First name</th>
     <th>Phone number</th>
     <th>Email</th>
     <th>Actions</th>
    </tr>
  ";

  $reponse = $bdd->prepare('SELECT * FROM customers');
  $reponse ->execute();

  foreach($reponse as $donnees)
  {
    echo "
      <tr>
        <td>" .$donnees['last_name'] . "</td>
        <td>" . $donnees['first_name'] . "</td>
        <td>" . $donnees['phone_number'] . "</td>
        <td>" . $donnees['email'] . "</td>
        <td>
          <form class='' action='' method='post'>
            <button type='button' name='button'>Show</button>
          </form>
          <form class='' action='' method='post'>
            <button type='button' name='button'>Edit</button>
          </form>
          <form class='' action='' method='post'>
            <button type='button' name='button'>Delete</button>
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
