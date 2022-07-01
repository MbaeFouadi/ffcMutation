<?php
namespace PHPMailer\PHPMailer;
include('PHPMailer/src/Exception.php');
include('PHPMailer/src/PHPMailer.php');
include('PHPMailer/src/SMTP.php');

if (isset($_POST['submit'])) {
    // extract($_POST);
    // $email=$_POST['email'];
    // $sujet=$_POST['sujet'];
    // $message=$_POST['message'];


    // $insert=$bdd->prepare("INSERT INTO email(idusersadmin,idMutation,id_club,id_joueur,id_etat) values(?,?,?,?,?)") or die($bdd->ErrorInfo);
    // $insert->execute(array($_SESSION['idusersadmin'],$_SESSION['idMutation'],$_SESSION['id_club'],$_SESSION['id_joueur'],$_SESSION['id_etat']))  or die($bdd->ErrorInfo);
    // header("location:Mutation_env.php");


    // $maxsize = '512000';


    // if ($_FILES['file']['error'] > 0 and $_FILES['file1']['error'] > 0) {
    //     $error = 'Erreur lors du transfert';
    // } else {
    //     if ($_FILES['file']['size'] > $maxsize and $_FILES['file1']['size'] > $maxsize) {
    //         $error = 'Erreur : Le fichier  est trop gros.';
    //     } else {

            
    //         $extensions_valides = array('jpg', 'jpeg', 'png', 'pdf');
    //         $extension_upload = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
    //         $extension_upload = strtolower(substr(strrchr($_FILES['file1']['name'], '.'), 1));

    //         if (in_array($extension_upload, $extensions_valides)) {
                
                
    //             // $_SESSION['NumMutation']=$photo['name'];
    //             $phpmail = new PHPMailer;
    //             // $phpmail->setFrom($_SESSION['Email'], $_SESSION['Club']);
    //             $phpmail->setFrom($_SESSION['Email'],$_SESSION['Club']);
    //             $phpmail->Subject = "Demission du joueur " . $_SESSION['Nom'] . " " . $_SESSION['Prenom'];
    //             // $phpmail->addAddress($_SESSION['Emails']);
    //             $phpmail->addAddress("mbaefouadi91@gmail.com");
    //             // $phpmail->addAddress('pro.mchangama1998@gmail.com');
    //             $phpmail->Body = "Mr/Mme " . $_SESSION['Nom'] . " " . $_SESSION['Prenom'] . " Né(e) le " . $_SESSION['Date_naissance'] . " à " . $_SESSION['Ville_Naissance'] . "<br> De Nationalité " . $_SESSION['nom_fr_fr'] . " Residant à " . $_SESSION['Ville'] . " Désire démissionner du Club " . $_SESSION['club'] . " Souhaitant faire partie du club " . $_SESSION['Club'];
    //             $phpmail->isHTML(true);
    //             foreach ($_FILES as $photo) {
    //                 $phpmail->AddAttachment($photo['tmp_name'], $photo['name']);
    //                 // move_uploaded_file($photo['tmp_name'], "ngazidja/" . $photo['name']);
    //             }
    //             if (!$phpmail->send()) {
    //                 $error = 'Message ne peut pas etre envoyé.';
    //                 $error = 'Erreur Email: ' . $phpmail->ErrorInfo;
    //             // } elseif (empty($_SESSION['idMutation'])) {
    //             //     $error = "Desole vous n'avez pas de numero de mutation";
    //             } else {

    //                 $success = "Email envoyé";
    //                 // $insert=$bdd->prepare("INSERT INTO email(idusersadmin,idMutation,id_club,id_joueur,id_etat) values(?,?,?,?,?)") or die($bdd->ErrorInfo);
    //                 // $insert->execute(array($_SESSION['idusersadmin'],$_SESSION['idMutation'],$_SESSION['id_club'],$_SESSION['id_joueur'],$_SESSION['id_etat']))  or die($bdd->ErrorInfo);
    //                 // header("location:Mutation_env.php");
    //             }
    //         } else {
    //             $error = 'Erreur : Sélectionnez un fichier de type .jpg / .png / .pdf';
    //         }
    //     }
    // }

    $phpmail = new PHPMailer();
    // $phpmail->addAttachment('files/'.$name_files);
    // $phpmail->addAttachment('files/'.$name_file);
    $message="loololol";
    $phpmail->setFrom('mbaefouadi91@gmail.com','Fouadi');
    $phpmail->Subject="hummm";
    $phpmail->addAddress('fehinclub@yahoo.com');
    $phpmail->addAddress('mbaefouadi91@gmail.com');
    $phpmail->addAddress('pro.mchangama1998@gmail.com');
    $phpmail->Body=$message;
    $phpmail->isHTML(true);
    if($phpmail->send())
    {
        echo "Email envoye";
    }
    else
    {
        $phpmail->ErrorInfo;
        echo $phpmail->ErrorInfo;;
    }



    // $content_dir="files/";
    // $tmp_file=$_FILES['file']['tmp_name'];

    // $content_dirs="files/";
    // $tmp_files=$_FILES['file1']['tmp_name'];


    // if(!is_uploaded_file($tmp_file))
    // {
    //     exit('Ce fichier est introuvable');
    // }
    // $type_file=$_FILES['file']['type'];

    //  if(!is_uploaded_file($tmp_files))
    // {
    //     exit('Ce fichier est introuvable');
    // }



    // $type_files=$_FILES['file']['type'];

    // if(strstr($type_file,'JPG') and strstr($type_file,'jpg'))
    // {
    //     exit('ce type de fichier n\'est pas pris en charge');
    // }
    // $name_file=time().'.jpg';

    // if(strstr($type_files,'JPG') and strstr($type_files,'jpg'))
    // {
    //     exit('ce type de fichier n\'est pas pris en charge');
    // }
    // $name_files=time().'.jpg';


    // if(!move_uploaded_file($tmp_file,$content_dir.$name_file))
    // {
    //     exit ('Impossible de copier ce fichier');
    // }

    // if(!move_uploaded_file($tmp_files,$content_dirs.$name_files))
    // {
    //     exit ('Impossible de copier ce fichier');
    // }

    // $phpmail = new PHPMailer();
    // $phpmail->addAttachment('files/'.$name_files);
    // $phpmail->addAttachment('files/'.$name_file);
    // $phpmail->setFrom($email,'Fouadi');
    // $phpmail->Subject=$sujet;
    // $phpmail->addAddress('fehinclub@yahoo.com');
    // $phpmail->addAddress('mbaefouadi91@gmail.com');
    // $phpmail->addAddress('pro.mchangama1998@gmail.com');
    // $phpmail->Body=$message;
    // $phpmail->isHTML(true);
    // if($phpmail->send())
    // {
    //     echo "Email envoye";
    // }
    // else
    // {
    //     $phpmail->error();
    //     echo "Erreur d'envoi";
    // }


// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers. From is required, rest other headers are optional
// $headers = 'From: <fouadi.mbae@univ-comores.km>' . "\r\n";
// // $headers .= 'Cc: sales@example.com' . "\r\n";

// mail("mbaefouadi91@gmail.com","lol","hum",$headers);

}
