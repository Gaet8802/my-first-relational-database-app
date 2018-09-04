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
<nav class="navbar" role="navigation" aria-label="main navigation">
    <nav class="navbar is-primary">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Home
                </a>
            </div>

            <div class="navbar-end">
                <a class="navbar-item">
                    end
                </a>
            </div>
        </div>
    </nav>
</nav>
<section class="section">
    <div class="container">
      <h1 class="title">Section</h1>
      <h2 class="subtitle">



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

$resultat = $bdd->query('SELECT * FROM invoices ORDER BY invoice_date ASC LIMIT 5');

while ($donnees= $resultat->fetch()){
    echo '<table>
                <tr>
                    <td>'.$donnees['id_company'].
                   '</td>
                    <td>'.$donnees['id_customer'].
                   '</td>
                    <td>'.$donnees['invoice_date'].
                   '</td>
                    <td>'.$donnees['designation'].
                   '</td>
                </tr>
         </table></h2>';
}
$resultat = $bdd->query('SELECT * FROM customers ORDER BY Customer_number DESC LIMIT 5');

while ($donnees= $resultat->fetch()){
    echo '<h2>
            <table>
                <tr>
                    <td>'.$donnees['last_name'].
                   '</td>
                    <td>'.$donnees['first_name'].
                   '</td>
                    <td>'.$donnees['phone_number'].
                   '</td>
                    <td>'.$donnees['email'].
                   '</td>
                   <td>
                </tr>
            </table>
         </h2>';
}

$resultat = $bdd->prepare('select Company.id,Company.company_name,Company.company_address,Company.country,Company.VAT_number,Company.company_phone,Company_Type.type_name
from Company,Company_Type where Company.company_type = company_Type.id limit 5');
$resultat -> execute();

foreach($resultat as $donnees){
    
    echo '<h2>
            <table>
                <tr>
                    <td>
                        '.$donnees['company_name'].'
                    </td>
                    <td>'
                        .$donnees['company_address'].
                    '</td>
                    <td>'
                        .$donnees['country'].
                    '</td>
                    <td>'.$donnees['VAT_number'].
                    '</td>
                    <td>'.$donnees['company_phone'].
                    '</td>
                    <td>'.$donnees['type_name'].
                   '</td>
                   <td>
                   <form class="" action="route_company.php" method="post">
                                 <input type="submit" name="submitShow" value="Show">
                                 <input type="hidden" name="show" value="'.$donnees['id'].'">
                                 <input type="hidden" name="hiddenPage" value="customers.php">
                             </form>
                   <form class="" action="update-customers.php" method="post">
                                 <input type="submit" name="submitEdit" value="Edit">
                                 <input type="hidden" name="edit" value="'.$donnees['id'].'">
                                 <input type="hidden" name="hiddenPage" value="customers.php">
                   </form>
                   <form class="" action="" method="post">
                                 <input type="submit" name="submitDelete" value="Delete">
                                 <input type="hidden" name="delete" value="'.$donnees['id'].'">
                                 <input type="hidden" name="hiddenPage" value="customers.php">
                   </form>
                 </td>
                </tr>
            </table>
         </h2>';
}
?>


    </div>
  </section>
</body>

