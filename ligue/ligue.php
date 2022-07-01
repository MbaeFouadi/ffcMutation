<?php
session_start();
include '../connexion/connexion.php';
if(isset($_SESSION['id_categories']) AND $_SESSION['id_categories'] == 2 ){

$ligue=$bdd->prepare("SELECT * from etat WHERE id_etat=?");
$ligue->execute([$_SESSION['id_etat']]);


$ligues=$bdd->prepare("SELECT * from etat WHERE id_etat=?");
$ligues->execute([$_SESSION['id_etat']]);
$li=$ligues->fetch();

$club=$bdd->prepare("SELECT * from club,users WHERE club.Club=users.Club AND  club.id_etat=?");
$club->execute([$_SESSION['id_etat']]);

$mu=$bdd->prepare("SELECT * FROM mutation WHERE id_etat=?");
$mu->execute([$_SESSION['id_etat']]);

if(isset($_POST['button']))
{
    
    
        $inser=$bdd->prepare("INSERT INTO mutation(NumMutation,idusersadmin,id_etat) VALUES(?,?,?)");
        $inser->execute([$_POST['num'],$_POST['club'],$_SESSION['id_etat']]);
        if($inser)
        {
            header("location:ligue.php");   
        }
    
   
    
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap6.min.css">
    <title>Mutations</title>
</head>

<body class="w-100 h-100" style="position: fixed;">
    <!-- entete et aside -->
    <div class="header bg-info position-fixed justify-content-between">
        <!-- MENU DESKTOP -->
        <div class="dropdown btn-r" style="float: right;height: 100%; width: 60%;">
            <div class="w-100">


                <!-- MENU DARCK -->
                <button class="btn bg-dark  text-light " type="button" style="height:60px;float: right;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-grid-3x3-gap-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-2zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-2z"/>
                      </svg>
                </button>
                <div class="dropdown-menu shadow" style="
                 z-index: 1000;
                  width: 400px;
                  border-radius: 10px;
                  margin: 10px;
                  " aria-labelledby="dropdownMenuButton">
                    <br>
                    <div class="mx-auto" style="height: 100px;
                    width: 100px;
                    background:url(../img/FFC-icon.png);
                    background-size: cover;
                    ">
                    </div>
                    <br>
                    <center>
                        <h6 class="text-success">
                        <strong class="text-info" style="font-size: 20px;"><?=$li['nom']?>  </strong> <br> <?=$_SESSION['nom']?>
                                                </h6>
                        <a id="" class="btn btn-light border rounded-pill " href="#" role="button">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-grid-1x2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6 1H1v14h5V1zm9 0h-5v5h5V1zm0 9h-5v5h5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-5z"/>
                          </svg> Gérer votre Compte
                        </a>
                    </center>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-center " href="deconnexion.php">
                        <svg width="1.5em" height="1.5em" class="text-danger" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>
                            <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>
                          </svg>
                        <h6>Deconnexion</h6>

                    </a>
                </div>
                <!-- MENU DARCK -->

            </div>


        </div>
        <!-- MENU DESKTOP -->
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle" style="height: 60px;width: 60px; margin-top: -1.6em;padding:14px;padding-top: 20px;left: 0;">
             <div class="spinner diagonal part-1">
            </div>
             <div class="spinner horizontal"></div>
              <div class="spinner diagonal part-2"></div>
        </label>

        <div id="sidebarMenu" class="bg-light">
            <ul class="sidebarMenuInner">
                <li class="text-center  py-3">
                    <img src="../img/FFC-icon.png" class="w-25">
                </li>
                <li style="text-align: center;">
                    <h6 class="text-success">
                        <strong class="text-info" style="font-size: 20px;"><?=$li['nom']?>  </strong> <br> <?=$_SESSION['nom']?>
                    </h6>
                </li>
                <li class=" ">
                    <a id="" class="btn btn-md text-dark w-100" href="#" role="button">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-grid-1x2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6 1H1v14h5V1zm9 0h-5v5h5V1zm0 9h-5v5h5v-5zM0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm1 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1h-5z"/>
                          </svg> Gérer votre Compte
                    </a>
                </li>
                <li>
                    <a class="btn btn-md text-center text-dark w-100 " href="deconnexion.php">
                        <svg width="1.5em" height="1.5em" class="text-danger" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>
                                <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>
                              </svg> Deconnexion

                    </a>
                </li>
                <li>
                    <a class=" btn  w-100 text-left">

                    </a>
                </li>

            </ul>
        </div>

    </div>
    <!-- entete et aside -->

    <div class="main-container">
        <div class="bg-white shadow mn justify-content-between">
            <button class="  btn active" id="nga" data-tab="vNUM">VENTE</button>
            <button class=" btn" id="ndz" data-tab="lNUM">Historique</button>
        </div>

        <div class="tab tab-active" id="vNUM">

        <div class="container">
            <form action="" method="POST">
                <div class="mb-3 form-group">
                    <label for="exampleFormControlInput1" class="form-label">N° Mutation</label>
                    <input name="num" type="text" class="form-control" id="exampleFormControlInput1" placeholder="numero de mutation">
                </div>
                <div class="form-group">
                    <select  class="form-control" aria-label="Default select example">
                        
                        <?php while($data=$ligue->fetch()){?>
                        <option value="<?=$data['id_etat']?>"><?=$data['nom']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" aria-label="Default select example"name="club" >
                        <option selected>Equipe</option>
                        <?php while($da=$club->fetch()){?>
                        <option value="<?=$da['idusersadmin']?>"><?=$da['Club']?></option>
                        <?php }?>
                    </select>
                </div>
                <div>
                    <input type="submit" class="btn btn-success" name="button" value="Enregistrez">
                </div>
            </form>
           
            
                        
        </div>
            <!-- <div class="row ">
                <div class="border rounded col-xs-3 col-sm-3 col-md-3 col-lg-3 shadow d-flex justify-content-between ticket">
                    <label class=" border w-75 n">NDZ/34</label><button class="btn btn-sm btn-info h-75 vt" data-toggle="modal" data-target="#popVente">Vendre</button>
                </div>
                <div class="border rounded col-xs-3 col-sm-3 col-md-3 col-lg-3 shadow d-flex justify-content-between ticket">
                    <label class=" border w-75 n">NDZ/35</label><button class="btn btn-sm btn-info h-75 vt" data-toggle="modal" data-target="#popVente">Vendre</button>
                </div>
                <div class="border rounded col-xs-3 col-sm-3 col-md-3 col-lg-3 shadow d-flex justify-content-between ticket">
                    <label class=" border w-75 n">NDZ/36</label><button class="btn btn-sm btn-info h-75 vt" data-toggle="modal" data-target="#popVente">Vendre</button>
                </div>
                <div class="border rounded col-xs-3 col-sm-3 col-md-3 col-lg-3 shadow d-flex justify-content-between ticket">
                    <label class=" border w-75 n">NDZ/37</label><button class="btn btn-sm btn-info h-75 vt" data-toggle="modal" data-target="#popVente">Vendre</button>
                </div>

                
                <div class="modal fade" id="popVente" tabindex="-1" role="dialog" aria-labelledby="vente Num" aria-hidden="true">
                    <div class="modal-dialog modal-notify modal-info" role="document">
                        <div class="modal-content text-center  ">
                            <div class="modal-header d-flex justify-content-center bg-info text-white-50">
                                <sapn class="text align-content-lg-center">
                                    VENTE DE NUMERO DE MUTATION
                                    </span>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="">
                                    <div class="form-row" style="border-radius:50%;">
                                        <div class="form-group col-md-12">
                                            <input type="text" name="" id="NUM" class="form-control" max="" style="text-align: center;" required="required" title="" disabled>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <select name="" id="" class="form-control" required="required">
                                               <option value=""></option>
                                           </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <select name="" id="input" class="form-control" required="required">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-sm btn-success" name="" value="Valider la vente">
                                    <a type="button" class="btn btn-sm btn-warning waves-effect" data-dismiss="modal">Annuler</a>
                                </form>
                            </div>

                            <div class="modal-footer flex-center">

                            </div>
                        </div>
                    </div>
                </div>
            
            </div>-->
        </div> 
        <div class="tab" id="lNUM">
            <div class="row">
                <div class="border rounded col-xs-12 col-sm-12 col-md-12 col-lg-12 shadow d-flex justify-content-between ticket">
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">N° Mutation</th>
                        <th scope="col">Club</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                     while($data= $mu->fetch()){
                         $club=$bdd->prepare("SELECT * FROM users WHERE idusersadmin=?");
                         $club->execute([$data['idusersadmin']]);
                         $clubs=$club->fetch();
                         
                         ?>
                        <tr>
                        <th scope="row"><?=$data['NumMutation']?></th>
                        <td><?=$clubs['Club']?></td>
                   
                        </tr>
                        <?php 
                        
                     }
                        ?>
                    </tbody>
            </table>
                   
                </div>

            </div>
            
        </div>
    </div>






    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/jquery.backstretch.min.js"></script>
    <!-- <script>
    $(".corp").backstretch("../img/drptr.jpg", {
         speed: 500
         });
</script> -->
    <script src="../js/controller.js"></script>
    <script src="js/main.js"></script>

    <script>
$(document).ready(function() {
        $("#di").change(function() {
            var di = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    di: di

                },

                dataType: "text",
                success: function(html) {
                    
                    $('#club').html(html);
                }
            });
        });
        $("#club").change(function() {
            var clu = $(this).val();

            $.ajax({
                type: "POST",
                url: "ajax.php",
                data: {
                    clu: clu

                },

                dataType: "text",
                success: function(html) {
                    
                    $('#equi').html(html);
                }
            });
        });
    });
    </script>
       <?php } else{

header("location:index.php");
} ?>
</body>

</html>