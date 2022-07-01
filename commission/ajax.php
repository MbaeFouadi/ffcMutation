<?php
session_start();
//connexion à la base de données 
include '../connexion/connexion.php';
 if(isset($_POST['id_etat']) && !empty($_POST['id_etat']))
 {
     $query=$bdd->query("SELECT * FROM Club WHERE id_etat=".$_POST['id_etat']);
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

 if(isset($_POST['club']) && !empty($_POST['club']))
 {
     $quer=$bdd->query("SELECT joueurs.id_joueur as id_joueur,joueurs.Prenom as Prenom, joueurs  .Nom as Nom  FROM joueurs,club WHERE joueurs.Club=club.Club AND  club.id_club=".$_POST['club']);
     $re=$quer->rowCount();
     if($re>0)
     {?>
         
         <?php while($dat=$quer->fetch()){?>
             <option disabled selected hidden>selectionner le joueur</option>    
         <option value="<?=$dat['id_joueur']?>"><?=$dat['Prenom']?> <?=$dat['Nom']?></option>
         <?php
         }
     }
     
 }


 if(isset($_POST['li']))
 {
     $lig=$_POST['li'];

     $li=$bdd->prepare("SELECT * FROM etat WHERE id_etat=?");
     $li->execute([$lig]);
     $ligu=$li->fetch();
     if($li->rowCount()>0){?>
         <h6><?=$ligu['nom']?></h6>
     <?php }
 }

 if(isset($_POST['clu']))
 {
     $clu=$_POST['clu'];

    //  $equi=$bdd->prepare("SELECT club.Club as Club ,usersadmin.Email as Email FROM usersadmin,club WHERE usersadmin.Club=club.Club and club.id_club=?") or die($bdd->error());
    //  $equi->execute([$clu]);
        $equi=$bdd->prepare("SELECT * FROM club WHERE id_club=?");
        $equi->execute([$clu]);
        $equipe=$equi->fetch();
        $_SESSION['club']=$equipe['Club'];
        $_SESSION['id_club']=$equipe['id_club'];
        $email=$bdd->prepare("SELECT * FROM users WHERE Club=?");
        $email->execute([$equipe['Club']]);
        $ema=$email->fetch();
        $_SESSION['Email']=$ema['Email'];
     if($equi->rowCount()>0){?>
         <p><center> A <br> 
                  <?=$equipe['Club']?> <br>
                  <?=$ema['Email']?> 
                   </center>         </p><br><br><br><br><br>
     <?php }
 }

 
 if(isset($_POST['jou']))
 {
     $jou=$_POST['jou'];

     $joue=$bdd->prepare("SELECT * FROM joueurs WHERE id_joueur=?");
     $joue->execute([$jou]);
     $joueu=$joue->fetch();
     $_SESSION['Nom']=$joueu['Nom'];
     $_SESSION['Prenom']=$joueu['Prenom'];
     $_SESSION['Date_naissance']=$joueu['Date_naissance'];
     $_SESSION['Ville_Naissance']=$joueu['Ville_Naissance'];
     $_SESSION['Ville']=$joueu['Ville'];
     $_SESSION['id_joueur']=$joueu['id_joueur'];
    //  $jou['Club']=$joueu['Club'];

     $pays=$bdd->prepare("SELECT * FROM pays WHERE alpha2=?");
     $pays->execute([$joueu['Pays']]);
     $pa=$pays->fetch();
     $_SESSION['nom_fr_fr']=$pa['nom_fr_fr'];
     if($joue->rowCount()>0){?>
        <p>
        <strong>Objet: Demisson du Joueur <?=$joueu['Nom']?> <?=$joueu['Prenom']?></strong><br><br>
            Mr/Mme <strong><?=$joueu['Nom']?> <?=$joueu['Prenom']?></strong>  Né(e) le <strong><?=$joueu['Date_naissance']?></strong> à <strong><?=$joueu['Ville_Naissance']?></strong> De Nationalité <strong><?=$pa['nom_fr_fr']?></strong> Residant à <strong><?=$joueu['Ville']?></strong> Désire démissionner du Club <strong><?=$joueu['Club']?></strong>
                   Souhaitant faire partie du club <Strong><?=$_SESSION['Club']?></Strong>
               </p>
     <?php }
 }

 if(isset($_POST['mu']))
 {
     $mu=$_POST['mu'];

     $mut=$bdd->prepare("SELECT * FROM mutation WHERE idMutation=?");
     $mut->execute([$mu]);
     $mutation=$mut->fetch();
     $_SESSION['idMutation']=$mutation['idMutation'];
     if($mut->rowCount()>0){?>
         <p style="text-align: right;">N°: <?=$mutation['NumMutation']?> <br>
                date:<?php echo date('d/m/Y')?>
                </p>
     <?php }
 }

 if(isset($_POST['ob']))
 {
     $pv=$bdd->query("SELECT * FROM pv_mutation ORDER BY id_pv DESC");
     $pvs=$pv->fetch();
     $up=$bdd->prepare("UPDATE pv_mutation set observation=? where id_pv=?");
     $up->execute([$_POST['ob'],$pvs['id_pv']]);
 }

 if(isset($_POST['re']))
 {
     $pvt=$bdd->query("SELECT * FROM pv_mutation ORDER BY id_pv DESC");
     $pvts=$pvt->fetch();
     $ups=$bdd->prepare("INSERT INTO pv_mutation(reponse) VALUES(?)") or die($bdd->ErrorInfo);
     $ups->execute([$_POST['re']]) or die($bdd->ErrorInfo);
 }

 if(isset($_POST['obn']))
 {
     $pv=$bdd->query("SELECT * FROM pv_mutation ORDER BY id_pv DESC");
     $pvs=$pv->fetch();
     $up=$bdd->prepare("UPDATE pv_mutation set observation=? where id_pv=?");
     $up->execute([$_POST['obn'],$pvs['id_pv']]);
 }

 if(isset($_POST['ren']))
 {
     $pvt=$bdd->query("SELECT * FROM pv_mutation ORDER BY id_pv DESC");
     $pvts=$pvt->fetch();
     $ups=$bdd->prepare("INSERT INTO pv_mutation(reponse) VALUES(?)") or die($bdd->ErrorInfo);
     $ups->execute([$_POST['ren']]) or die($bdd->ErrorInfo);
 }

 if(isset($_POST['obm']))
 {
     $pv=$bdd->query("SELECT * FROM pv_mutation ORDER BY id_pv DESC");
     $pvs=$pv->fetch();
     $up=$bdd->prepare("UPDATE pv_mutation set observation=? where id_pv=?");
     $up->execute([$_POST['obm'],$pvs['id_pv']]);
 }

 if(isset($_POST['rem']))
 {
     $pvt=$bdd->query("SELECT * FROM pv_mutation ORDER BY id_pv DESC");
     $pvts=$pvt->fetch();
     $ups=$bdd->prepare("INSERT INTO pv_mutation(reponse) VALUES(?)") or die($bdd->ErrorInfo);
     $ups->execute([$_POST['rem']]) or die($bdd->ErrorInfo);
 }