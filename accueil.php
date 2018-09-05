<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Accueil</title>
  <link rel="stylesheet" media="screen" title="no title" charset="utf-8">
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

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
?>

<table class="table table-bordered">
    <thead class ="thead-dark">
        <tr>
            <th scope="col">Nom de l'entreprise</th>
            <th scope="col">Nom du client</th>
            <th scope="col">Date de la facture</th>
            <th scope="col">Motifs</th>
        </tr>
    </thead>
<?php    
while ($donnees= $resultat->fetch()){
    echo
        '<tbody>
            <tr>
                <td>'.$donnees['id_company'].'</td>
                <td>'.$donnees['customer_name'].'</td>
                <td>'.$donnees['invoice_date'].'</td>
                <td>'.$donnees['designation'].'</td>
            </tr>
        </tbody>'
    ;}
?>
</table>
<table class="table table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Numéro de téléphone</th>
            <th scope="col">E-mail</th>
        </tr>
    </thead>
<?php        

$resultat = $bdd->query('SELECT * FROM customers ORDER BY Customer_number');

while ($donnees= $resultat->fetch()){
    echo 
    '<tbody>
        <tr>
            <td>'.$donnees['last_name'].'</td>
            <td>'.$donnees['first_name'].'</td>
            <td>'.$donnees['phone_number'].'</td>
            <td>'.$donnees['email'].'</td>
        </tr>
    </tbody>'
;}
?>
</table>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Nom de l'entreprise</th>
            <th scope="col">Nom du client</th>
            <th scope="col">Date de la facture</th>
            <th scope="col">Motifs</th>
        </tr>
    </thead>
<?php

$resultat = $bdd->prepare('select Company.id,Company.company_name,Company.company_address,Company.country,Company.VAT_number,Company.company_phone,Company_Type.type_name
from Company,Company_Type where Company.company_type = company_Type.id');
$resultat -> execute();

foreach($resultat as $donnees){
    
    echo '<tbody>
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
            </tbody>'
                    ;
}
?>
</table>
</body>

