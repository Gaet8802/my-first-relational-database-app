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
$resultat = $bdd->query('SELECT * FROM company WHERE id="'.$_GET['id'].'"');

foreach($resultat as $donnees){
	echo '<table>
			<tr>
				<td>'.$donnees['company_name'].'</td>
				<td>'.$donnees['company_address'].'</td>
				<td>'.$donnees['company_phone'].'</td>
				<td>'.$donnees['VAT_number'].'</td>
			</tr>
		 </table>';

}


?>
