<?php
session_start();
include '../connexion/connexion.php';
//connexion à la base de données 
if(isset($_POST['di']) && !empty($_POST['di']))
 {
    $query=$bdd->query("SELECT * FROM club WHERE id_etat=".$_POST['di']);
     $rep=$query->rowCount();
     if($rep>0)
     {?>
         
         <?php while($data=$query->fetch()){?>
             <option disabled selected hidden>selectionner le club</option>    
         <option value="<?=$data['id_club']?>"><?=$data['Club']?></option>
         <?php
         }
     }
     
 }