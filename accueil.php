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
         </table>';
}
$resultat = $bdd->query('SELECT * FROM customers ORDER BY Customer_number DESC LIMIT 5');

while ($donnees= $resultat->fetch()){
    echo '<table>
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
         </table>';
}

$resultat = $bdd->query('SELECT * FROM company_type INNER JOIN company ON company_type.id=company.company_name');


foreach($resultat as $donnees){
    $id=$donnees['id'];
    echo '<table>
            <tr>
                <td>
                    <a href="route_company.php?">'.$donnees['company_name'].'</a>
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
                </tr>
         </table>';
}
?>