<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>route_company-details</title>
  <link rel="stylesheet" media="screen" title="no title" charset="utf-8">
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<?php
include 'header.php';
?>
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

$id = $_POST['show'];
echo $id;

$result = $bdd ->prepare("SELECT Company.company_name, Company.company_address, Company.company_phone, Company.VAT_number, Invoices.invoice_number, Invoices.customer_name, Invoices.invoice_date, Invoices.designation
FROM Company, Invoices
WHERE Company.id ='.$id.'");
$result -> execute();
foreach($result as $donnees){
	echo '
<table>
	<tr>
		<td>'.$donnees['company_name'].'
		</td>
		<td>'
			.$donnees['company_address'].
		'</td>
		<td>'.$donnees['country'].
		'</td>
		<td>'.$donnees['company_phone'].
		'</td>
		<td>'.$donnees['VAT_number'].
		'</td>
		<td>'.$donnees['invoice_number'].
		'</td>
		<td>'.$donnees['invoice_date'].
		'</td>
		<td>'.$donnees['designation'].
		'</td>
	</tr>
</table>';
}
				?>