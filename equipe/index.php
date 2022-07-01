<?php
session_start();
include '../connexion/connexion.php';
if(isset($_SESSION['fonction']) AND $_SESSION['fonction'] == 2 ){
//Requette pour afficher les differentes  ligue 
// $ligue=$bdd->query("SELECT * FROM etat");
$date_fin=$bdd->query('SELECT * FROM date_fin  order by id_date Desc ');
$date_fins=$date_fin->fetch();
// $mutat->execute([$_SESSION['idusersadmin']]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap6.min.css">
    <title>Mutations</title>
</head>
<body class="w-100 h-100" style="position: fixed;">
<!-- entete et aside -->
    <div class="header bg-info  justify-content-between" id="header" style="">
        <!-- LE RECHERCHE POUR MOBILE -->
        <div class="dropdown srch w-100">
                <button class="btn " style="height:60px; color: #ffffff;float: right;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="2em" height="2em"  viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </button>
                <div class="dropdown-menu shadow border rounded" aria-labelledby="dropdownMenuButton" style="width: 98%;height: 65px;">
                    <span class=" text-success" style="display: flex;padding-left: 20px;"> 
                        <label for="rch"style="margin-top:14px" ><strong>Recherche</strong> </label>
                    <div class="form-group w-75 mx-auto rounded border" style="display: flex;">
                    <input type="text" id="rch" class="form-control " placeholder="Recherche ..." aria-label="Example placeholder" aria-describedby="exampleAddon">
                    </span>
                </div>
            </div>
        </div>
        <!-- LE RECHERCHE POUR MOBILE -->

        <!-- MENU DESKTOP -->
        <div class="dropdown btn-r" style="float: right;height: 100%; width: 60%;">
            <div class="justify-content-between" style="display: flex;">
                <!-- Le RECHERCHE DESKTOP -->
                <div class="form-group w-100 py-2" style="display: flex;">
                        <input type="text" class="form-control rounded border" placeholder="Recherche ..." aria-label="Example placeholder" aria-describedby="exampleAddon">
                        <button class="btn text-light" type="button" style="height: 39px;margin-top: 3px;width: 30px;" >
                            <svg width="2em" height="2em" style="margin-top:-1em;margin-left:-1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                              </svg>
                        </button>
                </div>
                <!-- Le RECHERCHE DESKTOP -->

                

                <!-- MENU DARCK -->
                    <?php include 'include/dark.php' ?>
            
            
        </div>
        <!-- MENU DESKTOP -->
       <?php include 'include/menu.php' ?>
          
        <div class="corp w-100 d-flex h-100 bg-transparent principal" style="padding: 20px;overflow: scroll;position: relative; z-index: 2;">
           
            <div class="mx-auto bg-primary corps nr"  style="height: 85%; opacity: 0.8;position: absolute;" >
                
            </div>
            <?php if($date_fins['type']==1){ ?>
            <div class=" mx-auto corps "  style="height: 90%;width:95%;opacity: 0.99;padding:40px;padding-left:10%;padding-right: 10%;" >
                <h1 class="text-light" style="font-size: 150px;">+</h1>
                <center>
                    <h1 class="text-light" style="font-size:7vh">Nouveau transfert</h1>
                    <a name="" id="start" class="btn btn-info" href="#" role="button">Commencer</a>
                </center>
                <h1 class="text-light" style="font-size: 150px;float:right">+</h1>

            </div>
            <?php } else{ ?>
                
            <div class=" mx-auto corps "  style="height: 90%;width:95%;opacity: 0.99;padding:40px;padding-left:10%;padding-right: 10%;" >
                <h1 class="text-light" style="font-size: 150px;">+</h1>
                <center>
                    <h1 class="text-light" style="font-size:7vh">Nouvelle Mutation</h1>
                    <a name="" id="" class="btn btn-info" href="#" role="button">Commencer</a>
                </center>
                <h1 class="text-light" style="font-size: 150px;float:right">+</h1>
            </div>
            <?php }?>
        </div>
          
          
              
      </div>
      
</div>    

 

    
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.js"></script>
  <script type="text/javascript" src="../js/jquery.backstretch.min.js"></script>
  <script>
     $(".corp").backstretch("../img/drptr.jpg", {
          speed: 500
          });
</script>
<script src="../js/controller.js"></script>
<?php } else{

header("location:../index.php");
} ?>
</body>
</html>