<?php

require 'DBconnect.php';

function afficher5factures($value='')
{
  global $bdd;

  $resultat = $bdd->query('SELECT Company.company_name,Invoices.customer_name,Invoices.invoice_date,Invoices.designation
              from Company,Invoices
              where Invoices.id_company = Company.id
              ORDER BY invoice_date ASC LIMIT 5');

  echo "
    <h1 class='mt-2 d-flex justify-content-center display-4'>vos cinq dernières factures</h1>
    <table class='table table-bordered mt-4'>
        <thead>
            <tr>
                <th scope='col'>Nom de l'entreprise</th>
                <th scope='col'>Nom du client</th>
                <th scope='col'>Date de la facture</th>
                <th scope='col'>Motifs</th>
            </tr>
        </thead>
  ";

  while ($donnees= $resultat->fetch()){
    echo'
        <tbody>
          <tr>
            <td>'.$donnees['company_name'].'</td>
            <td>'.$donnees['customer_name'].'</td>
            <td>'.$donnees['invoice_date'].'</td>
            <td>'.$donnees['designation'].'</td>
            <td>
              <form class="" action="route_company.php" method="post">
                <input type="submit" class="btn btn-warning m-1 text-white" name="submitShow" value="Show">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="show" value="'.$donnees['invoice_number'].'">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
              </form>
              <form class="" action="update-customers.php" method="post">
                <input type="submit" class="btn btn-warning m-1 text-white" name="submitEdit" value="Edit">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="edit" value="'.$donnees['invoice_number'].'">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
              </form>
              <form class="" action="" method="post">
                <input type="submit" class="btn btn-warning m-1 text-white" name="submitDelete" value="Delete">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="delete" value="'.$donnees['invoice_number'].'">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
              </form>
            </td>
          </tr>
        </tbody>
    ';
  }
  echo "</table>";
}

function afficher5personnes($value='')
{
  global $bdd;

  $resultat = $bdd->query('SELECT * FROM customers ORDER BY Customer_number DESC LIMIT 5');

  echo "
    <h1 class='mt-2 d-flex justify-content-center display-4'>cinq dernières personnes encodées</h1>
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope='col'>Nom</th>
                <th scope='col'>Prénom</th>
                <th scope='col'>Numéro de téléphone</th>
                <th scope='col'>E-mail</th>
            </tr>
        </thead>
  ";

  while ($donnees= $resultat->fetch()){
    echo'
        <tbody>
          <tr>
            <td>'.$donnees['last_name'].'</td>
            <td>'.$donnees['first_name'].'</td>
            <td>'.$donnees['phone_number'].'</td>
            <td>'.$donnees['email'].'</td>
            <td>
              <form class="" action="route_company.php" method="post">
                <input type="submit" class="btn btn-warning m-1 text-white" name="submitShow" value="Show">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="show" value="'.$donnees['id'].'">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
              </form>
              <form class="" action="update-customers.php" method="post">
                <input type="submit" class="btn btn-warning m-1 text-white" name="submitEdit" value="Edit">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="edit" value="'.$donnees['id'].'">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
              </form>
              <form class="" action="" method="post">
                <input type="submit" class="btn btn-warning m-1 text-white" name="submitDelete" value="Delete">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="delete" value="'.$donnees['id'].'">
                <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
              </form>
            </td>
          </tr>
        </tbody>
    ';
  }
  echo "</table>";
}

function afficher5societes($value='')
{
  global $bdd;

  $resultat = $bdd->prepare('select Company.id,Company.company_name,Company.company_address,Company.country,Company.VAT_number,Company.company_phone,Company_Type.type_name
  from Company,Company_Type where Company.company_type = company_Type.id order by Company.id desc limit 5');
  $resultat -> execute();

  echo "
  <h1 class='mt-2 d-flex justify-content-center display-4'>cinq dernières sociétés encodées</h1>
  <table class='table table-bordered'>
    <thead>
        <tr>
            <th scope='col'>Nom de l'entreprise</th>
            <th scope='col'>Adresse de l'entreprise</th>
            <th scope='col'>Pays</th>
            <th scope='col'>Numéro de TVA</th>
            <th scope='col'>Numéro de téléphone de la compagnie</th>
            <th scope='col'>Type de client</th>
            <th scope='col'>Options</th>
        </tr>
    </thead>
  ";
  foreach($resultat as $donnees){
    echo '
      <tbody>
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
              <input type="submit" class="btn btn-warning m-1 text-white" name="submitShow" value="Show">
              <input type="hidden" class="btn btn-warning m-1 text-white" name="show" value="'.$donnees['id'].'">
              <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
            </form>
            <form class="" action="update-customers.php" method="post">
              <input type="submit" class="btn btn-warning m-1 text-white" name="submitEdit" value="Edit">
              <input type="hidden" class="btn btn-warning m-1 text-white" name="edit" value="'.$donnees['id'].'">
              <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
            </form>
            <form class="" action="" method="post">
              <input type="submit" class="btn btn-warning m-1 text-white" name="submitDelete" value="Delete">
              <input type="hidden" class="btn btn-warning m-1 text-white" name="delete" value="'.$donnees['id'].'">
              <input type="hidden" class="btn btn-warning m-1 text-white" name="hiddenPage" value="accueil.php">
            </form>
          </td>
        </tr>
      </tbody>
    ';
  }
  echo "</table>";
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
      <title>Accueil</title>
    </head>
    <body>
      <?php include 'header.php' ?>
      <?php afficher5factures(); ?>
      <?php afficher5personnes(); ?>
      <?php afficher5societes(); ?>
    </body>
