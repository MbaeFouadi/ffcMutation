<?php
session_start();
include '../connexion/connexion.php';
if(isset($_SESSION['id_categories']) AND $_SESSION['id_categories'] == 4 ){
if(isset($_GET['id']))
{
    $aff=$bdd->prepare("SELECT * FROM pv_mutation WHERE id_pv=?");
    $aff->execute([$_GET['id']]);
    $data=$aff->fetch();

    if(isset($_POST['but']))
    {
        $up=$bdd->prepare("UPDATE pv_mutation SET observation=?, reponse=? where id_pv=?");
        $up->execute([$_POST['observation'],$_POST['reponse'],$_GET['id']]);
        if($up)
        {
            header("location:accueil.php");
        }
        else
        {
            $error="Modification non effectuée";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap6.min.css">
    <title>Modification</title>
</head>
<body>
    <div class="container">
        <h1>Modification des information</h1>
        <form method="POST" action="">
            <div class="form form-group">
                <input type="text" class="form form-control" name="observation" placeholder="observation" value="<?=$data['observation']?>">
            </div>
            <div class="form form-group">
                <select class="form form-control" name="reponse">
                    <option value="Accepter">Accepter</option>
                    <option value="Rejeter">Rejeter</option>
                </select>
            </div>
           
            <input type="submit" name="but" class="btn btn-primary" value="Modifier">
        </form>
        <?php if(isset($error)){?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $error ?>
            </div>
            <?php }?>                
    </div>
    <?php } else{

header("location:index.php");
} ?>
</body>
</html>