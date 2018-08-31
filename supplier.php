<?php
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=COGIP;charset=utf8', 'root', 'root'); 
    $request = $db->query("SELECT Company.company_name,Company.company_address,company_phone,Company.company_type
                            FROM Company,Company_Type
                            WHERE Company.company_type = Company_Type.id AND Company_Type.type_name = 'supplier';");

    echo "<table>";
    echo "<tr>";
    echo "<th>".'Company'."</th>";
    echo "<th>".'Address'."</th>";
    echo "<th>".'Phone'."</th>";
    echo "<th>".'Type'."</th>";
    echo "</tr>";

    foreach($request as $user){
        echo "<tr>";
        echo "<td>".$user['company_name']."</td>";
        echo "<td>".$user['company_address']."</td>";
        echo "<td>".$user['company_phone']."</td>";
        echo "<td>".$user['company_type']."</td>";
        echo "<tr>";
    }
    
    echo "</table>";
    echo "</form>";
  }
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }